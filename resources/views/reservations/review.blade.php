@extends('layouts.ui')

@section('content')

<p class="section-label">Post-Event</p>

<h1 class="page-title">Leave a Review</h1>

<p class="page-subtitle">
    {{ $reservation->client_name }} ·
    {{ $reservation->event_type }} at
    {{ $reservation->venue }}
</p>

<div class="page-divider"></div>

<div class="review-wrapper">
    <form action="/reservation/{{ $reservation->id }}/review" method="POST">
        @csrf

        <div class="form-section">
            <p class="form-section-label">Your Rating</p>

            <div class="star-rating" id="starRating">
                @for($i = 1; $i <= 5; $i++)
                    <span class="star"
                        data-value="{{ $i }}"
                        onclick="setRating({{ $i }})">
                        &#9733;
                    </span>
                @endfor
            </div>

            <input type="hidden" name="rating" id="ratingInput">

            <div class="form-group-elegant">
                <label class="form-label-elegant">
                    Comments (optional)
                </label>

                <textarea
                    name="comment"
                    class="review-textarea"
                    rows="5"
                    placeholder="Tell us about your experience..."></textarea>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert-elegant">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="review-actions">
            <button type="submit" class="btn-primary-elegant">
                Submit Review
            </button>

            <a href="/reservation/list" class="btn-secondary-elegant">
                Skip
            </a>
        </div>
    </form>
</div>

<style>
    .review-wrapper {
        max-width: 620px;
    }

    .star-rating {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        margin-bottom: 24px;
    }

    .star {
        font-size: 2.5rem;
        color: rgba(255,255,255,0.25);
        cursor: pointer;
        transition: 0.2s ease;
    }

    .star:hover,
    .star.active {
        color: #f4c430;
        transform: scale(1.05);
    }

    .form-group-elegant {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .form-label-elegant {
        font-size: 1rem;
        font-weight: 600;
        color: #f5f5f5;
    }

    .review-textarea {
        width: 100%;
        min-height: 140px;

        padding: 16px 18px;

        border-radius: 14px;
        border: 1px solid rgba(255,255,255,0.12);

        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(8px);

        color: #fff;
        font-size: 1rem;
        line-height: 1.6;

        resize: vertical;

        outline: none;
        transition: all 0.2s ease;
    }

    .review-textarea::placeholder {
        color: rgba(255,255,255,0.45);
    }

    .review-textarea:focus {
        border-color: #f4c430;
        box-shadow: 0 0 0 3px rgba(244,196,48,0.15);
        background: rgba(255,255,255,0.07);
    }

    .review-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 24px;
    }

    .btn-secondary-elegant {
        color: #d7b56d;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-secondary-elegant:hover {
        text-decoration: underline;
    }

    .alert-elegant {
        margin-top: 16px;
        color: #ff6b6b;
    }
</style>

@endsection

@section('script')
<script>
    function setRating(val) {
        document.getElementById('ratingInput').value = val;

        document.querySelectorAll('.star').forEach((s, i) => {
            s.classList.toggle('active', i < val);
        });
    }
</script>
@endsection