@extends('layouts.ui')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800;900&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">

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
    --transition-slow: 0.5s ease;
}

/* ========== GLOBAL ========== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(145deg, var(--royal-blue-dark) 0%, var(--royal-blue) 50%, var(--royal-blue-light) 100%);
    color: var(--white-soft);
    overflow-x: hidden;
    position: relative;
}

body::before {
    content: "";
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

body::after {
    content: "";
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

/* ========== TYPOGRAPHY ========== */
h1, h2, h3, .hero-title, .page-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.hero-title {
    font-size: 4rem;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 0 2px 20px rgba(201, 160, 61, 0.3);
}

.page-title {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    position: relative;
    display: inline-block;
}

.page-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), transparent);
    border-radius: 3px;
}

.section-label {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.85rem;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 0.5rem;
    font-weight: 500;
}

/* ========== HERO SECTION ========== */
.hero-section {
    position: relative;
    border-radius: 28px;
    overflow: hidden;
    min-height: 580px;
    display: flex;
    align-items: flex-end;
    box-shadow: var(--shadow-lg);
    z-index: 1;
    margin-bottom: 2rem;
}

.hero-bg {
    position: absolute;
    inset: 0;
}

.hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 1.5s ease;
}

.hero-section:hover .hero-img {
    transform: scale(1.05);
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        145deg,
        rgba(10, 22, 40, 0.85) 0%,
        rgba(16, 32, 66, 0.7) 50%,
        rgba(27, 47, 94, 0.6) 100%
    );
}

.hero-content {
    position: relative;
    z-index: 2;
    padding: 3.5rem;
    animation: fadeUp 0.9s cubic-bezier(0.2, 0.9, 0.4, 1.1);
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to   { opacity: 1; transform: translateY(0); }
}

.hero-subtitle {
    font-size: 1.1rem;
    max-width: 500px;
    margin: 1rem 0 1.8rem;
    opacity: 0.9;
    line-height: 1.6;
}

.hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

/* ========== BUTTONS ========== */
.btn-primary-elegant {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: var(--royal-blue-dark) !important;
    padding: 12px 28px;
    border-radius: 40px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    font-weight: 700;
    font-family: 'Inter', sans-serif;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    transition: var(--transition-base);
    box-shadow: var(--shadow-sm);
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.btn-primary-elegant::before {
    content: "⚜️";
    position: absolute;
    left: -25px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1rem;
    opacity: 0;
    transition: var(--transition-base);
}

.btn-primary-elegant:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-gold);
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
    padding-left: 40px;
}

.btn-primary-elegant:hover::before {
    left: 15px;
    opacity: 1;
}

.btn-outline-teal {
    border: 1.5px solid rgba(212, 175, 55, 0.6);
    padding: 12px 24px;
    border-radius: 40px;
    text-decoration: none;
    color: var(--white);
    transition: var(--transition-base);
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(5px);
    font-weight: 500;
    font-size: 0.9rem;
    cursor: pointer;
}

.btn-outline-teal:hover {
    background: rgba(212, 175, 55, 0.15);
    border-color: var(--gold);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(212, 175, 55, 0.2);
}

/* ========== CARDS ========== */
.card-elegant {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(12px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 24px;
    padding: 1.5rem;
    transition: var(--transition-base);
    position: relative;
    overflow: hidden;
}

.card-elegant::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.05), transparent);
    opacity: 0;
    transition: var(--transition-base);
    pointer-events: none;
}

.card-elegant:hover {
    transform: translateY(-8px);
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.card-elegant:hover::before { opacity: 1; }

/* ========== SERVICE CARDS ========== */
.service-icon-wrap {
    width: 100%;
    height: 160px;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, rgba(27, 47, 94, 0.5), rgba(16, 32, 66, 0.8));
}

.service-icon-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.7s ease;
}

.card-elegant:hover .service-icon-wrap img { transform: scale(1.08); }

.service-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0.75rem 0 0.5rem;
    color: var(--gold-light);
}

.service-desc { font-size: 0.85rem; line-height: 1.5; opacity: 0.85; }
.service-price {
    margin-top: 0.75rem;
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 600;
    color: var(--gold-light);
    letter-spacing: 0.02em;
}

/* ========== VENUE PREVIEW CARDS ========== */
.venue-preview-img {
    width: 100%; height: 180px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    margin-bottom: 1rem;
    background: linear-gradient(145deg, var(--royal-blue-light), var(--royal-blue-dark));
}

.venue-preview-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
}

.card-elegant:hover .venue-preview-img img { transform: scale(1.08); }

.venue-preview-tag {
    position: absolute;
    top: 12px; left: 12px;
    background: rgba(201, 160, 61, 0.9);
    color: var(--royal-blue-dark);
    font-size: 0.7rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    letter-spacing: 1px;
    backdrop-filter: blur(4px);
}

.venue-preview-detail { font-size: 0.8rem; margin: 0.25rem 0; opacity: 0.85; }
.venue-preview-detail strong { color: var(--gold-light); font-weight: 600; }

/* ========== GRID LAYOUTS ========== */
.services-grid,
.venues-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    position: relative;
    z-index: 1;
    margin-top: 1rem;
}

/* ========== CTA SECTION ========== */
.cta-section {
    margin-top: 4rem;
    text-align: center;
    padding: 3rem 2rem;
    border-radius: 28px;
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(12px);
    border: 1px solid rgba(212, 175, 55, 0.2);
    position: relative;
    z-index: 1;
    transition: var(--transition-base);
}

.cta-section:hover {
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: var(--shadow-gold);
}

.cta-section .page-title { margin-bottom: 1rem; }

.cta-section .page-title::after {
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
}

.cta-section p { max-width: 500px; margin: 0 auto 1.5rem; opacity: 0.9; }

/* ========== REVIEWS (matched to dashboard style) ========== */
.reviews-section {
    margin-top: 4rem;
    position: relative;
    z-index: 1;
}

.form-section {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 24px;
    padding: 1.5rem;
    margin-top: 1.5rem;
    transition: var(--transition-base);
    position: relative;
    overflow: hidden;
}

.form-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light), transparent);
}

.form-section:hover {
    border-color: rgba(212, 175, 55, 0.3);
    box-shadow: var(--shadow-sm);
}

.form-section-label {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-section-label::before {
    content: '✦';
    color: var(--gold);
}

.review-item {
    padding: 1rem 0;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    transition: var(--transition-fast);
}

.review-item:last-child { border-bottom: none; }

.review-item:hover {
    padding-left: 0.5rem;
    border-bottom-color: rgba(212, 175, 55, 0.3);
}

.review-author {
    font-family: 'Playfair Display', serif;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--gold-light);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.review-stars {
    color: var(--gold);
    font-size: 0.8rem;
    letter-spacing: 2px;
}

.review-comment {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.7);
    margin-top: 0.5rem;
    line-height: 1.5;
}

.empty-state {
    text-align: center;
    padding: 2rem;
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.85rem;
    font-style: italic;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .services-grid, .venues-row { grid-template-columns: repeat(2, 1fr); gap: 1.2rem; }
    .hero-title { font-size: 3rem; }
    .hero-content { padding: 2rem; }
}

@media (max-width: 640px) {
    .services-grid, .venues-row { grid-template-columns: 1fr; }
    .hero-title { font-size: 2.2rem; }
    .hero-section { min-height: 480px; }
    .page-title { font-size: 1.8rem; }
    .hero-content { padding: 1.8rem; }
    .btn-primary-elegant, .btn-outline-teal { padding: 8px 20px; font-size: 0.85rem; }
}

/* ========== ANIMATIONS ========== */
.card-elegant {
    animation: fadeInScale 0.5s ease backwards;
    animation-delay: calc(var(--i, 0) * 0.05s);
}

@keyframes fadeInScale {
    from { opacity: 0; transform: translateY(30px) scale(0.95); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

.services-grid .card-elegant:nth-child(1) { --i: 1; }
.services-grid .card-elegant:nth-child(2) { --i: 2; }
.services-grid .card-elegant:nth-child(3) { --i: 3; }
.services-grid .card-elegant:nth-child(4) { --i: 4; }
.services-grid .card-elegant:nth-child(5) { --i: 5; }
.services-grid .card-elegant:nth-child(6) { --i: 6; }
.venues-row .card-elegant:nth-child(1) { --i: 1; }
.venues-row .card-elegant:nth-child(2) { --i: 2; }
.venues-row .card-elegant:nth-child(3) { --i: 3; }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.body.style.opacity = "0";
    document.body.style.transition = "opacity 0.6s ease";
    document.body.style.opacity = "1";

    const cards = document.querySelectorAll('.card-elegant');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform = "translateY(30px)";
        card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
        observer.observe(card);
    });
});
</script>

{{-- ================= HERO SECTION ================= --}}
<div class="hero-section">
    <div class="hero-bg">
        <img src="image.jpeg" alt="Luxury Event Venue" class="hero-img" onerror="this.style.display='none'">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <p class="section-label">✦ Hala! ✦</p>
        <h1 class="hero-title">Gagi May Event Pala</h1>
        <p class="hero-subtitle">
            GÁLA is a premium event reservation platform that blends
            Filipino warmth with refined elegance. Whether you're planning a grand debut,
            an intimate wedding, or a casual hangout with your barkada, GÁLA makes booking your perfect venue feel as effortless as the celebration itself.
        </p>
        <div class="hero-actions">
            <a href="/reservation/new" class="btn-primary-elegant">Book Now</a>
            <a href="/venues" class="btn-outline-teal">Explore Venues</a>
        </div>
    </div>
</div>

{{-- ================= EVENT SERVICES ================= --}}
<div style="margin-top: 4rem; position: relative; z-index: 1;">
    <p class="section-label">✦ What We Offer ✦</p>
    <h2 class="page-title">Event Services</h2>
    <p style="margin-top: 0.5rem; opacity: 0.8;">Curated experiences for every occasion</p>

    <div class="services-grid">
        @php
            $services = [
                ['name'=>'Debut',    'desc'=>'Celebrate a young woman\'s 18th birthday in elegant royal style.',        'img'=>'icons/1.png', 'price'=>'₱15,000 + venue fee'],
                ['name'=>'Prom',     'desc'=>'The perfect prom experience with stunning backdrops and memories.',        'img'=>'icons/2.png', 'price'=>'₱12,000 + venue fee'],
                ['name'=>'Wedding',  'desc'=>'Your dream wedding brought to life with romantic ambiance.',               'img'=>'icons/5.png', 'price'=>'₱25,000 + venue fee'],
                ['name'=>'Birthday', 'desc'=>'Celebrate another year in a beautiful, personalized setting.',            'img'=>'icons/6.png', 'price'=>'₱10,000 + venue fee'],
                ['name'=>'Reunion',  'desc'=>'Reconnect with family and friends in a warm atmosphere.',                 'img'=>'icons/3.png', 'price'=>'₱8,000 + venue fee'],
                ['name'=>'Meeting',  'desc'=>'Professional corporate events with full AV support.',                     'img'=>'icons/4.png', 'price'=>'₱5,000 + venue fee'],
                ['name'=>'Outing',   'desc'=>'Fun group outings and team-building activities in a scenic setting.',     'img'=>'icons/7.png', 'price'=>'₱10,000 + venue fee'],
                ['name'=>'Hangout',  'desc'=>'Casual, relaxed gatherings for friends and groups of all sizes.',         'img'=>'icons/8.png', 'price'=>'₱10,000 + venue fee'],
                ['name'=>'Other',    'desc'=>'Have something unique in mind? We\'ll tailor the experience for you.',   'img'=>'icons/9.png', 'price'=>'₱10,000 + venue fee'],
            ];
        @endphp

        @foreach($services as $s)
        <div class="card-elegant">
            <div class="service-icon-wrap">
                <img src="{{ $s['img'] }}" alt="{{ $s['name'] }}">
            </div>
            <h5 class="service-name">{{ $s['name'] }}</h5>
            <p class="service-desc">{{ $s['desc'] }}</p>
            <p class="service-price">{{ $s['price'] }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- ================= VENUE HIGHLIGHTS ================= --}}
<div style="margin-top: 4rem; position: relative; z-index: 1;">
    <p class="section-label">✦ Our Spaces ✦</p>
    <h2 class="page-title">Venue Highlights</h2>
    <p style="margin-top: 0.5rem; opacity: 0.8;">Exceptional venues for extraordinary events</p>

    <div class="venues-row">
        @php
        $venues = [
            ['name'=>'Garden Oasis',    'cap'=>'Up to 250 guests', 'tag'=>'Outdoor', 'best'=>'Weddings, Debut, Reunions',    'img'=>'images/1.png', 'price'=>'₱45,000'],
            ['name'=>'Grand Ballroom',  'cap'=>'Up to 500 guests', 'tag'=>'Indoor',  'best'=>'Proms, Galas, Meetings',       'img'=>'images/2.png', 'price'=>'₱75,000'],
            ['name'=>'Coastal Retreat', 'cap'=>'Up to 300 guests', 'tag'=>'Seaside', 'best'=>'Birthdays, Outings, Weddings', 'img'=>'images/3.png', 'price'=>'₱55,000'],
        ];
        @endphp

        @foreach($venues as $v)
        <div class="card-elegant">
            <div class="venue-preview-img">
                <img src="{{ $v['img'] }}" alt="{{ $v['name'] }}">
                <span class="venue-preview-tag">{{ $v['tag'] }}</span>
            </div>
            <h5 class="service-name">{{ $v['name'] }}</h5>
            <p class="venue-preview-detail"><strong>Capacity:</strong> {{ $v['cap'] }}</p>
            <p class="venue-preview-detail"><strong>Best for:</strong> {{ $v['best'] }}</p>
            <p class="venue-preview-detail"><strong>Price:</strong> {{ $v['price'] }}</p>
            <a href="/reservation/new" class="btn-primary-elegant" style="margin-top: 1rem; display: inline-block;">Book This Venue</a>
        </div>
        @endforeach
    </div>
</div>

{{-- ================= CALL TO ACTION ================= --}}
<div class="cta-section">
    <p class="section-label">✦ Ready to Begin? ✦</p>
    <h2 class="page-title">Book Your Perfect Event</h2>
    <p>Complete our quick reservation form and our royal concierge will confirm your booking within 24 hours.</p>
    <a href="/reservation/new" class="btn-primary-elegant">Make a Reservation</a>
</div>

{{-- ================= REVIEWS ================= --}}
<div class="reviews-section">
    <h2 class="page-title">What Our Clients Say</h2>

    <div class="form-section">
        <p class="form-section-label">Client Testimonials</p>

        @forelse($reviews as $rv)
        <div class="review-item">
            <div class="review-author">
                {{ $rv->reservation->client_name ?? 'Guest' }}
                <span class="review-stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $rv->rating) ★ @else ☆ @endif
                    @endfor
                </span>
            </div>
            @if($rv->comment)
                <p class="review-comment">"{{ $rv->comment }}"</p>
            @endif
        </div>
        @empty
        <div class="empty-state">
            <i class="ti ti-message-star" style="font-size: 1.5rem; opacity: 0.5;"></i>
            <p>No reviews yet</p>
        </div>
        @endforelse
    </div>
</div>

@endsection