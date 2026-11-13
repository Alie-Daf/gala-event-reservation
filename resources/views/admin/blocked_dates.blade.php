@extends('layouts.ui')

@section('content')

<p class="section-label">Administration</p>

<h1 class="page-title">Blocked Dates</h1>

<div class="page-divider"></div>

@if(session('success'))
    <div class="alert-success-elegant">
        {{ session('success') }}
    </div>
@endif

<div class="blocked-wrapper">

    {{-- BLOCK DATE FORM --}}
    <div class="form-section blocked-card">

        <p class="form-section-label">Block a Date</p>

        <form action="/admin/blocked-dates" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group-elegant">
                    <label class="form-label-elegant">
                        Date to Block
                    </label>

                    <input
                        type="date"
                        name="date"
                        class="elegant-input"
                        required>
                </div>

                <div class="form-group-elegant">
                    <label class="form-label-elegant">
                        Reason (optional)
                    </label>

                    <input
                        type="text"
                        name="reason"
                        class="elegant-input"
                        placeholder="e.g. Maintenance">
                </div>

            </div>

            @error('date')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <button
                type="submit"
                class="btn-primary-elegant block-btn">
                Block Date
            </button>
        </form>
    </div>

    {{-- BLOCKED DATES LIST --}}
    <div class="form-section blocked-card">

        <p class="form-section-label">Currently Blocked</p>

        @forelse($blocked as $b)

            <div class="blocked-item">

                <div class="blocked-info">
                    <strong>
                        {{ \Carbon\Carbon::parse($b->date)->format('F j, Y') }}
                    </strong>

                    @if($b->reason)
                        <span class="blocked-reason">
                            — {{ $b->reason }}
                        </span>
                    @endif
                </div>

                <a href="/admin/blocked-dates/delete/{{ $b->id }}"
                   onclick="return confirm('Unblock this date?')"
                   class="btn-danger-elegant unblock-btn">
                    Unblock
                </a>

            </div>

        @empty

            <div class="empty-state">
                No dates blocked.
            </div>

        @endforelse

    </div>
</div>

<style>

    .blocked-wrapper {
        max-width: 850px;
    }

    .blocked-card {
        margin-bottom: 28px;

        padding: 28px;

        border-radius: 20px;

        background: rgba(255,255,255,0.04);

        border: 1px solid rgba(255,255,255,0.08);

        backdrop-filter: blur(10px);

        box-shadow:
            0 10px 30px rgba(0,0,0,0.18);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    .form-group-elegant {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .form-label-elegant {
        color: #f5f5f5;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .elegant-input {
        width: 100%;

        height: 52px;

        padding: 0 16px;

        border-radius: 14px;

        border: 1px solid rgba(255,255,255,0.12);

        background: rgba(255,255,255,0.05);

        color: #fff;

        font-size: 0.95rem;

        outline: none;

        transition: all 0.2s ease;
    }

    .elegant-input::placeholder {
        color: rgba(255,255,255,0.45);
    }

    .elegant-input:focus {
        border-color: #f4c430;

        box-shadow:
            0 0 0 3px rgba(244,196,48,0.15);

        background: rgba(255,255,255,0.07);
    }

    .block-btn {
        margin-top: 20px;
    }

    .blocked-item {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 16px;

        padding: 16px 0;

        border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .blocked-item:last-child {
        border-bottom: none;
    }

    .blocked-info {
        color: #fff;

        font-size: 0.95rem;
    }

    .blocked-reason {
        color: rgba(255,255,255,0.55);

        font-size: 0.85rem;
    }

    .unblock-btn {
        padding: 8px 14px;

        border-radius: 10px;

        font-size: 0.75rem;

        white-space: nowrap;
    }

    .empty-state {
        padding: 18px 0;

        color: rgba(255,255,255,0.5);

        font-size: 0.9rem;
    }

    .error-text {
        margin-top: 10px;

        color: #ff6b6b;

        font-size: 0.85rem;
    }

    .alert-success-elegant {
        margin-bottom: 20px;

        padding: 14px 18px;

        border-radius: 14px;

        background: rgba(46, 204, 113, 0.12);

        border: 1px solid rgba(46, 204, 113, 0.25);

        color: #7dffb3;

        font-weight: 500;
    }

</style>

@endsection