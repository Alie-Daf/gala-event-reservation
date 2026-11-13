<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Only the owner can review, and only after the event date
        if ($reservation->user_id !== auth()->id()) abort(403);
        if (now()->lt($reservation->event_date)) {
            return back()->withErrors(['review' => 'You can only leave a review after your event.']);
        }
        if ($reservation->review) {
            return redirect('/reservation/list')->with('info', 'You already reviewed this reservation.');
        }

        return view('reservations.review', compact('reservation'));
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $reservation = Reservation::findOrFail($id);
        if ($reservation->user_id !== auth()->id()) abort(403);

        Review::create([
            'reservation_id' => $id,
            'rating'         => $request->rating,
            'comment'        => $request->comment,
        ]);

        return redirect('/reservation/list')->with('success', 'Thank you for your feedback!');
    }
}
