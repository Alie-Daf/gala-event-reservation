<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\BlockedDate;
use App\Models\Review;
use Carbon\Carbon;

class AdminController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // STATIC PRICING TABLES (PHP)
    // ─────────────────────────────────────────────────────────────

    const VENUE_PRICING = [
        'Garden'   => 45000,
        'Ballroom' => 75000,
        'Coastal'  => 55000,
    ];

    const SERVICE_PRICING = [
        'Debut'     => 15000,
        'Wedding'   => 25000,
        'Prom'      => 12000,
        'Birthday'  => 10000,
        'Reunion'   => 8000,
        'Meeting'   => 5000,
        'Corporate' => 20000,
    ];

    const DEFAULT_VENUE_PRICE   = 50000;
    const DEFAULT_SERVICE_PRICE = 10000;

    // ─────────────────────────────────────────────────────────────
    // HELPER: COMPUTE TOTAL PRICE
    // ─────────────────────────────────────────────────────────────

    private function computePrice(Reservation $r): int
    {
        $venuePrice = self::VENUE_PRICING[$r->venue]
            ?? self::DEFAULT_VENUE_PRICE;

        $servicePrice = self::SERVICE_PRICING[$r->event_type]
            ?? self::DEFAULT_SERVICE_PRICE;

        return $venuePrice + $servicePrice;
    }

    // ─────────────────────────────────────────────────────────────
    // DASHBOARD
    // ─────────────────────────────────────────────────────────────

    public function dashboard()
    {
        $stats = [
            'total'     => Reservation::count(),
            'pending'   => Reservation::where('status', 'Pending')->count(),
            'confirmed' => Reservation::where('status', 'Confirmed')->count(),
            'cancelled' => Reservation::where('status', 'Cancelled')->count(),
        ];

        $byVenue = Reservation::selectRaw('venue, COUNT(*) as total')
            ->groupBy('venue')
            ->get();

        $byService = Reservation::selectRaw('event_type, COUNT(*) as total')
            ->groupBy('event_type')
            ->get();

        $recent = Reservation::latest()->take(10)->get();

        $reviews = Review::with('reservation')
            ->latest()
            ->take(5)
            ->get();

            $venuePricing   = self::VENUE_PRICING;
            $servicePricing = self::SERVICE_PRICING;

            $users = \App\Models\User::latest()->get()->map(function ($user) use ($venuePricing, $servicePricing) {
                $all = \App\Models\Reservation::where('email', $user->email)->get();

                $user->reservations_count = $all->count();

                $user->total_spent = $all->where('status', 'Confirmed')
                    ->sum(function ($r) use ($venuePricing, $servicePricing) {
                        return ($venuePricing[$r->venue] ?? 50000)
                            + ($servicePricing[$r->event_type] ?? 10000);
                    });

                return $user;
            });    

        return view('admin.dashboard', compact(
            'stats',
            'byVenue',
            'byService',
            'recent',
            'reviews',
            'users'

        ));
    }

    // ─────────────────────────────────────────────────────────────
    // BLOCKED DATES
    // ─────────────────────────────────────────────────────────────

    public function blocked_dates()
    {
        $blocked = BlockedDate::orderBy('date')->get();

        return view('admin.blocked_dates', compact('blocked'));
    }

    public function block_date(Request $request)
    {
        $request->validate([
            'date'   => 'required|date|after_or_equal:today',
            'reason' => 'nullable|string|max:255',
        ]);

        BlockedDate::firstOrCreate(
            ['date' => $request->date],
            ['reason' => $request->reason]
        );

        return back()->with('success', 'Date blocked successfully.');
    }

    public function unblock_date($id)
    {
        BlockedDate::findOrFail($id)->delete();

        return back()->with('success', 'Date unblocked successfully.');
    }

    // ─────────────────────────────────────────────────────────────
    // REPORTS / ANALYTICS
    // ─────────────────────────────────────────────────────────────

    public function reports()
    {
        // ─────────────────────────────────────────
        // OVERVIEW STATS
        // ─────────────────────────────────────────

        $stats = [
            'total'     => Reservation::count(),
            'confirmed' => Reservation::where('status', 'Confirmed')->count(),
            'pending'   => Reservation::where('status', 'Pending')->count(),
            'cancelled' => Reservation::where('status', 'Cancelled')->count(),
        ];

        // ─────────────────────────────────────────
        // REVENUE
        // ─────────────────────────────────────────

        $confirmedAll = Reservation::where('status', 'Confirmed')->get();

        $pendingAll = Reservation::where('status', 'Pending')->get();

        $totalRevenue = $confirmedAll->sum(function ($r) {
            return $this->computePrice($r);
        });

        $potentialRevenue = $pendingAll->sum(function ($r) {
            return $this->computePrice($r);
        });

        // ─────────────────────────────────────────
        // BOOKINGS BY VENUE
        // ─────────────────────────────────────────

        $byVenue = Reservation::selectRaw('venue, COUNT(*) as total')
            ->groupBy('venue')
            ->orderByDesc('total')
            ->get()
            ->map(function ($row) {

                $row->venue_price =
                    self::VENUE_PRICING[$row->venue]
                    ?? self::DEFAULT_VENUE_PRICE;

                $row->venue_label = match ($row->venue) {
                    'Garden'   => 'Garden Oasis',
                    'Ballroom' => 'Grand Ballroom',
                    'Coastal'  => 'Coastal Retreat',
                    default    => $row->venue,
                };

                return $row;
            });

        // ─────────────────────────────────────────
        // BOOKINGS BY SERVICE
        // ─────────────────────────────────────────

        $byService = Reservation::selectRaw('event_type, COUNT(*) as total')
            ->groupBy('event_type')
            ->orderByDesc('total')
            ->get()
            ->map(function ($row) {

                $row->service_price =
                    self::SERVICE_PRICING[$row->event_type]
                    ?? self::DEFAULT_SERVICE_PRICE;

                return $row;
            });

        // ─────────────────────────────────────────
        // MONTHLY BOOKINGS
        // ─────────────────────────────────────────

        $monthly = Reservation::selectRaw("
                DATE_FORMAT(event_date, '%Y-%m') as month,
                COUNT(*) as total
            ")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // ─────────────────────────────────────────
        // MONTHLY REVENUE
        // ─────────────────────────────────────────

        $monthlyRevenue = $confirmedAll
            ->groupBy(function ($r) {
                return Carbon::parse($r->event_date)->format('Y-m');
            })
            ->map(function ($group) {
                return $group->sum(function ($r) {
                    return $this->computePrice($r);
                });
            })
            ->sortKeys();

        // ─────────────────────────────────────────
        // LAST 12 MONTHS
        // ─────────────────────────────────────────

        $last12 = collect();

        for ($i = 11; $i >= 0; $i--) {

            $key = now()->subMonths($i)->format('Y-m');

            $last12[$key] = [
                'bookings' =>
                    $monthly->firstWhere('month', $key)?->total ?? 0,

                'revenue' =>
                    $monthlyRevenue->get($key, 0),
            ];
        }

        // ─────────────────────────────────────────
        // WEEKLY SUMMARY
        // ─────────────────────────────────────────

        $weekly = collect();

        for ($w = 3; $w >= 0; $w--) {

            $start = now()->subWeeks($w)->startOfWeek();
            $end   = now()->subWeeks($w)->endOfWeek();

            $label =
                $start->format('M j')
                . ' – ' .
                $end->format('M j');

            $weekly[$label] = [

                'bookings' => Reservation::whereBetween(
                    'event_date',
                    [$start, $end]
                )->count(),

                'revenue' => Reservation::where('status', 'Confirmed')
                    ->whereBetween('event_date', [$start, $end])
                    ->get()
                    ->sum(function ($r) {
                        return $this->computePrice($r);
                    }),
            ];
        }

        // ─────────────────────────────────────────
        // TODAY'S SUMMARY
        // ─────────────────────────────────────────

        $todayBookings = Reservation::whereDate(
            'created_at',
            today()
        )->count();

        $todayRevenue = Reservation::where('status', 'Confirmed')
            ->whereDate('event_date', today())
            ->get()
            ->sum(function ($r) {
                return $this->computePrice($r);
            });

        // ─────────────────────────────────────────
        // RECENT CONFIRMED BOOKINGS
        // ─────────────────────────────────────────

        $recentConfirmed = Reservation::where(
                'status',
                'Confirmed'
            )
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($r) {

                $r->computed_price =
                    $this->computePrice($r);

                return $r;
            });

        // ─────────────────────────────────────────
        // REVIEW STATISTICS
        // ─────────────────────────────────────────

        $reviewStats = [
            'total' => Review::count(),

            'avg' => round(
                Review::avg('rating') ?? 0,
                1
            ),

            'five' => Review::where('rating', 5)->count(),
            'four' => Review::where('rating', 4)->count(),
            'three' => Review::where('rating', 3)->count(),
            'two' => Review::where('rating', 2)->count(),
            'one' => Review::where('rating', 1)->count(),
        ];

        // ─────────────────────────────────────────
        // BLOCKED DATES
        // FIX FOR: Undefined variable $blocked
        // ─────────────────────────────────────────

        $blocked = BlockedDate::orderBy('date')->get();

        // ─────────────────────────────────────────
        // RETURN VIEW
        // ─────────────────────────────────────────

        return view('admin.reports', compact(
            'stats',
            'totalRevenue',
            'potentialRevenue',
            'byVenue',
            'byService',
            'last12',
            'weekly',
            'todayBookings',
            'todayRevenue',
            'recentConfirmed',
            'reviewStats',
            'blocked'
        ));
    }
}