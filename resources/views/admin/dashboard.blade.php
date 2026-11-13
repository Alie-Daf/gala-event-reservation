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
    --transition-slow: 0.5s ease;
}

/* ========== GLOBAL ========== */
.admin-root {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(145deg, var(--royal-blue-dark) 0%, var(--royal-blue) 50%, var(--royal-blue-light) 100%);
    color: var(--white-soft);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}

/* Satin-like Texture Overlay */
.admin-root::before {
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
.admin-root::after {
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

.admin-wrap {
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

@keyframes scaleIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

/* ========== PAGE HEADER ========== */
.admin-header {
    border-bottom: 2px solid rgba(212, 175, 55, 0.25);
    padding: 1.5rem 0 1.5rem;
    margin-bottom: 2rem;
    animation: fadeUp 0.6s ease both;
}

.admin-eyebrow {
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

.admin-eyebrow::before {
    content: '⚜️';
    font-size: 0.8rem;
}

.page-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 0.25rem;
}

.page-divider {
    width: 80px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), transparent);
    margin: 1rem 0 1.5rem;
    border-radius: 2px;
}

/* ========== STATS GRID ========== */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 24px;
    padding: 1.5rem;
    text-align: center;
    transition: var(--transition-base);
    position: relative;
    overflow: hidden;
    animation: scaleIn 0.5s ease both;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light), transparent);
}

.stat-card:nth-child(1) { animation-delay: 0.05s; }
.stat-card:nth-child(2) { animation-delay: 0.10s; }
.stat-card:nth-child(3) { animation-delay: 0.15s; }
.stat-card:nth-child(4) { animation-delay: 0.20s; }

.stat-card:hover {
    transform: translateY(-5px);
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: var(--shadow-md);
}

.stat-icon {
    font-size: 2rem;
    margin-bottom: 0.75rem;
    display: inline-block;
}

.stat-num {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 2.8rem;
    font-weight: 700;
    color: var(--gold-light);
    line-height: 1.2;
}

.stat-label {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
    margin-top: 0.5rem;
}

/* Color variations for stats */
.stat-card:nth-child(1) .stat-num { color: var(--gold-light); }
.stat-card:nth-child(2) .stat-num { color: var(--gold-soft); }
.stat-card:nth-child(3) .stat-num { color: #7C9D7C; }
.stat-card:nth-child(4) .stat-num { color: #C97B84; }

/* ========== FORM SECTIONS ========== */
.form-section {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 24px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    animation: fadeUp 0.5s ease both;
    transition: var(--transition-base);
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

/* List items inside sections */
.list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.7rem 0;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    transition: var(--transition-fast);
}

.list-item:hover {
    padding-left: 0.5rem;
    border-bottom-color: rgba(212, 175, 55, 0.3);
}

.list-item span:first-child {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.85rem;
}

.list-item strong {
    color: var(--gold-light);
    font-weight: 600;
    font-size: 0.9rem;
}

/* ========== TABLE ========== */
.table-wrap {
    overflow-x: auto;
    margin-top: 0.5rem;
}

.elegant-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.85rem;
}

.elegant-table thead {
    background: rgba(16, 32, 66, 0.6);
    border-bottom: 2px solid rgba(212, 175, 55, 0.3);
}

.elegant-table th {
    padding: 1rem 0.75rem;
    text-align: left;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
}

.elegant-table td {
    padding: 0.875rem 0.75rem;
    border-bottom: 1px solid rgba(212, 175, 55, 0.08);
    vertical-align: middle;
}

.elegant-table tbody tr {
    transition: var(--transition-fast);
    position: relative;
}

.elegant-table tbody tr:hover {
    background: rgba(212, 175, 55, 0.05);
}

/* ========== STATUS BADGES ========== */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.25rem 0.75rem;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    border-radius: 30px;
    border: 1px solid;
}

.status-badge::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: currentColor;
    display: inline-block;
}

.status-confirmed {
    color: #7C9D7C;
    background: rgba(124, 157, 124, 0.1);
    border-color: rgba(124, 157, 124, 0.3);
}

.status-pending {
    color: var(--gold-soft);
    background: rgba(245, 215, 110, 0.1);
    border-color: rgba(245, 215, 110, 0.3);
}

.status-cancelled {
    color: #C97B84;
    background: rgba(201, 123, 132, 0.1);
    border-color: rgba(201, 123, 132, 0.3);
}

/* ========== BUTTONS ========== */
.btn-outline-teal {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1.2rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-fast);
    border-radius: 30px;
    background: transparent;
    color: var(--gold-light);
    border: 1.5px solid rgba(212, 175, 55, 0.5);
}

.btn-outline-teal:hover {
    background: rgba(212, 175, 55, 0.1);
    border-color: var(--gold);
    transform: translateY(-2px);
    text-decoration: none;
    color: var(--gold-light);
}

.btn-primary-elegant {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1.5rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-base);
    border-radius: 30px;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: var(--royal-blue-dark);
    border: none;
    cursor: pointer;
}

.btn-primary-elegant:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-gold);
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
    text-decoration: none;
    color: var(--royal-blue-dark);
}

/* Edit button */
.btn-edit {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.3rem 0.8rem;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-fast);
    border-radius: 20px;
    background: rgba(212, 175, 55, 0.1);
    color: var(--gold-light);
    border: 1px solid rgba(212, 175, 55, 0.3);
}

.btn-edit:hover {
    background: rgba(212, 175, 55, 0.2);
    border-color: var(--gold);
    text-decoration: none;
    color: var(--gold);
}

/* ========== REVIEWS SECTION ========== */
.review-item {
    padding: 1rem 0;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    transition: var(--transition-fast);
}

.review-item:last-child {
    border-bottom: none;
}

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

/* ========== ACTION BUTTONS GROUP ========== */
.action-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
    flex-wrap: wrap;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .admin-wrap {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .elegant-table {
        min-width: 600px;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-outline-teal,
    .btn-primary-elegant {
        justify-content: center;
    }
}

@media (max-width: 640px) {
    .page-title {
        font-size: 1.8rem;
    }
    
    .stat-num {
        font-size: 2rem;
    }
    
    .form-section {
        padding: 1.25rem;
    }
}
</style>

<div class="admin-root">
    <div class="admin-wrap">

        {{-- Header --}}
        <div class="admin-header">
            <div class="admin-eyebrow">Royal Administration</div>
            <h1 class="page-title">Admin Dashboard</h1>
            <div class="page-divider"></div>
        </div>

        {{-- Stats Cards --}}
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-calendar-stats"></i></div>
                <span class="stat-num">{{ $stats['total'] }}</span>
                <span class="stat-label">Total Reservations</span>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-hourglass"></i></div>
                <span class="stat-num">{{ $stats['pending'] }}</span>
                <span class="stat-label">Pending Approval</span>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-checkbox"></i></div>
                <span class="stat-num">{{ $stats['confirmed'] }}</span>
                <span class="stat-label">Confirmed</span>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="ti ti-circle-x"></i></div>
                <span class="stat-num">{{ $stats['cancelled'] }}</span>
                <span class="stat-label">Cancelled</span>
            </div>
        </div>

        {{-- Two Column Layout for Charts --}}
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            {{-- By Venue --}}
            <div class="form-section">
                <p class="form-section-label">Reservations by Venue</p>
                @foreach($byVenue as $row)
                <div class="list-item">
                    <span>{{ $row->venue }}</span>
                    <strong>{{ $row->total }}</strong>
                </div>
                @endforeach
            </div>

            {{-- By Service --}}
            <div class="form-section">
                <p class="form-section-label">Reservations by Event Type</p>
                @foreach($byService as $row)
                <div class="list-item">
                    <span>{{ $row->event_type }}</span>
                    <strong>{{ $row->total }}</strong>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Recent Reservations --}}
        <div class="form-section">
            <p class="form-section-label">Recent Reservations</p>
            <div class="table-wrap">
                <table class="elegant-table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent as $r)
                        <tr>
                            <td style="font-weight: 500;">{{ $r->client_name }}</td>
                            <td>{{ $r->venue }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->event_date)->format('M j, Y') }}</td>
                            <td>
                                <span class="status-badge
                                    @if($r->status=='Confirmed') status-confirmed
                                    @elseif($r->status=='Cancelled') status-cancelled
                                    @else status-pending @endif">
                                    {{ $r->status }}
                                </span>
                            </td>
                            <td>
                                <a href="/reservation/update/{{ $r->id }}" class="btn-edit">
                                    <i class="ti ti-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- Registered Users --}}
        <div class="form-section" style="margin-bottom: 1.5rem;">
            <p class="form-section-label">
                <i class="ti ti-users" style="color:var(--gold);"></i>
                Registered Users
            </p>
            <div class="table-wrap">
                <table class="elegant-table" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:20%;">Name</th>
                            <th style="width:25%;">Email</th>
                            <th style="width:10%; text-align:center;">Role</th>
                            <th style="width:15%; text-align:center;">Reservations</th>
                            <th style="width:15%; text-align:right;">Total Spent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                        <tr>
                            <td style="color:rgba(255,255,255,0.4);">{{ $index + 1 }}</td>
                            <td>
                                <div style="font-family:'Playfair Display',serif; font-size:0.9rem;
                                            font-weight:600; color:var(--gold-light);
                                            white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    {{ $user->name }}
                                </div>
                                <div style="font-size:0.68rem; color:rgba(255,255,255,0.4); margin-top:0.1rem;">
                                    Joined {{ $user->created_at->format('M j, Y') }}
                                </div>
                            </td>
                            <td style="font-size:0.78rem; color:rgba(255,255,255,0.7);
                                        white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                {{ $user->email }}
                            </td>
                            <td style="text-align:center;">
                                @if($user->is_admin)
                                    <span class="status-badge"
                                        style="color:#C9A03D; background:rgba(201,160,61,0.1);
                                                border-color:rgba(201,160,61,0.3); min-width:70px;
                                                justify-content:center;">
                                        <i class="ti ti-shield-check" style="font-size:0.7rem;"></i>
                                        Admin
                                    </span>
                                @else
                                    <span class="status-badge"
                                        style="color:rgba(255,255,255,0.5); background:rgba(255,255,255,0.05);
                                                border-color:rgba(255,255,255,0.1); min-width:70px;
                                                justify-content:center;">
                                        <i class="ti ti-user" style="font-size:0.7rem;"></i>
                                        User
                                    </span>
                                @endif
                            </td>
                            <td style="text-align:center; font-weight:600; color:var(--white);">
                                {{ $user->reservations_count }}
                                <div style="font-size:0.65rem; color:rgba(255,255,255,0.4); font-weight:400;">
                                    bookings
                                </div>
                            </td>
                            <td style="text-align:right;">
                                @if($user->total_spent > 0)
                                    <span style="font-family:'Playfair Display',serif; font-size:0.9rem;
                                                font-weight:700; color:var(--gold-light);">
                                        ₱{{ number_format($user->total_spent) }}
                                    </span>
                                    <div style="font-size:0.65rem; color:rgba(255,255,255,0.4);">
                                        confirmed only
                                    </div>
                                @else
                                    <span style="color:rgba(255,255,255,0.3); font-size:0.78rem;">—</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:2rem;
                                                color:rgba(255,255,255,0.4); font-style:italic;">
                                No registered users found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Recent Reviews --}}
        <div class="form-section">
            <p class="form-section-label">Recent Reviews</p>
            @forelse($reviews as $rv)
            <div class="review-item">
                <div class="review-author">
                    {{ $rv->reservation->client_name }}
                    <span class="review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $rv->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </span>
                </div>
                @if($rv->comment)
                    <p class="review-comment">“{{ $rv->comment }}”</p>
                @endif
            </div>
            @empty
                <div class="empty-state">
                    <i class="ti ti-message-star" style="font-size: 1.5rem; opacity: 0.5;"></i>
                    <p>No reviews yet</p>
                </div>
            @endforelse
        </div>

        {{-- Action Buttons --}}
        <div class="action-buttons">
            <a href="/admin/blocked-dates" class="btn-outline-teal">
                <i class="ti ti-calendar-x"></i> Manage Blocked Dates
            </a>
            <a href="/admin/reports" class="btn-primary-elegant">
                <i class="ti ti-chart-bar"></i> View Reports
            </a>
        </div>

    </div>
</div>

@endsection

@section('script')
<script>
    // Add animation delays to stat cards
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stat numbers (optional counter animation)
        const statNumbers = document.querySelectorAll('.stat-num');
        
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const finalValue = parseInt(element.innerText);
                    if (!isNaN(finalValue) && element.getAttribute('data-animated') !== 'true') {
                        element.setAttribute('data-animated', 'true');
                        let current = 0;
                        const increment = Math.ceil(finalValue / 50);
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= finalValue) {
                                element.innerText = finalValue;
                                clearInterval(timer);
                            } else {
                                element.innerText = current;
                            }
                        }, 20);
                    }
                    observer.unobserve(element);
                }
            });
        }, observerOptions);
        
        statNumbers.forEach(num => {
            observer.observe(num);
        });
    });
</script>
@endsection