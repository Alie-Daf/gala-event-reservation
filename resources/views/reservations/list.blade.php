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
.rr-root {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(145deg, var(--royal-blue-dark) 0%, var(--royal-blue) 50%, var(--royal-blue-light) 100%);
    color: var(--white-soft);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}

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

/* ========== HEADER ========== */
.rr-header {
    border-bottom: 2px solid rgba(212, 175, 55, 0.25);
    padding: 1.5rem 0;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 1.5rem;
    flex-wrap: wrap;
    animation: fadeUp 0.6s ease both;
    margin-bottom: 1.5rem;
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

.rr-eyebrow::before,
.rr-eyebrow::after {
    content: '';
    display: inline-block;
    width: 30px;
    height: 1px;
    background: linear-gradient(90deg, var(--gold), transparent);
}

.rr-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 0.25rem;
}

.rr-subtitle {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.6);
    letter-spacing: 0.02em;
}

.rr-header-actions {
    display: flex;
    gap: 0.75rem;
    align-items: center;
}

/* ========== BUTTONS ========== */
.btn-royal {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1.5rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-base);
    cursor: pointer;
    border-radius: 40px;
    border: none;
}

.btn-gold {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: var(--royal-blue-dark) !important;
    box-shadow: var(--shadow-sm);
}

.btn-gold:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-gold);
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
    text-decoration: none;
    color: var(--royal-blue-dark);
}

.btn-outline {
    background: transparent;
    color: var(--gold-light) !important;
    border: 1.5px solid rgba(212, 175, 55, 0.5);
}

.btn-outline:hover {
    background: rgba(212, 175, 55, 0.1);
    border-color: var(--gold);
    transform: translateY(-2px);
    text-decoration: none;
    color: var(--gold-light);
}

.btn-table {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.3rem;
    padding: 0 0.75rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.68rem;
    font-weight: 500;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-fast);
    border-radius: 30px;
    border: 1px solid rgba(212, 175, 55, 0.3);
    background: rgba(255, 255, 255, 0.05);
    color: var(--gold-light);
    cursor: pointer;
    height: 30px;
    white-space: nowrap;
}

.btn-table:hover {
    background: rgba(212, 175, 55, 0.15);
    border-color: var(--gold);
    transform: translateY(-1px);
    text-decoration: none;
    color: var(--gold);
}

.btn-table-cancel {
    color: #E8A87C;
    border-color: rgba(232, 168, 124, 0.3);
}

.btn-table-cancel:hover {
    background: rgba(232, 168, 124, 0.1);
    color: #E8A87C;
    border-color: #E8A87C;
}

.btn-table-review {
    color: #7C9D7C;
    border-color: rgba(124, 157, 124, 0.3);
}

.btn-table-review:hover {
    background: rgba(124, 157, 124, 0.1);
    color: #7C9D7C;
    border-color: #7C9D7C;
}

.btn-table-delete {
    color: #C97B84;
    border-color: rgba(201, 123, 132, 0.3);
}

.btn-table-delete:hover {
    background: rgba(201, 123, 132, 0.1);
    color: #C97B84;
    border-color: #C97B84;
}

/* ========== ORNAMENT ========== */
.ornament {
    text-align: center;
    color: var(--gold);
    font-size: 1.2rem;
    letter-spacing: 0.3em;
    margin: 0 0 1.5rem 0;
    opacity: 0.6;
}

/* ========== ALERT ========== */
.rr-alert {
    border: 1px solid rgba(212, 175, 55, 0.3);
    border-left: 4px solid var(--gold);
    background: rgba(16, 32, 66, 0.8);
    backdrop-filter: blur(8px);
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    animation: fadeUp 0.4s ease;
}

.rr-alert-success {
    border-left-color: #7C9D7C;
}

.rr-alert i {
    font-size: 1.2rem;
    color: var(--gold);
}

/* ========== STATS CARDS ========== */
.rr-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.25rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-top: 3px solid var(--gold);
    border-radius: 20px;
    padding: 1.25rem 1.5rem;
    position: relative;
    transition: var(--transition-base);
    animation: fadeUp 0.5s ease both;
}

.stat-card:hover {
    transform: translateY(-3px);
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: var(--shadow-sm);
}

.stat-card:nth-child(1) { border-top-color: var(--gold);      animation-delay: 0.05s; }
.stat-card:nth-child(2) { border-top-color: #7C9D7C;          animation-delay: 0.1s;  }
.stat-card:nth-child(3) { border-top-color: var(--gold-soft); animation-delay: 0.15s; }
.stat-card:nth-child(4) { border-top-color: #C97B84;          animation-delay: 0.2s;  }

.stat-icon {
    position: absolute;
    top: 1rem;
    right: 1.2rem;
    font-size: 1.8rem;
    opacity: 0.15;
    color: var(--gold-light);
}

.stat-label {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 0.5rem;
}

.stat-value {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--gold-light);
    line-height: 1;
}

.stat-change {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.4);
    margin-top: 0.5rem;
}

/* ========== FILTER BAR ========== */
.filter-bar {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 20px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    animation: fadeUp 0.5s 0.25s ease both;
}

.filter-row {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr auto;
    gap: 1rem;
    align-items: end;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
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

.form-control,
.form-select {
    font-family: 'Inter', sans-serif;
    font-size: 0.85rem;
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
.form-select:focus {
    border-color: var(--gold);
     color: white;

    background: rgba(16, 32, 66, 0.9);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

.form-control::placeholder {
    color: rgba(236, 227, 227, 0.52);
}

.form-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23C9A03D' stroke-width='2'><polyline points='6 9 12 15 18 9'/></svg>");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 14px;
}

.filter-actions {
    display: flex;
    gap: 0.75rem;
}

/* ========== TABLE WRAPPER ========== */
.table-wrap {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 20px;
    overflow: hidden;
    animation: fadeUp 0.5s 0.35s ease both;
}

.table-header-orn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1.5rem;
    border-bottom: 1px solid rgba(212, 175, 55, 0.15);
    background: rgba(16, 32, 66, 0.5);
}

.table-title {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 600;
    color: var(--gold-light);
    letter-spacing: 0.02em;
}

.table-count {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.5);
}

.table-responsive {
    overflow-x: auto;
    width: 100%;
}

/* ========== TABLE ========== */
.rr-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.85rem;
    table-layout: fixed;
}

.rr-table thead {
    background: rgba(16, 32, 66, 0.8);
    border-bottom: 2px solid rgba(212, 175, 55, 0.3);
}

.rr-table th,
.rr-table td {
    padding: 0.9rem 1rem;
    vertical-align: middle;
    text-align: left;
    overflow: hidden;
}

.rr-table th {
    font-size: 0.68rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
    white-space: nowrap;
}

.rr-table td {
    border-bottom: 1px solid rgba(212, 175, 55, 0.08);
}

/* ── FIXED COLUMN WIDTHS ── */
.rr-table th:nth-child(1), .rr-table td:nth-child(1) { width: 18%; }
.rr-table th:nth-child(2), .rr-table td:nth-child(2) { width: 12%; }
.rr-table th:nth-child(3), .rr-table td:nth-child(3) { width: 10%; }
.rr-table th:nth-child(4), .rr-table td:nth-child(4) { width: 10%; }
.rr-table th:nth-child(5), .rr-table td:nth-child(5) { width: 14%; }
.rr-table th:nth-child(6), .rr-table td:nth-child(6) { width: 7%;  text-align: center; }
.rr-table th:nth-child(7), .rr-table td:nth-child(7) { width: 11%; text-align: center; }
.rr-table th:nth-child(8), .rr-table td:nth-child(8) { width: 18%; text-align: center; }

.rr-table tbody tr {
    transition: var(--transition-fast);
    position: relative;
}

.rr-table tbody tr:hover {
    background: rgba(212, 175, 55, 0.05);
}

.rr-table tbody tr {
    animation: fadeInLeft 0.4s ease both;
}
.rr-table tbody tr:nth-child(1) { animation-delay: 0.40s; }
.rr-table tbody tr:nth-child(2) { animation-delay: 0.45s; }
.rr-table tbody tr:nth-child(3) { animation-delay: 0.50s; }
.rr-table tbody tr:nth-child(4) { animation-delay: 0.55s; }
.rr-table tbody tr:nth-child(5) { animation-delay: 0.60s; }
.rr-table tbody tr:nth-child(n+6) { animation-delay: 0.65s; }

/* ========== CELL CONTENT ========== */
.client-name {
    font-family: 'Playfair Display', serif;
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--gold-light);
    line-height: 1.2;
    margin-bottom: 0.2rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.cell-muted {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.75rem;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.cell-date-primary {
    font-weight: 600;
    font-size: 0.82rem;
    color: var(--white);
    line-height: 1.2;
    margin-bottom: 0.2rem;
    white-space: nowrap;
}

/* ========== STATUS BADGES ========== */
.badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.3rem;
    padding: 0.2rem 0.75rem;
    min-width: 90px;
    height: 26px;
    font-size: 0.65rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    border-radius: 30px;
    border: 1px solid;
    white-space: nowrap;
}

.badge::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: currentColor;
    flex-shrink: 0;
}

.badge-confirmed {
    color: #7C9D7C;
    background: rgba(124, 157, 124, 0.1);
    border-color: rgba(124, 157, 124, 0.3);
}

.badge-pending {
    color: var(--gold-soft);
    background: rgba(245, 215, 110, 0.1);
    border-color: rgba(245, 215, 110, 0.3);
}

.badge-cancelled {
    color: #C97B84;
    background: rgba(201, 123, 132, 0.1);
    border-color: rgba(201, 123, 132, 0.3);
}

/* ========== ACTION GROUP ========== */
.action-group {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    flex-wrap: wrap;
}

/* ========== PAGINATION ========== */
.rr-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1.5rem;
    border-top: 1px solid rgba(212, 175, 55, 0.15);
    background: rgba(16, 32, 66, 0.5);
    flex-wrap: wrap;
    gap: 1rem;
}

.pagination-info {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.5);
}

.pagination-controls {
    display: flex;
    gap: 0.3rem;
}

.page-btn {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid rgba(212, 175, 55, 0.25);
    background: rgba(16, 32, 66, 0.6);
    color: rgba(255, 255, 255, 0.7);
    border-radius: 8px;
    transition: var(--transition-fast);
}

.page-btn:hover {
    border-color: var(--gold);
    background: rgba(212, 175, 55, 0.15);
    color: var(--gold);
}

.page-btn.active {
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    border-color: var(--gold);
    color: var(--royal-blue-dark);
}

/* ========== EMPTY STATE ========== */
.rr-empty {
    text-align: center;
    padding: 4rem 2rem;
}

.rr-empty-icon {
    font-size: 4rem;
    opacity: 0.3;
    color: var(--gold);
    margin-bottom: 1rem;
}

.rr-empty-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--gold-light);
    margin-bottom: 0.5rem;
}

.rr-empty-text {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.85rem;
}

.rr-empty-text a {
    color: var(--gold);
    text-decoration: underline;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .rr-stats { grid-template-columns: repeat(2, 1fr); gap: 1rem; }
    .filter-row { grid-template-columns: 1fr 1fr; }
    .filter-row > .form-group:first-child { grid-column: 1 / -1; }
    .filter-actions { grid-column: 1 / -1; justify-content: flex-end; }
    .rr-wrap { padding: 1rem; }
    .rr-title { font-size: 2rem; }
}

@media (max-width: 768px) {
    .rr-header { flex-direction: column; align-items: flex-start; }
    .filter-row { grid-template-columns: 1fr; }
    .rr-stats { grid-template-columns: 1fr; }
    .action-group { flex-direction: column; align-items: stretch; }
    .btn-table { text-align: center; justify-content: center; }
    .rr-table { min-width: 860px; }
    .rr-pagination { flex-direction: column; text-align: center; }
}
</style>

<div class="rr-root">
    <div class="rr-wrap">

        {{-- Header --}}
        <div class="rr-header">
            <div>
                <div class="rr-eyebrow">✦ The Royal Registry ✦</div>
                <h1 class="rr-title">Reservations</h1>
                <p class="rr-subtitle">GÁLA · Ginage Pero Sosyal · Master Bookings</p>
            </div>
            <div class="rr-header-actions">
                @if(auth()->user()->is_admin)
                    <a href="/admin/dashboard" class="btn-royal btn-outline">
                        <i class="ti ti-layout-dashboard"></i>
                        Admin Dashboard
                    </a>
                @endif
                <a href="/reservation/new" class="btn-royal btn-gold">
                    <i class="ti ti-plus"></i>
                    New Reservation
                </a>
            </div>
        </div>

        <div class="ornament">✦ ✦ ✦</div>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="rr-alert rr-alert-success">
                <i class="ti ti-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Stats Cards --}}
        <div class="rr-stats">
            <div class="stat-card">
                <i class="ti ti-calendar-stats stat-icon"></i>
                <div class="stat-label">Total Reservations</div>
                <div class="stat-value">{{ $reservations->total() }}</div>
                <div class="stat-change">All court bookings</div>
            </div>
            <div class="stat-card">
                <i class="ti ti-checkbox stat-icon"></i>
                <div class="stat-label">Confirmed</div>
                <div class="stat-value">{{ $reservations->where('status','Confirmed')->count() }}</div>
                <div class="stat-change">Approved & sealed</div>
            </div>
            <div class="stat-card">
                <i class="ti ti-hourglass stat-icon"></i>
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $reservations->where('status','Pending')->count() }}</div>
                <div class="stat-change">Awaiting royal decree</div>
            </div>
            <div class="stat-card">
                <i class="ti ti-circle-x stat-icon"></i>
                <div class="stat-label">Cancelled</div>
                <div class="stat-value">{{ $reservations->where('status','Cancelled')->count() }}</div>
                <div class="stat-change">Released from court</div>
            </div>
        </div>

        {{-- Filter Bar --}}
        <form method="GET" action="/reservation/list" class="filter-bar">
            <div class="filter-row">
                <div class="form-group">
                    <label class="form-label" for="search">Search Court Records</label>
                    <input type="text" id="search" name="search" class="form-control"
                           placeholder="Name, email, venue, event..."
                           value="{{ request('search') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="form-label" for="status">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="Pending"   {{ request('status')=='Pending'   ? 'selected' : '' }}>Pending</option>
                        <option value="Confirmed" {{ request('status')=='Confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="Cancelled" {{ request('status')=='Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="venue">Venue</label>
                    <select id="venue" name="venue" class="form-select">
                        <option value="">All Venues</option>
                        <option value="Garden"   {{ request('venue')=='Garden'   ? 'selected' : '' }}>Garden Oasis</option>
                        <option value="Ballroom" {{ request('venue')=='Ballroom' ? 'selected' : '' }}>Grand Ballroom</option>
                        <option value="Coastal"  {{ request('venue')=='Coastal'  ? 'selected' : '' }}>Coastal Retreat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="date">Event Date</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <div class="filter-actions">
                    <button type="submit" class="btn-royal btn-gold" style="padding: 0.7rem 1.5rem;">
                        <i class="ti ti-filter"></i> Filter
                    </button>
                    <a href="/reservation/list" class="btn-royal btn-outline" style="padding: 0.7rem 1.2rem;">
                        Clear
                    </a>
                </div>
            </div>
        </form>

        {{-- Table --}}
        @if($reservations->isEmpty())
            <div class="table-wrap">
                <div class="rr-empty">
                    <div class="rr-empty-icon"><i class="ti ti-calendar-off"></i></div>
                    <div class="rr-empty-title">No Reservations Found</div>
                    <p class="rr-empty-text">
                        The court records show no bookings matching your criteria.<br>
                        <a href="/reservation/new">Create your first reservation</a>
                    </p>
                </div>
            </div>
        @else
            <div class="table-wrap">
                <div class="table-header-orn">
                    <span class="table-title">✦ Booking Ledger ✦</span>
                    <span class="table-count">
                        Showing {{ $reservations->firstItem() }}–{{ $reservations->lastItem() }}
                        of {{ $reservations->total() }} entries
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="rr-table">
                        <thead>
                            <tr>
                                <th>Noble Client</th>
                                <th>Contact</th>
                                <th>Service</th>
                                <th>Venue</th>
                                <th>Date & Time</th>
                                <th style="text-align:center;">Guests</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>
                                    <div class="client-name">{{ $reservation->client_name }}</div>
                                    <div class="cell-muted">{{ $reservation->email }}</div>
                                </td>
                                <td class="cell-muted">{{ $reservation->phone }}</td>
                                <td class="cell-muted">{{ $reservation->event_type }}</td>
                                <td class="cell-muted">{{ $reservation->venue }}</td>
                                <td>
                                    <div class="cell-date-primary">
                                        {{ \Carbon\Carbon::parse($reservation->event_date)->format('M j, Y') }}
                                    </div>
                                    <div class="cell-muted">{{ $reservation->event_time }}</div>
                                </td>
                                <td style="font-weight:500; text-align:center;">
                                    {{ $reservation->guest_count }}
                                </td>
                                <td style="text-align:center;">
                                    @if($reservation->status === 'Confirmed')
                                        <span class="badge badge-confirmed">Confirmed</span>
                                    @elseif($reservation->status === 'Cancelled')
                                        <span class="badge badge-cancelled">Cancelled</span>
                                    @else
                                        <span class="badge badge-pending">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="/reservation/update/{{ $reservation->id }}" class="btn-table">
                                            <i class="ti ti-edit"></i> Edit
                                        </a>

                                        @if($reservation->status !== 'Cancelled')
                                            <form action="/reservation/{{ $reservation->id }}/cancel" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Cancel this reservation for {{ addslashes($reservation->client_name) }}?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn-table btn-table-cancel">
                                                    <i class="ti ti-x"></i> Cancel
                                                </button>
                                            </form>
                                        @endif

                                        @if($reservation->status === 'Confirmed' && now()->gt($reservation->event_date) && !$reservation->review && !auth()->user()->is_admin)
                                            <a href="/reservation/{{ $reservation->id }}/review" class="btn-table btn-table-review">
                                                <i class="ti ti-star"></i> Review
                                            </a>
                                        @endif

                                        @if(auth()->user()->is_admin)
                                            <button type="button" class="btn-table btn-table-delete"
                                                    onclick="deleteReservation('{{ $reservation->id }}', '{{ addslashes($reservation->client_name) }}')">
                                                <i class="ti ti-trash"></i> Delete
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="rr-pagination">
                    <span class="pagination-info">
                        Page {{ $reservations->currentPage() }} of {{ $reservations->lastPage() }}
                        · {{ number_format($reservations->total()) }} total reservations
                    </span>
                    <div class="pagination-controls">
                        {{ $reservations->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>

@endsection

@section('script')
<script>
    function deleteReservation(id, name) {
        if (confirm('Permanently delete the reservation for ' + name + '?\n\nThis action cannot be undone.')) {
            window.location.href = '/reservation/delete/' + id;
        }
    }

    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.rr-alert');
    alerts.forEach(el => {
        setTimeout(() => {
            el.style.transition = 'opacity 0.5s, transform 0.5s';
            el.style.opacity = '0';
            el.style.transform = 'translateY(-10px)';
            setTimeout(() => el.remove(), 500);
        }, 5000);
    });

    // Highlight form labels on focus
    document.querySelectorAll('.form-control, .form-select').forEach(el => {
        el.addEventListener('focus', function() {
            const lbl = this.closest('.form-group')?.querySelector('.form-label');
            if (lbl) lbl.style.color = 'var(--gold)';
        });
        el.addEventListener('blur', function() {
            const lbl = this.closest('.form-group')?.querySelector('.form-label');
            if (lbl) lbl.style.color = '';
        });
    });
</script>
@endsection