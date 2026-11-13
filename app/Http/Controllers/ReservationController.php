<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\BlockedDate;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function list(Request $request)
    {
        $query = Reservation::query();

        // Search
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('client_name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('event_type', 'like', "%$s%")
                  ->orWhere('venue', 'like', "%$s%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('event_date', $request->date);
        }

        // Filter by venue
        if ($request->filled('venue')) {
            $query->where('venue', $request->venue);
        }

        // For regular users, only show their own reservations
        if (! auth()->user()->is_admin) {
            $query->where('user_id', auth()->id());
        }

        $reservations = $query->with('review')->latest()->paginate(15);

        // ── Review nudge: find the oldest un-reviewed past-event reservation ──
        // We surface ONE gentle prompt at a time so it never feels spammy.
        $reviewNudge = null;
        if (! auth()->user()->is_admin) {
            $reviewNudge = Reservation::pendingReview(auth()->id())
                ->orderBy('event_date')
                ->first();
        }

        return view('reservations.list', compact('reservations', 'reviewNudge'));
    }

    public function add_form()
    {
        $blockedDates = BlockedDate::pluck('date')->map(fn ($d) => Carbon::parse($d)->format('Y-m-d'));
        return view('reservations.new_reservation_form', compact('blockedDates'));
    }

    public function save_reservation(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'email'       => 'required|email',
            'phone'       => 'required|string|max:20',
            'venue'       => 'required',
            'event_type'  => 'required',
            'event_date'  => 'required|date|after_or_equal:today',
            'event_time'  => 'required',
            'guest_count' => 'required|integer|min:1',
        ]);

        $date  = $request->event_date;
        $venue = $request->venue;

        // 1. Check admin-blocked dates
        if (BlockedDate::whereDate('date', $date)->exists()) {
            return back()
                ->withErrors(['event_date' => 'This date has been blocked by the administrator and is unavailable for booking.'])
                ->withInput();
        }

        // 2. Check for existing reservations on the same venue + date (double-booking prevention)
        $conflict = Reservation::where('venue', $venue)
            ->whereDate('event_date', $date)
            ->whereNotIn('status', ['Cancelled'])
            ->exists();

        if ($conflict) {
            return back()
                ->withErrors(['event_date' => 'This venue is already reserved on the selected date. Please choose a different date or venue.'])
                ->withInput();
        }

        Reservation::create([
            'user_id'             => auth()->id(),
            'client_name'         => $request->client_name,
            'email'               => $request->email,
            'phone'               => $request->phone,
            'event_type'          => $request->event_type,
            'other_specification' => $request->other_specification,
            'venue'               => $venue,
            'event_date'          => $date,
            'event_time'          => $request->event_time,
            'guest_count'         => $request->guest_count,
            'special_requests'    => $request->special_requests,
            'status'              => 'Pending',
        ]);

        return redirect('/reservation/list')
            ->with('success', '✦ Reservation created! We will confirm your booking within 24 hours.');
    }

    public function update_form($id)
    {
        $reservation  = Reservation::findOrFail($id);
        $blockedDates = BlockedDate::pluck('date')->map(fn ($d) => Carbon::parse($d)->format('Y-m-d'));
        return view('reservations.update_reservation_form', compact('reservation', 'blockedDates'));
    }

    public function updated_reservation($id, Request $request)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate([
            'client_name' => 'required|string|max:255',
            'email'       => 'required|email',
            'event_date'  => 'required|date',
            'guest_count' => 'required|integer|min:1',
        ]);

        $date  = $request->event_date;
        $venue = $request->venue ?? $reservation->venue;

        // Double-booking check: exclude current reservation from conflict test
        $conflict = Reservation::where('venue', $venue)
            ->whereDate('event_date', $date)
            ->whereNotIn('status', ['Cancelled'])
            ->where('id', '!=', $id)
            ->exists();

        if ($conflict) {
            return back()
                ->withErrors(['event_date' => 'This venue is already reserved on the selected date.'])
                ->withInput();
        }

        $reservation->update([
            'client_name'         => $request->client_name,
            'email'               => $request->email,
            'phone'               => $request->phone,
            'event_type'          => $request->event_type,
            'other_specification' => $request->other_specification,
            'venue'               => $venue,
            'event_date'          => $date,
            'event_time'          => $request->event_time,
            'guest_count'         => $request->guest_count,
            'special_requests'    => $request->special_requests,
            'status'              => $request->status,
        ]);

        return redirect('/reservation/list')->with('success', 'Reservation updated successfully.');
    }

    public function cancel_reservation($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Only owner or admin can cancel
        if (! auth()->user()->is_admin && $reservation->user_id !== auth()->id()) {
            abort(403);
        }

        // Business rule: can only cancel if event is more than 24 hours away
        $hoursUntilEvent = now()->diffInHours(
            Carbon::parse($reservation->event_date->format('Y-m-d') . ' ' . $reservation->event_time),
            false
        );

        if ($hoursUntilEvent < 24) {
            return back()->withErrors([
                'cancel' => 'Reservations can only be cancelled more than 24 hours before the event.',
            ]);
        }

        $reservation->update(['status' => 'Cancelled']);
        return redirect('/reservation/list')->with('success', 'Reservation cancelled.');
    }

    public function delete_reservation($id)
    {
        Reservation::findOrFail($id)->delete();
        return redirect('/reservation/list')->with('success', 'Reservation deleted.');
    }

    // ── API: returns booked + blocked dates for the calendar ──────────────

    /**
     * Returns dates that are fully booked or blocked.
     * Optionally filtered by venue.
     *
     * Response shape:
     * {
     *   booked:  ["2026-06-10", ...],   // dates with active reservations
     *   blocked: ["2026-06-15", ...],   // admin-blocked dates
     * }
     */
    public function availability(Request $request)
    {
        $venue = $request->venue;

        $booked = Reservation::when($venue, fn ($q) => $q->where('venue', $venue))
            ->whereNotIn('status', ['Cancelled'])
            ->pluck('event_date')
            ->map(fn ($d) => Carbon::parse($d)->format('Y-m-d'))
            ->unique()
            ->values();

        $blocked = BlockedDate::pluck('date')
            ->map(fn ($d) => Carbon::parse($d)->format('Y-m-d'));

        return response()->json([
            'booked'  => $booked,
            'blocked' => $blocked,
        ]);
    }
}