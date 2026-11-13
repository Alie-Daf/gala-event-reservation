<?php

namespace App\Http\Controllers;

use App\Models\Review;

class PageController extends Controller
{
    /**
     * Public homepage.
     *
     * FIX: was returning view() with no data → $reviews undefined error
     * NOW: queries the Review model and passes $reviews, $avgRating,
     *      $totalReviews to the view so the reviews section can render.
     */
 public function home()
{
    $services = [
        [
            'name' => 'Wedding',
            'desc' => 'Elegant wedding celebrations with full coordination.',
            'price' => 25000,
            'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200'
        ],
        [
            'name' => 'Birthday',
            'desc' => 'Memorable birthday parties for all ages.',
            'price' => 10000,
            'img' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?q=80&w=1200'
        ],
        [
            'name' => 'Corporate',
            'desc' => 'Professional corporate meetings and events.',
            'price' => 20000,
            'img' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1200'
        ],
    ];

    $venues = [
        [
            'name' => 'Garden Oasis',
            'cap' => '150 Guests',
            'best' => 'Outdoor Weddings',
            'price' => 45000,
            'tag' => 'GARDEN',
            'img' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=1200'
        ],
        [
            'name' => 'Grand Ballroom',
            'cap' => '500 Guests',
            'best' => 'Luxury Receptions',
            'price' => 75000,
            'tag' => 'BALLROOM',
            'img' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=1200'
        ],
        [
            'name' => 'Coastal Retreat',
            'cap' => '200 Guests',
            'best' => 'Beach Events',
            'price' => 55000,
            'tag' => 'COASTAL',
            'img' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200'
        ],
    ];

    $reviews = Review::with('reservation')
        ->where('rating', '>=', 3)
        ->whereNotNull('comment')
        ->where('comment', '!=', '')
        ->latest()
        ->take(6)
        ->get();

    $avgRating = round(Review::avg('rating') ?? 0, 1);
    $totalReviews = Review::count();

    return view('pages.home', compact(
        'services',
        'venues',
        'reviews',
        'avgRating',
        'totalReviews'
    ));
}
    public function venues()
    {
        return view('pages.venues');
    }
}