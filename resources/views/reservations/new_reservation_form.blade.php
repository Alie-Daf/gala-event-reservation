@extends('layouts.ui')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800;900&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

<style>
:root {
    --royal-blue-dark: #0A1628;
    --royal-blue: #102042;
    --royal-blue-light: #1B2F5E;
    --royal-blue-glow: #243B7A;
    --gold: #C9A03D;
    --gold-dark: #A67C2E;
    --gold-light: #D4AF37;
    --gold-soft: #F5D76E;
    --gold-pale: #FEF0C0;
    --white: #FFFFFF;
    --white-soft: #F5F2EB;
    --shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.15);
    --shadow-md: 0 10px 30px rgba(0, 0, 0, 0.25);
    --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.35);
    --shadow-gold: 0 0 25px rgba(201, 160, 61, 0.3);
    --transition-fast: 0.25s ease;
    --transition-base: 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    --error: #C97B84;
    --error-bg: rgba(201, 123, 132, 0.1);
    --success: #7C9D7C;
}

/* ========== GLOBAL ========== */
*, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.rr-root {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(145deg, var(--royal-blue-dark) 0%, var(--royal-blue) 50%, var(--royal-blue-light) 100%);
    color: var(--white-soft);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}

/* Satin-like Texture Overlay */
.rr-root::before {
    content: '';
    position: fixed;
    inset: 0;
    background: 
        repeating-linear-gradient(
            45deg,
            rgba(255, 255, 255, 0.02) 0px,
            rgba(255, 255, 255, 0.02) 2px,
            transparent 2px,
            transparent 8px
        ),
        radial-gradient(ellipse at 30% 40%, rgba(212, 175, 55, 0.06), transparent 60%),
        radial-gradient(ellipse at 80% 70%, rgba(255, 255, 255, 0.04), transparent 50%);
    pointer-events: none;
    z-index: 0;
}

/* Animated gold dust */
.rr-root::after {
    content: '';
    position: fixed;
    inset: 0;
    background: radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.08) 0%, transparent 40%);
    pointer-events: none;
    animation: subtleGlow 12s ease-in-out infinite alternate;
    z-index: 0;
}

@keyframes subtleGlow {
    0% { opacity: 0.3; transform: scale(1); }
    100% { opacity: 0.8; transform: scale(1.05); }
}

.rr-wrap {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem 2rem 3rem;
}

/* ========== ANIMATIONS ========== */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInLeft {
    from { opacity: 0; transform: translateX(-20px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* ========== PAGE HEADER ========== */
.rr-page-header {
    border-bottom: 2px solid rgba(212, 175, 55, 0.25);
    padding: 1.5rem 0 1.5rem;
    margin-bottom: 0;
    animation: fadeUp 0.6s ease both;
}

.rr-eyebrow {
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.rr-eyebrow::before {
    content: '';
    display: inline-block;
    width: 30px;
    height: 1px;
    background: linear-gradient(90deg, var(--gold), transparent);
}

.rr-eyebrow::after {
    content: '';
    display: inline-block;
    width: 30px;
    height: 1px;
    background: linear-gradient(270deg, var(--gold), transparent);
}

.rr-page-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 0.25rem;
}

.rr-page-subtitle {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.6);
    letter-spacing: 0.02em;
}

/* ========== ORNAMENT ========== */
.ornament {
    text-align: center;
    color: var(--gold);
    font-size: 1.2rem;
    letter-spacing: 0.3em;
    margin: 1.5rem 0;
    opacity: 0.6;
}

/* ========== LAYOUT ========== */
.rr-layout {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 2rem;
    align-items: start;
}

/* ========== FORM SECTIONS ========== */
.form-section {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 24px;
    padding: 1.8rem;
    margin-bottom: 1.5rem;
    animation: fadeUp 0.5s ease both;
    position: relative;
    transition: var(--transition-base);
}

.form-section:hover {
    border-color: rgba(212, 175, 55, 0.3);
    box-shadow: var(--shadow-sm);
}

.form-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light), transparent);
    border-radius: 24px 24px 0 0;
}

.form-section:nth-child(1) { animation-delay: 0.08s; }
.form-section:nth-child(2) { animation-delay: 0.14s; }
.form-section:nth-child(3) { animation-delay: 0.20s; }
.form-section:nth-child(4) { animation-delay: 0.26s; }

.section-label-royal {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.section-label-royal i {
    font-size: 1.1rem;
    color: var(--gold);
}

.section-label-royal::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, rgba(212, 175, 55, 0.3), transparent);
}

/* ========== FORM CONTROLS ========== */
.form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-label {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
    transition: color 0.2s;
}

.form-group:focus-within .form-label {
    color: var(--gold);
}

.form-label .optional {
    font-weight: 400;
    text-transform: none;
    letter-spacing: 0;
    font-size: 0.65rem;
    color: rgba(255, 255, 255, 0.4);
    margin-left: 0.25rem;
}

.form-control,
.form-textarea {
    font-family: 'Inter', sans-serif;
    font-size: 0.85rem;
    font-weight: 400;
    color: var(--white);
    background: rgba(16, 32, 66, 0.6);
    border: 1px solid rgba(212, 175, 55, 0.25);
    border-radius: 12px;
    padding: 0.7rem 1rem;
    outline: none;
    transition: var(--transition-fast);
    width: 100%;
}

.form-control:focus,
.form-textarea:focus {
    color: white;
    border-color: var(--gold);
    background: rgba(16, 32, 66, 0.9);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

.form-control::placeholder,
.form-textarea::placeholder {
    color: rgba(255, 255, 255, 0.4);
}

.form-textarea {
    resize: vertical;
    min-height: 90px;
    line-height: 1.6;
}

/* Validation States */
.form-control.is-invalid,
.form-textarea.is-invalid {
    border-color: var(--error);
    background: rgba(201, 123, 132, 0.1);
}

.field-error {
    font-size: 0.7rem;
    color: var(--error);
    margin-top: 0.25rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* ========== VENUE CARDS ========== */
.venue-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.venue-card {
    border: 1px solid rgba(212, 175, 55, 0.25);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: var(--transition-base);
    position: relative;
    background: rgba(16, 32, 66, 0.4);
}

.venue-card:hover {
    border-color: var(--gold);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.venue-card.selected {
    border-color: var(--gold);
    border-width: 2px;
    background: rgba(212, 175, 55, 0.05);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
}

.venue-img {
    height: 100px;
    overflow: hidden;
    background: linear-gradient(145deg, var(--royal-blue-light), var(--royal-blue-dark));
    display: flex;
    align-items: center;
    justify-content: center;
}

.venue-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.venue-card:hover .venue-img img {
    transform: scale(1.05);
}

.venue-body {
    padding: 0.75rem;
}

.venue-name {
    font-family: 'Playfair Display', serif;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--gold-light);
    display: block;
    margin-bottom: 0.2rem;
}

.venue-sub {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
}

.venue-check {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 22px;
    height: 22px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.venue-check i {
    font-size: 12px;
    color: var(--royal-blue-dark);
}

.venue-card.selected .venue-check {
    display: flex;
}

/* ========== SERVICE PILLS ========== */
.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
    gap: 0.75rem;
}

.service-pill {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 0.5rem;
    text-align: center;
    cursor: pointer;
    border: 1px solid rgba(212, 175, 55, 0.25);
    border-radius: 16px;
    background: rgba(16, 32, 66, 0.4);
    transition: var(--transition-fast);
    position: relative;
}

.service-pill:hover {
    border-color: var(--gold);
    background: rgba(212, 175, 55, 0.05);
    transform: translateY(-2px);
}

.service-pill.selected {
    border-color: var(--gold);
    border-width: 2px;
    background: rgba(212, 175, 55, 0.08);
    box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.15);
}

.service-icon-wrap {
    width: 80px;
    height: 60px;
    border-radius: 10%;
    background: rgba(212, 175, 55, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition-fast);
        overflow: hidden;  

}

.service-pill.selected .service-icon-wrap {
    background: rgba(212, 175, 55, 0.2);
}

.service-icon-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.service-pill-label {
    font-size: 0.7rem;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.7);
    letter-spacing: 0.03em;
    text-transform: uppercase;
}

.service-pill.selected .service-pill-label {
    color: var(--gold-light);
}

.service-pill-dot {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 8px;
    height: 8px;
    background: var(--gold);
    border-radius: 50%;
    display: none;
}

.service-pill.selected .service-pill-dot {
    display: block;
}

/* Other Textarea Reveal */
#otherInput {
    margin-top: 1rem;
    animation: fadeUp 0.3s ease;
}

/* ========== AVAILABILITY CALENDAR ========== */
.avail-calendar {
    background: rgba(16, 32, 66, 0.6);
    border: 1px solid rgba(212, 175, 55, 0.2);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    min-height: 60px;
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.avail-label {
    font-size: 0.7rem;
    font-weight: 500;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
    width: 100%;
    margin-bottom: 0.5rem;
}

.avail-date-tag {
    display: inline-block;
    background: rgba(201, 123, 132, 0.15);
    color: var(--error);
    border: 1px solid rgba(201, 123, 132, 0.3);
    border-radius: 20px;
    padding: 0.2rem 0.7rem;
    font-size: 0.7rem;
    font-weight: 500;
}

/* ========== BUTTONS ========== */
.btn-royal {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.7rem 1.8rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-base);
    cursor: pointer;
    border-radius: 40px;
}

.btn-gold {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: var(--royal-blue-dark);
    box-shadow: var(--shadow-sm);
    border: none;
}

.btn-gold:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-gold);
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
}

.btn-outline {
    background: transparent;
    color: var(--gold-light);
    border: 1.5px solid rgba(212, 175, 55, 0.5);
}

.btn-outline:hover {
    background: rgba(212, 175, 55, 0.1);
    border-color: var(--gold);
    transform: translateY(-2px);
}

/* ========== SUMMARY SIDEBAR ========== */
.summary-col {
    animation: fadeUp 0.5s 0.3s ease both;
}

.summary-card {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 24px;
    padding: 1.5rem;
    position: sticky;
    top: 2rem;
}

.summary-card::before {
    content: '';
    display: block;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light), transparent);
    margin: -1.5rem -1.5rem 1.5rem;
    border-radius: 24px 24px 0 0;
}

.summary-eyebrow {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 0.25rem;
}

.summary-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--gold-light);
    margin-bottom: 1.25rem;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    padding: 0.6rem 0;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    gap: 1rem;
}

.summary-row:last-of-type {
    border-bottom: none;
}

.summary-key {
    font-size: 0.65rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
    flex-shrink: 0;
}

.summary-val {
    font-size: 0.85rem;
    color: var(--gold-light);
    font-weight: 500;
    text-align: right;
    font-family: 'Playfair Display', serif;
}

.summary-price {
    color: var(--gold);
    font-weight: 700;
    font-size: 0.9rem;
}

.summary-empty {
    color: rgba(255, 255, 255, 0.4);
    font-style: italic;
}

.summary-divider {
    height: 1px;
    background: linear-gradient(90deg, rgba(212, 175, 55, 0.3), transparent);
    margin: 1rem 0;
}

.summary-notice {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
    line-height: 1.6;
    border-left: 2px solid var(--gold);
    padding-left: 0.75rem;
    margin-top: 0.5rem;
}

/* ========== ERROR ALERT ========== */
.error-alert {
    border: 1px solid rgba(201, 123, 132, 0.4);
    border-left: 4px solid var(--error);
    background: rgba(201, 123, 132, 0.1);
    backdrop-filter: blur(8px);
    border-radius: 16px;
    padding: 1rem 1.25rem;
    margin-bottom: 1.5rem;
    display: flex;
    gap: 0.75rem;
    align-items: flex-start;
    animation: fadeUp 0.4s ease;
}

.error-alert i {
    font-size: 1.2rem;
    color: var(--error);
    flex-shrink: 0;
}

.error-alert strong {
    font-weight: 600;
    color: var(--error);
}

.error-alert ul {
    margin-top: 0.5rem;
    padding-left: 1.25rem;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
}

.error-alert li {
    margin: 0.25rem 0;
}

/* ========== FORM ACTIONS ========== */
.form-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
    margin-top: 0.5rem;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .rr-layout {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .summary-col {
        order: -1;
    }
    
    .summary-card {
        position: static;
    }
    
    .venue-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    
    .rr-wrap {
        padding: 1rem;
    }
    
    .rr-page-title {
        font-size: 2rem;
    }
}

@media (max-width: 640px) {
    .form-row-2 {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    .venue-grid {
        grid-template-columns: 1fr;
    }
    
    .service-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .form-section {
        padding: 1.25rem;
    }
    
    .form-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-royal {
        justify-content: center;
    }
    
    .rr-page-title {
        font-size: 1.8rem;
    }
}

/* ========== LOADING STATE ========== */
.btn-gold.loading {
    opacity: 0.7;
    cursor: wait;
    pointer-events: none;
}
</style>

<div class="rr-root">
    <div class="rr-wrap">

        {{-- Page Header --}}
        <div class="rr-page-header">
            <div class="rr-eyebrow">✦ Schedule Your Event ✦</div>
            <h1 class="rr-page-title">New Reservation</h1>
            <p class="rr-page-subtitle">Complete the form below to secure your royal occasion</p>
        </div>

        <div class="ornament">✦ ✦ ✦</div>

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="error-alert">
                <i class="ti ti-alert-circle"></i>
                <div>
                    <strong>Please correct the following:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- Two-Column Layout --}}
        <div class="rr-layout">

            {{-- Form Column --}}
            <div class="form-col">
                <form action="" method="POST" id="reservationForm" novalidate>
                    @csrf

                    {{-- Client Information --}}
                    <div class="form-section">
                        <p class="section-label-royal">
                            <i class="ti ti-user"></i>
                            Client Information
                        </p>

                        <div class="form-group">
                            <label class="form-label" for="client_name">Full Name</label>
                            <input type="text" id="client_name" name="client_name"
                                   class="form-control @error('client_name') is-invalid @enderror"
                                   placeholder="Lady Evelyn or Sir William"
                                   value="{{ old('client_name') }}" required>
                            @error('client_name')
                                <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="noble@example.com"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       placeholder="+63 XXX XXX XXXX"
                                       value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Venue Selection --}}
                    <div class="form-section">
                        <p class="section-label-royal">
                            <i class="ti ti-building"></i>
                            Select a Venue
                        </p>

                        <input type="hidden" name="venue" id="venueInput" value="{{ old('venue') }}">

                        <div class="venue-grid">
                            @php
                                $venues = [
                                    ['val' => 'Garden', 'label' => 'Garden Oasis', 'sub' => 'Up to 250 guests · Outdoor', 'img' => 'images/1.png'],
                                    ['val' => 'Ballroom', 'label' => 'Grand Ballroom', 'sub' => 'Up to 500 guests · Indoor', 'img' => 'images/2.png'],
                                    ['val' => 'Coastal', 'label' => 'Coastal Retreat', 'sub' => 'Up to 300 guests · Seaside', 'img' => 'images/3.png'],
                                ];
                            @endphp

                            @foreach($venues as $v)
                                <div class="venue-card {{ old('venue') === $v['val'] ? 'selected' : '' }}"
                                     data-value="{{ $v['val'] }}" onclick="selectVenue(this)">
                                    <div class="venue-img">
                                        <img src="{{ asset($v['img']) }}" alt="{{ $v['label'] }}">
                                    </div>
                                    <div class="venue-body">
                                        <span class="venue-name">{{ $v['label'] }}</span>
                                        <span class="venue-sub">{{ $v['sub'] }}</span>
                                    </div>
                                    <div class="venue-check">
                                        <i class="ti ti-check"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @error('venue')
                            <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Event Type Selection --}}
                    <div class="form-section">
                        <p class="section-label-royal">
                            <i class="ti ti-sparkles"></i>
                            Event Service
                        </p>

                        <input type="hidden" name="event_type" id="serviceInput" value="{{ old('event_type') }}">

                        <div class="service-grid">
                            @php
                                $services = [
                                    ['val' => 'Debut', 'label' => 'Debut', 'img' => 'icons/1.png'],
                                    ['val' => 'Prom', 'label' => 'Prom', 'img' => 'icons/2.png'],
                                    ['val' => 'Reunion', 'label' => 'Reunion', 'img' => 'icons/3.png'],
                                    ['val' => 'Meeting', 'label' => 'Meeting', 'img' => 'icons/4.png'],
                                    ['val' => 'Wedding', 'label' => 'Wedding', 'img' => 'icons/5.png'],
                                    ['val' => 'Birthday', 'label' => 'Birthday', 'img' => 'icons/6.png'],
                                    ['val' => 'Outing', 'label' => 'Outing', 'img' => 'icons/7.png'],
                                    ['val' => 'Hangout', 'label' => 'Hangout', 'img' => 'icons/8.png'],
                                    ['val' => 'Other', 'label' => 'Other', 'img' => 'icons/9.png'],
                                ];
                            @endphp

                            @foreach($services as $s)
                                <div class="service-pill {{ old('event_type') === $s['val'] ? 'selected' : '' }}"
                                     data-value="{{ $s['val'] }}" onclick="selectService(this)">
                                    <span class="service-pill-dot"></span>
                                    <div class="service-icon-wrap">
                                        <img src="{{ asset($s['img']) }}" alt="{{ $s['label'] }}">
                                    </div>
                                    <span class="service-pill-label">{{ $s['label'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div id="otherInput" style="{{ old('event_type') === 'Other' ? 'display:block;' : 'display:none;' }}">
                            <textarea name="other_specification" class="form-textarea"
                                      placeholder="Please describe your event in detail...">{{ old('other_specification') }}</textarea>
                        </div>

                        @error('event_type')
                            <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Schedule & Details --}}
                    <div class="form-section">
                        <p class="section-label-royal">
                            <i class="ti ti-calendar-event"></i>
                            Event Schedule
                        </p>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label class="form-label" for="event_date">Event Date</label>
                                <input type="date" id="event_date" name="event_date"
                                       class="form-control @error('event_date') is-invalid @enderror"
                                       value="{{ old('event_date') }}" required>
                                @error('event_date')
                                    <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Event Time</label>
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:0.5rem;">
                                <select id="event_hour" class="form-control" style="cursor:pointer;">
                                    @for($h = 1; $h <= 12; $h++)
                                        <option value="{{ $h }}">{{ $h }}</option>
                                    @endfor
                                </select>
                                <select id="event_minute" class="form-control" style="cursor:pointer;">
                                    @foreach(['00','15','30','45'] as $m)
                                        <option value="{{ $m }}">{{ $m }}</option>
                                    @endforeach
                                </select>
                                <select id="event_ampm" class="form-control" style="cursor:pointer;">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                            <input type="hidden" name="event_time" id="event_time" value="{{ old('event_time') }}">
                            @error('event_time')
                                <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="guest_count">Number of Guests</label>
                            <input type="number" id="guest_count" name="guest_count"
                                   class="form-control @error('guest_count') is-invalid @enderror"
                                   placeholder="Enter guest count"
                                   value="{{ old('guest_count') }}" min="1" required>
                            @error('guest_count')
                                <span class="field-error"><i class="ti ti-alert-circle"></i>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="special_requests">
                                Special Requests
                                <span class="optional">(optional)</span>
                            </label>
                            <textarea id="special_requests" name="special_requests"
                                      class="form-textarea"
                                      placeholder="Dietary needs, decorations, accessibility requirements...">{{ old('special_requests') }}</textarea>
                        </div>

                        {{-- Availability Calendar --}}
                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar-x"></i>
                                Unavailable Dates
                            </label>
                            <div class="avail-calendar" id="availCalendar">
                                <span style="color: rgba(255,255,255,0.5); font-style: italic;">
                                    Select a venue to view availability
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-royal btn-gold">
                            <i class="ti ti-calendar-plus"></i>
                            Secure Reservation
                        </button>
                        <a href="/reservation/list" class="btn-royal btn-outline">
                            <i class="ti ti-arrow-left"></i>
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

            {{-- Summary Sidebar --}}
            <div class="summary-col">
                <div class="summary-card">
                    <div class="summary-eyebrow">Your Selection</div>
                    <div class="summary-title">Booking Summary</div>

                    <div class="summary-row">
                        <span class="summary-key">Venue</span>
                        <span class="summary-val" id="sumVenue">
                            <span class="summary-empty">—</span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-key">Service</span>
                        <span class="summary-val" id="sumService">
                            <span class="summary-empty">—</span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-key">Date</span>
                        <span class="summary-val" id="sumDate">
                            <span class="summary-empty">—</span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-key">Time</span>
                        <span class="summary-val" id="sumTime">
                            <span class="summary-empty">—</span>
                        </span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-key">Guests</span>
                        <span class="summary-val" id="sumGuests">
                            <span class="summary-empty">—</span>
                        </span>
                    </div>

                    {{-- PRICE BREAKDOWN (ADDED) --}}
                    <div class="summary-row">
                        <span class="summary-key">Venue Price</span>
                        <span class="summary-val summary-price" id="venuePriceDisplay">₱0</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-key">Service Price</span>
                        <span class="summary-val summary-price" id="servicePriceDisplay">₱0</span>
                    </div>
                    <div class="summary-row" style="border-top: 2px solid rgba(212, 175, 55, 0.3); margin-top: 0.2rem; padding-top: 0.8rem;">
                        <span class="summary-key">Total Price</span>
                        <span class="summary-val summary-price" id="totalPriceDisplay" style="font-size: 1rem; font-weight: 800;">₱0</span>
                    </div>

                    <div class="summary-divider"></div>

                    <p class="summary-notice">
                        <i class="ti ti-clock" style="font-size: 0.7rem; margin-right: 0.25rem;"></i>
                        Your booking will be confirmed within 24 hours. A confirmation will be sent to your email.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection

@section('script')
<script>
    // ========== PRICING DATA (mirroring AdminController) ==========
    window.venuePricing = {
        'Garden': 45000,
        'Ballroom': 75000,
        'Coastal': 55000,
    };
    window.servicePricing = {
        'Debut': 15000,
        'Wedding': 25000,
        'Prom': 12000,
        'Birthday': 10000,
        'Reunion': 8000,
        'Meeting': 5000,
        // 'Corporate' is not in the service list, but we include for safety
        'Corporate': 20000,
    };
    window.defaultVenuePrice = 50000;
    window.defaultServicePrice = 10000;

    function getVenuePrice(venueVal) {
        if (!venueVal) return 0;
        return window.venuePricing[venueVal] || window.defaultVenuePrice;
    }

    function getServicePrice(serviceVal) {
        if (!serviceVal) return 0;
        return window.servicePricing[serviceVal] || window.defaultServicePrice;
    }

    function formatPHP(amount) {
        return '₱' + amount.toLocaleString('en-PH');
    }

    function updatePrices() {
        const venueVal = document.getElementById('venueInput').value;
        const serviceVal = document.getElementById('serviceInput').value;
        const venuePrice = getVenuePrice(venueVal);
        const servicePrice = getServicePrice(serviceVal);
        const total = venuePrice + servicePrice;

        document.getElementById('venuePriceDisplay').innerText = formatPHP(venuePrice);
        document.getElementById('servicePriceDisplay').innerText = formatPHP(servicePrice);
        document.getElementById('totalPriceDisplay').innerText = formatPHP(total);
    }

    // Venue Selection
    function selectVenue(el) {
        document.querySelectorAll('.venue-card').forEach(card => {
            card.classList.remove('selected');
        });
        el.classList.add('selected');
        document.getElementById('venueInput').value = el.dataset.value;
        
        const venueName = el.querySelector('.venue-name')?.textContent.trim() || el.dataset.value;
        document.getElementById('sumVenue').innerHTML = venueName;
        
        loadCalendar(el.dataset.value);
        updatePrices();  // update prices when venue changes
    }

    // Service Selection
    function selectService(el) {
        document.querySelectorAll('.service-pill').forEach(pill => {
            pill.classList.remove('selected');
        });
        el.classList.add('selected');
        document.getElementById('serviceInput').value = el.dataset.value;
        
        const serviceName = el.querySelector('.service-pill-label')?.textContent.trim() || el.dataset.value;
        document.getElementById('sumService').innerHTML = serviceName;
        
        const otherInput = document.getElementById('otherInput');
        if (el.dataset.value === 'Other') {
            otherInput.style.display = 'block';
        } else {
            otherInput.style.display = 'none';
        }
        updatePrices();  // update prices when service changes
    }

    // Update Summary for Date, Time, Guests
    document.getElementById('event_date')?.addEventListener('change', function() {
        const val = this.value;
        if (!val) {
            document.getElementById('sumDate').innerHTML = '<span class="summary-empty">—</span>';
            return;
        }
        const date = new Date(val);
        const formatted = date.toLocaleDateString('en-PH', { year: 'numeric', month: 'long', day: 'numeric' });
        document.getElementById('sumDate').innerHTML = formatted;
    });

    document.getElementById('event_time')?.addEventListener('change', function() {
        const val = this.value;
        if (!val) {
            document.getElementById('sumTime').innerHTML = '<span class="summary-empty">—</span>';
            return;
        }
        document.getElementById('sumTime').innerHTML = val;
    });

    document.getElementById('guest_count')?.addEventListener('input', function() {
        const val = this.value;
        if (!val) {
            document.getElementById('sumGuests').innerHTML = '<span class="summary-empty">—</span>';
            return;
        }
        document.getElementById('sumGuests').innerHTML = Number(val).toLocaleString() + ' guests';
    });

    // Availability Calendar
    async function loadCalendar(venue) {
        const calDiv = document.getElementById('availCalendar');
        if (!calDiv) return;
        
        calDiv.innerHTML = '<span style="color: rgba(255,255,255,0.5);">Checking availability...</span>';
        
        try {
            const response = await fetch('/api/availability?venue=' + encodeURIComponent(venue || ''));
            const data = await response.json();
            const blocked = [...(data.booked || []), ...(data.blocked || [])];
            
            if (!blocked.length) {
                calDiv.innerHTML = '<span style="color: #7C9D7C;"><i class="ti ti-circle-check"></i> All dates are available</span>';
                return;
            }
            
            const tags = blocked.map(d => `<span class="avail-date-tag">${d}</span>`).join('');
            calDiv.innerHTML = '<span class="avail-label">Unavailable Dates</span>' + tags;
        } catch (error) {
            calDiv.innerHTML = '<span style="color: rgba(255,255,255,0.5);">Unable to load availability</span>';
        }
    }

    // Restore old values on page load
    document.addEventListener('DOMContentLoaded', () => {
        const oldVenue = document.getElementById('venueInput')?.value;
        const oldService = document.getElementById('serviceInput')?.value;
        
        if (oldVenue) {
            loadCalendar(oldVenue);
            // Also set venue name in summary if pre-selected
            const selectedVenueCard = document.querySelector(`.venue-card[data-value="${oldVenue}"]`);
            if (selectedVenueCard) {
                const venueName = selectedVenueCard.querySelector('.venue-name')?.textContent.trim() || oldVenue;
                document.getElementById('sumVenue').innerHTML = venueName;
            }
        }
        
        if (oldService) {
            const selectedServicePill = document.querySelector(`.service-pill[data-value="${oldService}"]`);
            if (selectedServicePill) {
                const serviceName = selectedServicePill.querySelector('.service-pill-label')?.textContent.trim() || oldService;
                document.getElementById('sumService').innerHTML = serviceName;
            }
        }
        
        // Trigger change events to restore summary for date/time/guests
        const dateInput = document.getElementById('event_date');
        const timeInput = document.getElementById('event_time');
        const guestInput = document.getElementById('guest_count');
        
        if (dateInput?.value) dateInput.dispatchEvent(new Event('change'));
        if (timeInput?.value) timeInput.dispatchEvent(new Event('change'));
        if (guestInput?.value) guestInput.dispatchEvent(new Event('input'));
        
        // Initial price calculation
        updatePrices();
    });

            function buildTimeString() {
    const hour   = document.getElementById('event_hour').value;
    const minute = document.getElementById('event_minute').value;
    const ampm   = document.getElementById('event_ampm').value;
    const val    = `${hour}:${minute} ${ampm}`;
    document.getElementById('event_time').value = val;
    const sumTime = document.getElementById('sumTime');
    if (sumTime) sumTime.innerHTML = val;
}

['event_hour','event_minute','event_ampm'].forEach(id => {
    document.getElementById(id)?.addEventListener('change', buildTimeString);
});

document.querySelector('form')?.addEventListener('submit', buildTimeString);

document.addEventListener('DOMContentLoaded', buildTimeString);
</script>
@endsection