<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Review;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'client_name',
        'email',
        'phone',
        'event_type',
        'other_specification',
        'venue',
        'event_date',
        'event_time',
        'guest_count',
        'special_requests',
        'status',
        'review_prompted',
    ];

    protected $casts = [
        'event_date'      => 'date',
        'review_prompted' => 'boolean',
    ];

    // ── Relationships ──────────────────────────────────────────────────────

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ── Helpers ───────────────────────────────────────────────────────────

    /**
     * True if the event date has already passed.
     */
    public function isCompleted(): bool
    {
        return Carbon::parse($this->event_date)->isPast();
    }

    /**
     * True if this reservation is eligible for a review:
     * - event date has passed
     * - status is Confirmed (not cancelled)
     * - no review has been submitted yet
     */
    public function canBeReviewed(): bool
    {
        return $this->isCompleted()
            && $this->status === 'Confirmed'
            && ! $this->review;
    }

    // ── Scopes ────────────────────────────────────────────────────────────

    /**
     * Returns reservations that need a review prompt shown to the user.
     * Used on the list page to surface the gentle nudge banner.
     */
    public function scopePendingReview($query, int $userId): Builder

    {
        return $query
            ->where('user_id', $userId)
            ->where('status', 'Confirmed')
            ->whereDate('event_date', '<', now())
            ->whereDoesntHave('review');
    }
}