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

/* ========== SECTION HEADER ========== */
.venues-header {
    text-align: center;
    margin-bottom: 3rem;
    position: relative;
    z-index: 1;
}

.section-label {
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.85rem;
    letter-spacing: 6px;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 0.75rem;
    font-weight: 500;
}

.page-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 1rem;
}

.page-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.7);
    max-width: 600px;
    margin: 0 auto;
}

/* ========== VENUES LIST ========== */
.venues-list {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    position: relative;
    z-index: 1;
}

/* ========== VENUE CARD ========== */
.venue-card {
    display: flex;
    overflow: hidden;
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(12px);
    border-radius: 28px;
    border: 1px solid rgba(212, 175, 55, 0.15);
    transition: var(--transition-base);
    position: relative;
}

.venue-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.05), transparent);
    opacity: 0;
    transition: var(--transition-base);
    pointer-events: none;
    border-radius: 28px;
}

.venue-card:hover {
    transform: translateY(-5px);
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: var(--shadow-lg);
}

.venue-card:hover::before {
    opacity: 1;
}

/* Image Column */
.venue-card-img-col {
    position: relative;
    flex: 0 0 340px;
    min-height: 300px;
    overflow: hidden;
    background: linear-gradient(145deg, var(--royal-blue-light), var(--royal-blue-dark));
    border-radius: 24px 0 0 24px;
}

.venue-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s ease;
    display: block;
}

.venue-card:hover .venue-card-img {
    transform: scale(1.06);
}

/* Number Badge (Roman Numeral Style) */
.venue-num-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    color: var(--royal-blue-dark);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 800;
    letter-spacing: 0.05em;
    box-shadow: var(--shadow-sm);
    z-index: 2;
}

/* Venue Tag */
.venue-tag {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: rgba(16, 32, 66, 0.85);
    backdrop-filter: blur(8px);
    color: var(--gold-light);
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 30px;
    border: 1px solid rgba(212, 175, 55, 0.3);
    z-index: 2;
}

/* Body Column */
.venue-card-body {
    flex: 1;
    padding: 2rem 2rem 2rem 2rem;
    display: flex;
    flex-direction: column;
}

.venue-name {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 0.75rem;
    letter-spacing: -0.5px;
}

.venue-desc {
    font-size: 0.9rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 1.25rem;
}

/* Features Grid */
.venue-features {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.6rem 1rem;
}

.venue-features li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.75);
    transition: var(--transition-fast);
}

.venue-features li:hover {
    color: var(--gold-light);
    transform: translateX(3px);
}

.feat-check {
    width: 22px;
    height: 22px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(212, 175, 55, 0.15);
    border-radius: 50%;
    transition: var(--transition-fast);
}

.venue-features li:hover .feat-check {
    background: rgba(212, 175, 55, 0.3);
}

.feat-check img {
    width: 12px;
    height: 12px;
    object-fit: contain;
    filter: brightness(0) invert(1);
}

/* Button */
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
    width: fit-content;
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

.btn-icon {
    width: 14px;
    height: 14px;
    object-fit: contain;
    filter: brightness(0);
}

/* Decorative Corner Elements */
.venue-card::after {
    content: "✦";
    position: absolute;
    bottom: 20px;
    right: 25px;
    font-size: 1.2rem;
    color: rgba(212, 175, 55, 0.3);
    pointer-events: none;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .venue-card {
        flex-direction: column;
        border-radius: 28px;
    }
    
    .venue-card-img-col {
        flex: none;
        height: 260px;
        border-radius: 28px 28px 0 0;
    }
    
    .venue-card-body {
        padding: 1.5rem;
    }
    
    .venue-name {
        font-size: 1.5rem;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 640px) {
    .venue-features {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }
    
    .venue-card-body {
        padding: 1.25rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .section-label {
        letter-spacing: 4px;
    }
    
    .venue-num-badge {
        width: 38px;
        height: 38px;
        font-size: 1rem;
        top: 15px;
        left: 15px;
    }
    
    .venue-tag {
        bottom: 15px;
        left: 15px;
        font-size: 0.6rem;
        padding: 4px 10px;
    }
}

/* ========== ANIMATIONS ========== */
.venue-card {
    animation: fadeInUp 0.6s ease backwards;
}

.venue-card:nth-child(1) { animation-delay: 0.1s; }
.venue-card:nth-child(2) { animation-delay: 0.2s; }
.venue-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Ornamental divider */
.page-divider {
    width: 80px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), transparent);
    margin: 1rem auto 2rem;
    border-radius: 2px;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Smooth reveal animation for cards
    const cards = document.querySelectorAll('.venue-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform = "translateY(30px)";
        card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
        observer.observe(card);
    });
});
</script>

{{-- ================= VENUES SECTION ================= --}}
<div class="venues-header">
    <p class="section-label">✦ Our Spaces ✦</p>
    <h1 class="page-title">Our Venues</h1>
    <p class="page-subtitle">Three exclusive settings, each designed for a different kind of magical experience</p>
    <div class="page-divider"></div>
</div>

@php
$venues = [
    [
        'num'  => 'I',
        'name' => 'Garden Oasis',
        'tag'  => 'Outdoor',
        'desc' => 'Surrounded by lush greenery and blooming flowers, our garden venue provides a naturally elegant setting. The open landscape and fresh air make it an ideal backdrop for sophisticated and intimate celebrations.',
        'features' => ['Capacity: Up to 250 guests', 'Natural landscape & floral setup', 'Gazebo & walkway included', 'Best for: Debut, Wedding, Reunion'],
        'img'  => 'images/1.png',
    ],
    [
        'num'  => 'II',
        'name' => 'Grand Ballroom',
        'tag'  => 'Indoor',
        'desc' => 'Our grand ballroom is the epitome of elegance. Fully air-conditioned with high ceilings, crystal chandeliers, and a large dance floor — perfect for formal proms, wedding receptions, and grand debut celebrations.',
        'features' => ['Capacity: Up to 500 guests', 'Fully air-conditioned', 'Sound system & stage included', 'Best for: Prom, Wedding, Meeting'],
        'img'  => 'images/2.png',
    ],
    [
        'num'  => 'III',
        'name' => 'Coastal Retreat',
        'tag'  => 'Seaside',
        'desc' => 'Experience the magic of celebrating by the sea. Our coastal venue offers a breathtaking open-air setting with natural ocean breeze, sunset views, and a serene atmosphere perfect for intimate events.',
        'features' => ['Capacity: Up to 300 guests', 'Open-air with tent option', 'Beachfront access included', 'Best for: Debut, Birthday, Outing'],
        'img'  => 'images/3.png',
    ],
];
@endphp

<div class="venues-list">
@foreach($venues as $v)
<div class="venue-card">
    <div class="venue-card-img-col">
        <img src="{{ $v['img'] }}" alt="{{ $v['name'] }}" class="venue-card-img" onerror="this.parentElement.style.background='linear-gradient(145deg, #1B2F5E, #0A1628)'">
        <div class="venue-num-badge">{{ $v['num'] }}</div>
        <span class="venue-tag">{{ $v['tag'] }}</span>
    </div>
    <div class="venue-card-body">
        <h3 class="venue-name">{{ $v['name'] }}</h3>
        <p class="venue-desc">{{ $v['desc'] }}</p>
        <ul class="venue-features">
            @foreach($v['features'] as $f)
            <li>
                <span class="feat-check">
                    <img src="icon.png" alt="✓" onerror="this.outerHTML='✓'">
                </span>
                {{ $f }}
            </li>
            @endforeach
        </ul>
        <a href="/reservation/new" class="btn-primary-elegant">
            Book This Venue
        </a>
    </div>
</div>
@endforeach
</div>

@endsection