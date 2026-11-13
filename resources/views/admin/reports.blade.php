@extends('layouts.ui')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

<style>
:root {
    --royal-blue-dark: #0A1628;
    --royal-blue: #102042;
    --royal-blue-light: #1B2F5E;
    --gold: #C9A03D;
    --gold-dark: #A67C2E;
    --gold-light: #D4AF37;
    --gold-soft: #F5D76E;
    --white: #FFFFFF;
    --white-soft: #F5F2EB;
    --shadow-sm: 0 4px 20px rgba(0,0,0,.15);
    --shadow-md: 0 10px 30px rgba(0,0,0,.25);
    --shadow-gold: 0 0 25px rgba(201,160,61,.3);
    --green: #7C9D7C;
    --red: #C97B84;
    --transition: .3s cubic-bezier(.2,.9,.4,1.1);
}

.rep-root {
    font-family: 'Inter', sans-serif;
    color: var(--white-soft);
    position: relative;
}

/* ── Page header ── */
.rep-header {
    border-bottom: 2px solid rgba(212,175,55,.25);
    padding-bottom: 1.5rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
    animation: fadeUp .6s ease both;
}

.rep-eyebrow {
    font-family: 'Cormorant Garamond', serif;
    font-size: .75rem;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: .5rem;
}

.rep-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #fff 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.page-divider {
    width: 80px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), transparent);
    margin: .75rem 0 1rem;
    border-radius: 2px;
}

/* ── Cards ── */
.card-glass {
    background: linear-gradient(145deg, rgba(255,255,255,.08), rgba(255,255,255,.02));
    backdrop-filter: blur(12px);
    border: 1px solid rgba(212,175,55,.15);
    border-radius: 24px;
    padding: 1.5rem;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.card-glass:hover {
    border-color: rgba(212,175,55,.4);
    box-shadow: var(--shadow-md);
    transform: translateY(-4px);
}

.card-glass::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light), transparent);
}

/* ── Stats grid ── */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
    animation: fadeUp .5s .1s ease both;
}

.stat-icon {
    font-size: 2rem;
    margin-bottom: .75rem;
    display: block;
    color: var(--gold-light);
    opacity: .9;
}

.stat-num {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 2.4rem;
    font-weight: 700;
    color: var(--gold-light);
    line-height: 1.1;
}

.stat-label {
    font-size: .7rem;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: rgba(255,255,255,.55);
    margin-top: .5rem;
}

.stat-sub {
    font-size: .7rem;
    color: rgba(255,255,255,.35);
    margin-top: .25rem;
}

/* colour variants */
.stats-grid .card-glass:nth-child(1) .stat-num  { color: var(--gold-light); }
.stats-grid .card-glass:nth-child(2) .stat-num  { color: #7BE0B0; }
.stats-grid .card-glass:nth-child(3) .stat-num  { color: var(--gold-soft); }
.stats-grid .card-glass:nth-child(4) .stat-num  { color: #B3A4FF; }
.stats-grid .card-glass:nth-child(1)::before { background: linear-gradient(90deg,var(--gold),transparent); }
.stats-grid .card-glass:nth-child(2)::before { background: linear-gradient(90deg,#7BE0B0,transparent); }
.stats-grid .card-glass:nth-child(3)::before { background: linear-gradient(90deg,var(--gold-soft),transparent); }
.stats-grid .card-glass:nth-child(4)::before { background: linear-gradient(90deg,#B3A4FF,transparent); }

/* ── Two-col layout ── */
.two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.three-col {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

/* ── Section label ── */
.sec-label {
    font-size: .7rem;
    font-weight: 600;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: .5rem;
}

.sec-label::before { content: '✦'; color: var(--gold); }

/* ── List rows ── */
.list-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .65rem 0;
    border-bottom: 1px solid rgba(212,175,55,.08);
    transition: .2s;
    font-size: .85rem;
}

.list-row:last-child { border-bottom: none; }
.list-row:hover { padding-left: .5rem; border-bottom-color: rgba(212,175,55,.25); }
.list-row .name { color: rgba(255,255,255,.8); }
.list-row .val  { color: var(--gold-light); font-weight: 600; }

/* ── Table ── */
.rep-table {
    width: 100%;
    border-collapse: collapse;
    font-size: .83rem;
}

.rep-table thead {
    background: rgba(16,32,66,.7);
    border-bottom: 2px solid rgba(212,175,55,.3);
}

.rep-table th {
    padding: .9rem .75rem;
    text-align: left;
    font-size: .68rem;
    font-weight: 600;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: rgba(255,255,255,.55);
    white-space: nowrap;
}

.rep-table td {
    padding: .85rem .75rem;
    border-bottom: 1px solid rgba(212,175,55,.07);
    vertical-align: middle;
}

.rep-table tbody tr:hover { background: rgba(212,175,55,.04); }

/* ── Status badge ── */
.badge {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    padding: .2rem .75rem;
    font-size: .68rem;
    font-weight: 600;
    letter-spacing: .05em;
    text-transform: uppercase;
    border-radius: 30px;
    border: 1px solid;
}

.badge::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: currentColor;
}

.badge-confirmed { color: var(--green); background: rgba(124,157,124,.12); border-color: rgba(124,157,124,.3); }
.badge-pending   { color: var(--gold-soft); background: rgba(245,215,110,.1); border-color: rgba(245,215,110,.3); }
.badge-cancelled { color: var(--red); background: rgba(201,123,132,.1); border-color: rgba(201,123,132,.3); }

/* ── Price badge ── */
.price-tag {
    display: inline-block;
    background: rgba(212,175,55,.12);
    color: var(--gold-soft);
    border: 1px solid rgba(212,175,55,.3);
    border-radius: 8px;
    padding: .2rem .6rem;
    font-size: .78rem;
    font-weight: 600;
    font-family: 'Inter', monospace;
}

/* ── Back button ── */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    padding: .55rem 1.4rem;
    font-size: .78rem;
    font-weight: 600;
    letter-spacing: .05em;
    text-transform: uppercase;
    text-decoration: none;
    border-radius: 30px;
    background: transparent;
    color: var(--gold-light);
    border: 1.5px solid rgba(212,175,55,.45);
    transition: var(--transition);
}

.btn-back:hover {
    background: rgba(212,175,55,.1);
    border-color: var(--gold);
    transform: translateY(-2px);
    text-decoration: none;
    color: var(--gold-light);
}

/* ── Chart container ── */
.chart-wrap {
    position: relative;
    height: 230px;
}

/* ── Rating bar ── */
.rating-bar-row {
    display: flex;
    align-items: center;
    gap: .75rem;
    margin-bottom: .6rem;
    font-size: .8rem;
}

.rating-bar-row .stars-label {
    width: 30px;
    color: var(--gold-soft);
    font-weight: 600;
    flex-shrink: 0;
}

.rating-bar-track {
    flex: 1;
    height: 8px;
    background: rgba(255,255,255,.08);
    border-radius: 4px;
    overflow: hidden;
}

.rating-bar-fill {
    height: 100%;
    border-radius: 4px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
}

.rating-count {
    width: 28px;
    text-align: right;
    color: rgba(255,255,255,.5);
    font-size: .75rem;
    flex-shrink: 0;
}

/* ── Weekly table ── */
.weekly-row {
    display: grid;
    grid-template-columns: 1fr 80px 130px;
    gap: .5rem;
    padding: .6rem 0;
    border-bottom: 1px solid rgba(212,175,55,.08);
    font-size: .82rem;
    align-items: center;
}

.weekly-row:last-child { border-bottom: none; }

/* ── Empty state ── */
.empty-state {
    text-align: center;
    padding: 2.5rem;
    color: rgba(255,255,255,.4);
    font-size: .85rem;
    font-style: italic;
}

/* ── Pricing table highlight ── */
.pricing-card {
    text-align: center;
    padding: 1rem .75rem;
    border-radius: 16px;
    border: 1px solid rgba(212,175,55,.15);
    background: rgba(255,255,255,.04);
    transition: var(--transition);
}

.pricing-card:hover {
    border-color: rgba(212,175,55,.35);
    background: rgba(212,175,55,.06);
}

.pricing-card .pname {
    font-family: 'Playfair Display', serif;
    font-size: .95rem;
    color: var(--gold-light);
    font-weight: 600;
    margin-bottom: .35rem;
}

.pricing-card .pprice {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--white-soft);
    font-family: 'Inter', monospace;
}

.pricing-card .ptype {
    font-size: .65rem;
    color: rgba(255,255,255,.4);
    letter-spacing: .08em;
    text-transform: uppercase;
    margin-top: .25rem;
}

/* ── Animations ── */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Responsive ── */
@media (max-width: 1100px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .three-col  { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr; }
    .two-col, .three-col { grid-template-columns: 1fr; }
    .rep-title  { font-size: 1.8rem; }
    .rep-table  { min-width: 640px; }
}
</style>

<div class="rep-root">

    {{-- ── Page header ── --}}
    <div class="rep-header">
        <div>
            <p class="rep-eyebrow">⚜️ Royal Administration</p>
            <h1 class="rep-title">Analytics & Reports</h1>
            <div class="page-divider"></div>
            <p style="font-size:.85rem; color:rgba(255,255,255,.5);">
                Generated on {{ now()->format('F j, Y — g:i A') }}
            </p>
        </div>
        <a href="/admin/dashboard" class="btn-back">
            <i class="ti ti-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    {{-- ── Summary Stats ── --}}
    <div class="stats-grid">
        <div class="card-glass">
            <i class="ti ti-cash stat-icon"></i>
            <span class="stat-num">₱{{ number_format($totalRevenue) }}</span>
            <div class="stat-label">Total Revenue</div>
            <div class="stat-sub">From confirmed bookings</div>
        </div>
        <div class="card-glass">
            <i class="ti ti-checkbox stat-icon"></i>
            <span class="stat-num">{{ $stats['confirmed'] }}</span>
            <div class="stat-label">Confirmed Bookings</div>
            <div class="stat-sub">Out of {{ $stats['total'] }} total</div>
        </div>
        <div class="card-glass">
            <i class="ti ti-hourglass stat-icon"></i>
            <span class="stat-num">₱{{ number_format($potentialRevenue) }}</span>
            <div class="stat-label">Potential Revenue</div>
            <div class="stat-sub">{{ $stats['pending'] }} pending bookings</div>
        </div>
        <div class="card-glass">
            <i class="ti ti-star stat-icon"></i>
            <span class="stat-num">{{ $reviewStats['avg'] > 0 ? $reviewStats['avg'] : '—' }}</span>
            <div class="stat-label">Average Rating</div>
            <div class="stat-sub">From {{ $reviewStats['total'] }} reviews</div>
        </div>
    </div>

    {{-- ── Today & This Week ── --}}
    <div class="two-col" style="margin-bottom:1.5rem;">
        {{-- Today --}}
        <div class="card-glass" style="animation: fadeUp .5s .15s ease both;">
            <p class="sec-label">Today's Summary</p>
            <div class="list-row">
                <span class="name"><i class="ti ti-calendar-plus" style="color:var(--gold); margin-right:.4rem;"></i>New Reservations</span>
                <span class="val">{{ $todayBookings }}</span>
            </div>
            <div class="list-row">
                <span class="name"><i class="ti ti-cash" style="color:var(--gold); margin-right:.4rem;"></i>Confirmed Revenue</span>
                <span class="val">₱{{ number_format($todayRevenue) }}</span>
            </div>
            <div class="list-row">
                <span class="name"><i class="ti ti-chart-bar" style="color:var(--gold); margin-right:.4rem;"></i>Total Bookings</span>
                <span class="val">{{ $stats['total'] }}</span>
            </div>
            <div class="list-row">
                <span class="name"><i class="ti ti-circle-x" style="color:var(--red); margin-right:.4rem;"></i>Cancelled</span>
                <span class="val" style="color:var(--red);">{{ $stats['cancelled'] }}</span>
            </div>
        </div>

        {{-- Weekly --}}
        <div class="card-glass" style="animation: fadeUp .5s .2s ease both;">
            <p class="sec-label">Last 4 Weeks</p>
            <div class="weekly-row" style="font-size:.65rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.4); padding-bottom:.4rem;">
                <span>Week</span><span style="text-align:center;">Bookings</span><span style="text-align:right;">Revenue</span>
            </div>
            @foreach ($weekly as $label => $data)
            <div class="weekly-row">
                <span style="color:rgba(255,255,255,.7);">{{ $label }}</span>
                <span style="text-align:center; color:var(--gold-soft); font-weight:600;">{{ $data['bookings'] }}</span>
                <span style="text-align:right; color:var(--gold-light); font-weight:600;">₱{{ number_format($data['revenue']) }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── Monthly Trend Chart ── --}}
    <div class="card-glass" style="margin-bottom:1.5rem; animation: fadeUp .5s .25s ease both;">
        <p class="sec-label">Monthly Trends — Last 12 Months</p>
        <div class="chart-wrap">
            <canvas id="monthlyChart"></canvas>
        </div>
    </div>

    {{-- ── Venue & Service Charts ── --}}
    <div class="two-col">
        {{-- By venue --}}
        <div class="card-glass" style="animation: fadeUp .5s .3s ease both;">
            <p class="sec-label">Bookings by Venue</p>
            <div class="chart-wrap" style="height:200px; margin-bottom:1rem;">
                <canvas id="venueChart"></canvas>
            </div>
            @forelse ($byVenue as $row)
            <div class="list-row">
                <span class="name">{{ $row->venue_label }}</span>
                <div style="display:flex; gap:.75rem; align-items:center;">
                    <span class="price-tag">₱{{ number_format($row->venue_price) }}</span>
                    <span class="val">{{ $row->total }} bookings</span>
                </div>
            </div>
            @empty
            <div class="empty-state">No bookings yet.</div>
            @endforelse
        </div>

        {{-- By service --}}
        <div class="card-glass" style="animation: fadeUp .5s .35s ease both;">
            <p class="sec-label">Bookings by Event Type</p>
            <div class="chart-wrap" style="height:200px; margin-bottom:1rem;">
                <canvas id="serviceChart"></canvas>
            </div>
            @forelse ($byService as $row)
            <div class="list-row">
                <span class="name">{{ $row->event_type }}</span>
                <div style="display:flex; gap:.75rem; align-items:center;">
                    <span class="price-tag">₱{{ number_format($row->service_price) }}</span>
                    <span class="val">{{ $row->total }} bookings</span>
                </div>
            </div>
            @empty
            <div class="empty-state">No bookings yet.</div>
            @endforelse
        </div>
    </div>

    {{-- ── Pricing Reference Table ── --}}
    <div class="card-glass" style="margin-bottom:1.5rem; animation: fadeUp .5s .4s ease both;">
        <p class="sec-label">Pricing Reference</p>
        <div class="two-col" style="margin-bottom:0;">
            {{-- Venue pricing --}}
            <div>
                <p style="font-size:.75rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.4); margin-bottom:1rem;">Venue Rental</p>
                <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:.75rem;">
                    @php
                        $venuePricingDisplay = [
                            ['name'=>'Garden Oasis',   'price'=>45000, 'tag'=>'Outdoor',  'key'=>'Garden'],
                            ['name'=>'Grand Ballroom', 'price'=>75000, 'tag'=>'Indoor',   'key'=>'Ballroom'],
                            ['name'=>'Coastal Retreat','price'=>55000, 'tag'=>'Seaside',  'key'=>'Coastal'],
                        ];
                    @endphp
                    @foreach ($venuePricingDisplay as $vp)
                    <div class="pricing-card">
                        <div class="pname">{{ $vp['name'] }}</div>
                        <div class="pprice">₱{{ number_format($vp['price']) }}</div>
                        <div class="ptype">{{ $vp['tag'] }} · per event</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Service pricing --}}
            <div>
                <p style="font-size:.75rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.4); margin-bottom:1rem;">Event Service Package</p>
                <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:.75rem;">
                    @php
                        $servicePricingDisplay = [
                            ['name'=>'Debut',     'price'=>15000],
                            ['name'=>'Wedding',   'price'=>25000],
                            ['name'=>'Prom',      'price'=>12000],
                            ['name'=>'Birthday',  'price'=>10000],
                            ['name'=>'Reunion',   'price'=>8000],
                            ['name'=>'Meeting',   'price'=>5000],
                        ];
                    @endphp
                    @foreach ($servicePricingDisplay as $sp)
                    <div class="pricing-card">
                        <div class="pname">{{ $sp['name'] }}</div>
                        <div class="pprice">₱{{ number_format($sp['price']) }}</div>
                        <div class="ptype">service fee</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <p style="font-size:.72rem; color:rgba(255,255,255,.3); margin-top:1.25rem; text-align:center;">
            ✦ Total booking cost = Venue Rental + Event Service Package &nbsp;·&nbsp; 
        </p>
    </div>

    {{-- ── Reviews Breakdown ── --}}
    @if ($reviewStats['total'] > 0)
    <div class="card-glass" style="margin-bottom:1.5rem; animation: fadeUp .5s .45s ease both;">
        <p class="sec-label">Customer Review Breakdown</p>
        <div class="two-col" style="margin-bottom:0; align-items:center;">
            <div>
                <div style="text-align:center; margin-bottom:1.5rem;">
                    <span style="font-family:'Playfair Display',serif; font-size:3.5rem; font-weight:700; color:var(--gold-light);">
                        {{ $reviewStats['avg'] }}
                    </span>
                    <span style="font-size:1.5rem; color:var(--gold); display:block; margin-top:.25rem;">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= round($reviewStats['avg'])) ★ @else ☆ @endif
                        @endfor
                    </span>
                    <span style="font-size:.8rem; color:rgba(255,255,255,.45);">{{ $reviewStats['total'] }} total reviews</span>
                </div>
            </div>
            <div>
                @php
                    $ratingRows = [
                        5 => $reviewStats['five'],
                        4 => $reviewStats['four'],
                        3 => $reviewStats['three'],
                        2 => $reviewStats['two'],
                        1 => $reviewStats['one'],
                    ];
                    $maxCount = max(array_values($ratingRows)) ?: 1;
                @endphp
                @foreach ($ratingRows as $stars => $count)
                <div class="rating-bar-row">
                    <span class="stars-label">{{ $stars }}★</span>
                    <div class="rating-bar-track">
                        <div class="rating-bar-fill" style="width: {{ ($count / $maxCount) * 100 }}%;"></div>
                    </div>
                    <span class="rating-count">{{ $count }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- ── Recent Confirmed Bookings Table ── --}}
    <div class="card-glass" style="animation: fadeUp .5s .5s ease both;">
        <p class="sec-label">Recent Confirmed Bookings</p>
        @if ($recentConfirmed->isEmpty())
            <div class="empty-state">No confirmed bookings yet.</div>
        @else
        <div style="overflow-x:auto;">
            <table class="rep-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Venue</th>
                        <th>Event Type</th>
                        <th>Event Date</th>
                        <th>Guests</th>
                        <th>Venue Fee</th>
                        <th>Service Fee</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentConfirmed as $r)
                    @php
                        $vFee = \App\Http\Controllers\AdminController::VENUE_PRICING[$r->venue]
                                ?? \App\Http\Controllers\AdminController::DEFAULT_VENUE_PRICE;
                        $sFee = \App\Http\Controllers\AdminController::SERVICE_PRICING[$r->event_type]
                                ?? \App\Http\Controllers\AdminController::DEFAULT_SERVICE_PRICE;
                    @endphp
                    <tr>
                        <td style="font-family:'Playfair Display',serif; color:var(--gold-light); font-weight:600;">
                            {{ $r->client_name }}
                        </td>
                        <td style="color:rgba(255,255,255,.75);">{{ $r->venue }}</td>
                        <td style="color:rgba(255,255,255,.75);">{{ $r->event_type }}</td>
                        <td style="color:rgba(255,255,255,.75);">
                            {{ \Carbon\Carbon::parse($r->event_date)->format('M j, Y') }}
                        </td>
                        <td style="color:rgba(255,255,255,.6); text-align:center;">{{ $r->guest_count }}</td>
                        <td><span class="price-tag">₱{{ number_format($vFee) }}</span></td>
                        <td><span class="price-tag">₱{{ number_format($sFee) }}</span></td>
                        <td style="font-weight:700; color:var(--gold-soft); font-family:'Inter',monospace;">
                            ₱{{ number_format($r->computed_price) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="background:rgba(16,32,66,.6); border-top:2px solid rgba(212,175,55,.3);">
                        <td colspan="7" style="padding:.85rem .75rem; font-weight:700; color:rgba(255,255,255,.6); font-size:.75rem; letter-spacing:.08em; text-transform:uppercase;">
                            Total Revenue (shown above, confirmed)
                        </td>
                        <td style="padding:.85rem .75rem; font-weight:700; color:var(--gold-light); font-size:1rem; font-family:'Inter',monospace;">
                            ₱{{ number_format($recentConfirmed->sum('computed_price')) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        @endif
    </div>

</div><!-- /.rep-root -->

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Shared Chart.js defaults ──────────────────────────────────────
    Chart.defaults.color = 'rgba(255,255,255,0.55)';
    Chart.defaults.font.family = "'Inter', sans-serif";

    const GOLD        = '#C9A03D';
    const GOLD_LIGHT  = '#D4AF37';
    const GOLD_SOFT   = '#F5D76E';
    const GREEN       = '#7BE0B0';
    const BLUE_SOFT   = '#7FB3FF';
    const PINK        = '#FF9FB2';
    const PURPLE      = '#B3A4FF';

    // ── Monthly chart data passed from PHP ───────────────────────────
    const monthlyData = @json($last12);
    const monthLabels  = Object.keys(monthlyData).map(k => {
        const [y, m] = k.split('-');
        return new Date(y, m - 1).toLocaleDateString('en-PH', { month: 'short', year: '2-digit' });
    });
    const monthBookings = Object.values(monthlyData).map(d => d.bookings);
    const monthRevenue  = Object.values(monthlyData).map(d => d.revenue);

    // ── Monthly trend (dual axis) ────────────────────────────────────
    new Chart(document.getElementById('monthlyChart'), {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [
                {
                    label: 'Bookings',
                    data: monthBookings,
                    backgroundColor: 'rgba(201,160,61,0.25)',
                    borderColor: GOLD,
                    borderWidth: 2,
                    borderRadius: 6,
                    yAxisID: 'y',
                },
                {
                    label: 'Revenue (₱)',
                    data: monthRevenue,
                    type: 'line',
                    borderColor: GREEN,
                    backgroundColor: 'rgba(123,224,176,0.08)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: GREEN,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    yAxisID: 'y1',
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: ctx => ctx.dataset.yAxisID === 'y1'
                            ? ' ₱' + ctx.parsed.y.toLocaleString('en-PH')
                            : ' ' + ctx.parsed.y + ' bookings',
                    }
                }
            },
            scales: {
                x: {
                    grid: { color: 'rgba(212,175,55,0.08)' },
                    ticks: { font: { size: 11 } }
                },
                y: {
                    grid: { color: 'rgba(212,175,55,0.08)' },
                    ticks: { stepSize: 1 },
                    title: { display: true, text: 'Bookings', font: { size: 11 } }
                },
                y1: {
                    position: 'right',
                    grid: { drawOnChartArea: false },
                    ticks: {
                        callback: v => '₱' + (v / 1000).toFixed(0) + 'k',
                        font: { size: 11 }
                    },
                    title: { display: true, text: 'Revenue (₱)', font: { size: 11 } }
                },
            }
        }
    });

    // ── Venue doughnut ───────────────────────────────────────────────
    const venueData = @json($byVenue->pluck('total', 'venue_label'));
    if (Object.keys(venueData).length > 0) {
        new Chart(document.getElementById('venueChart'), {
            type: 'doughnut',
            data: {
                labels: Object.keys(venueData),
                datasets: [{
                    data: Object.values(venueData),
                    backgroundColor: [GOLD, GREEN, BLUE_SOFT],
                    borderColor: 'rgba(10,22,40,0.8)',
                    borderWidth: 3,
                    hoverOffset: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { padding: 14, font: { size: 11 } } }
                },
                cutout: '60%',
            }
        });
    }

    // ── Service bar chart ────────────────────────────────────────────
    const svcData   = @json($byService->pluck('total', 'event_type'));
    if (Object.keys(svcData).length > 0) {
        new Chart(document.getElementById('serviceChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(svcData),
                datasets: [{
                    label: 'Bookings',
                    data: Object.values(svcData),
                    backgroundColor: [GOLD, GREEN, BLUE_SOFT, PINK, PURPLE, GOLD_SOFT],
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y',
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        grid: { color: 'rgba(212,175,55,0.08)' },
                        ticks: { stepSize: 1, font: { size: 11 } }
                    },
                    y: { grid: { display: false }, ticks: { font: { size: 11 } } }
                }
            }
        });
    }
});
</script>
@endsection