@extends('layouts.ui')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800;900&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

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
    --shadow-sm: 0 4px 20px rgba(0, 0, 0, 0.15);
    --shadow-md: 0 10px 30px rgba(0, 0, 0, 0.25);
    --shadow-gold: 0 0 25px rgba(201, 160, 61, 0.3);
    --transition-fast: 0.25s ease;
    --transition-base: 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    --error: #C97B84;
    --success: #7C9D7C;
}

/* ========== PAGE CONTAINER ========== */
.update-container {
    max-width: 1400px;
    margin: 0 auto;
}

/* ========== PAGE HEADER ========== */
.page-header {
    margin-bottom: 1.5rem;
}

.section-label {
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gold-soft);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.section-label::before {
    content: '✧';
    color: var(--gold);
}

.page-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 0.25rem;
}

.page-subtitle {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.7);
    font-family: 'Cormorant Garamond', serif;
}

.page-divider {
    width: 80px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), transparent);
    margin: 1rem 0 1.5rem;
    border-radius: 2px;
}

/* ========== LAYOUT ========== */
.reservation-layout {
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
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    transition: var(--transition-base);
    animation: fadeUp 0.5s ease both;
}

.form-section:hover {
    border-color: rgba(212, 175, 55, 0.3);
    box-shadow: var(--shadow-sm);
}

.form-section:nth-child(1) { animation-delay: 0.05s; }
.form-section:nth-child(2) { animation-delay: 0.10s; }
.form-section:nth-child(3) { animation-delay: 0.15s; }
.form-section:nth-child(4) { animation-delay: 0.20s; }

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

.form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 0;
}

/* ========== FORM CONTROLS ========== */
.form-group-elegant {
    margin-bottom: 1rem;
}

.form-group-elegant:last-child {
    margin-bottom: 0;
}

.form-label-elegant {
    display: block;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 0.5rem;
}

.form-control-elegant,
.form-select-elegant {
    width: 100%;
    font-family: 'Inter', sans-serif;
    font-size: 0.85rem;
    color: var(--white);
    background: rgba(16, 32, 66, 0.6);
    border: 1px solid rgba(212, 175, 55, 0.25);
    border-radius: 12px;
    padding: 0.7rem 1rem;
    transition: var(--transition-fast);
}

.form-control-elegant:focus,
.form-select-elegant:focus {
    outline: none;
    border-color: var(--gold);
    background: rgba(16, 32, 66, 0.9);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

.form-select-elegant {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23C9A03D' stroke-width='2'><polyline points='6 9 12 15 18 9'/></svg>");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 14px;
}

textarea.form-control-elegant {
    resize: vertical;
    min-height: 80px;
}

/* ========== VENUE SELECT CARDS ========== */
.select-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.select-card {
    border: 1px solid rgba(212, 175, 55, 0.25);
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    transition: var(--transition-base);
    position: relative;
    background: rgba(16, 32, 66, 0.4);
}

.select-card:hover {
    border-color: var(--gold);
    transform: translateY(-3px);
    box-shadow: var(--shadow-sm);
}

.select-card.selected {
    border-color: var(--gold);
    border-width: 2px;
    background: rgba(212, 175, 55, 0.05);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
}

.select-card-img {
    height: 100px;
    overflow: hidden;
    background: linear-gradient(145deg, var(--royal-blue-light), var(--royal-blue-dark));
}

.select-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.select-card:hover .select-card-img img {
    transform: scale(1.05);
}

.select-card-body {
    padding: 0.75rem;
}

.select-card-name {
    font-family: 'Playfair Display', serif;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--gold-light);
    display: block;
}

.select-card-sub {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
}

.select-card-check {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 24px;
    height: 24px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
}

.select-card-check img {
    width: 12px;
    height: 12px;
    filter: brightness(0);
}

.select-card.selected .select-card-check {
    display: flex;
}

/* ========== SERVICE PILLS ========== */
.service-cards-grid {
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


.service-pill-icon {
    width: 32px;
    height: 32px;
    object-fit: contain;
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

/* ========== AVAILABILITY CALENDAR ========== */
#availCalendar {
    background: rgba(16, 32, 66, 0.6);
    border: 1px solid rgba(212, 175, 55, 0.2);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.7);
    min-height: 60px;
}

#availCalendar strong {
    color: var(--gold-light);
}

/* ========== BUTTONS ========== */
.btn-primary-elegant {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    color: var(--royal-blue-dark) !important;
    border: none;
    border-radius: 40px;
    padding: 0.7rem 1.8rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-base);
    cursor: pointer;
}

.btn-primary-elegant:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-gold);
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
}

.btn-secondary-elegant {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: transparent;
    color: var(--gold-light) !important;
    border: 1.5px solid rgba(212, 175, 55, 0.5);
    border-radius: 40px;
    padding: 0.7rem 1.5rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    transition: var(--transition-base);
}

.btn-secondary-elegant:hover {
    background: rgba(212, 175, 55, 0.1);
    border-color: var(--gold);
    transform: translateY(-2px);
    text-decoration: none;
    color: var(--gold-light);
}

.btn-icon {
    width: 14px;
    height: 14px;
    object-fit: contain;
}

/* ========== SUMMARY SIDEBAR ========== */
.summary-col {
    animation: fadeUp 0.5s 0.25s ease both;
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

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.6rem 0;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    flex-wrap: wrap;
    gap: 0.5rem;
}

.summary-key {
    font-size: 0.65rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
}

.summary-val {
    font-size: 0.85rem;
    color: var(--gold-light);
    font-weight: 500;
    text-align: right;
    font-family: 'Playfair Display', serif;
}

/* ========== PRICE ROW (ADDED) ========== */
.summary-price {
    color: var(--gold);
    font-weight: 700;
    font-size: 0.9rem;
}

/* ========== STATUS BADGES ========== */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.2rem 0.75rem;
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

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .reservation-layout {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .summary-col {
        order: -1;
    }
    
    .summary-card {
        position: static;
    }
    
    .select-cards-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 640px) {
    .form-row-2 {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    .select-cards-grid {
        grid-template-columns: 1fr;
    }
    
    .service-cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .page-title {
        font-size: 1.8rem;
    }
    
    .form-section {
        padding: 1.25rem;
    }
    
    .btn-primary-elegant,
    .btn-secondary-elegant {
        width: 100%;
        justify-content: center;
    }
    
    div[style*="display:flex; gap:12px"] {
        flex-direction: column;
    }
}
</style>

<div class="update-container">
    {{-- Page Header --}}
    <div class="page-header">
        <div class="section-label">Edit Booking</div>
        <h1 class="page-title">Update Reservation</h1>
        <p class="page-subtitle">{{ $reservation->client_name }} · Reservation ID: #{{ $reservation->id }}</p>
        <div class="page-divider"></div>
    </div>

    <div class="reservation-layout">
        {{-- Form Column --}}
        <div class="form-col">
            <form action="" method="post">
                @csrf

                {{-- Client Information --}}
                <div class="form-section">
                    <p class="form-section-label">Client Information</p>
                    <div class="form-row-2">
                        <div class="form-group-elegant">
                            <label class="form-label-elegant">Full Name</label>
                            <input type="text" name="client_name" class="form-control-elegant" value="{{ $reservation->client_name }}" required>
                        </div>
                        <div></div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-group-elegant">
                            <label class="form-label-elegant">Email Address</label>
                            <input type="email" name="email" class="form-control-elegant" value="{{ $reservation->email }}" required>
                        </div>
                        <div class="form-group-elegant">
                            <label class="form-label-elegant">Phone Number</label>
                            <input type="text" name="phone" class="form-control-elegant" value="{{ $reservation->phone }}" required>
                        </div>
                    </div>
                </div>

                {{-- Venue Selection --}}
                <div class="form-section">
                    <p class="form-section-label">Select a Venue</p>
                    <input type="hidden" name="venue" id="venueInput" value="{{ $reservation->venue }}">
                    <div class="select-cards-grid">
                        @php
                        $venues = [
                            ['val'=>'Garden', 'label'=>'Garden Oasis', 'sub'=>'Up to 250 guests · Outdoor', 'img'=>'images/1.png'],
                            ['val'=>'Ballroom', 'label'=>'Grand Ballroom', 'sub'=>'Up to 500 guests · Indoor', 'img'=>'images/2.png'],
                            ['val'=>'Coastal', 'label'=>'Coastal Retreat', 'sub'=>'Up to 300 guests · Seaside', 'img'=>'images/3.png'],
                        ];
                        @endphp
                       
                            @foreach($venues as $v)
                            <div class="select-card venue-select-card {{ $reservation->venue == $v['val'] ? 'selected' : '' }}"
                                data-value="{{ $v['val'] }}" onclick="selectCard(this, 'venueInput')">
                                <div class="select-card-img">
                                    <img src="{{ asset($v['img']) }}" alt="{{ $v['label'] }}">
                                </div>
                                <div class="select-card-body">
                                    <span class="select-card-name">{{ $v['label'] }}</span>
                                    <span class="select-card-sub">{{ $v['sub'] }}</span>
                                </div>
                                <span class="select-card-check">✓</span>
                            </div>
                            @endforeach
                    </div>
                </div>

                {{-- Event / Service Type --}}
                <div class="form-section">
                    <p class="form-section-label">Event / Service Type</p>
                    <input type="hidden" name="event_type" id="serviceInput" value="{{ $reservation->event_type }}">
                    <div class="service-cards-grid">
                            @php
                            $services = [
                                ['val'=>'Debut',    'label'=>'Debut',    'img'=> asset('icons/1.png')],
                                ['val'=>'Prom',     'label'=>'Prom',     'img'=> asset('icons/2.png')],
                                ['val'=>'Reunion',  'label'=>'Reunion',  'img'=> asset('icons/3.png')],
                                ['val'=>'Meeting',  'label'=>'Meeting',  'img'=> asset('icons/4.png')],
                                ['val'=>'Wedding',  'label'=>'Wedding',  'img'=> asset('icons/5.png')],
                                ['val'=>'Birthday', 'label'=>'Birthday', 'img'=> asset('icons/6.png')],
                                ['val'=>'Outing',   'label'=>'Outing',   'img'=> asset('icons/7.png')],
                                ['val'=>'Hangout',  'label'=>'Hangout',  'img'=> asset('icons/8.png')],
                                ['val'=>'Other',    'label'=>'Other',    'img'=> asset('icons/9.png')],
                            ];
                            @endphp
                            @foreach($services as $s)
                            <div class="service-pill {{ $reservation->event_type == $s['val'] ? 'selected' : '' }}"
                                data-value="{{ $s['val'] }}" onclick="selectService(this)">
                                <div class="service-icon-wrap">
                                    <img src="{{ $s['img'] }}" alt="{{ $s['label'] }}">
                                </div>
                                <span class="service-pill-label">{{ $s['label'] }}</span>
                            </div>
                            @endforeach
                    </div>
                    <div id="otherInput" style="{{ $reservation->event_type == 'Other' ? '' : 'display:none;' }} margin-top:0.75rem;">
                        <textarea name="other_specification" class="form-control-elegant" placeholder="Please describe your event..." rows="3">{{ $reservation->other_specification ?? '' }}</textarea>
                    </div>
                </div>

                {{-- Event Schedule & Details --}}
                <div class="form-section">
                    <p class="form-section-label">Event Schedule & Details</p>
                    <div class="form-row-2">
                        <div class="form-group-elegant">
                            <label class="form-label-elegant">Event Date</label>
                            <input type="date" name="event_date" class="form-control-elegant" value="{{ $reservation->event_date }}" required>
                        </div>
                        <div class="form-group-elegant">
                           <label class="form-label-elegant">Event Time</label>
                            @php
                                preg_match('/(\d+):(\d+)\s*(AM|PM)/i', $reservation->event_time ?? '6:00 AM', $tm);
                                $oldHour = isset($tm[1]) ? (int)$tm[1] : 6;
                                $oldMin  = isset($tm[2]) ? $tm[2] : '00';
                                $oldAmpm = isset($tm[3]) ? strtoupper($tm[3]) : 'AM';
                            @endphp
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:0.5rem;">
                                <select id="event_hour" class="form-control-elegant" style="cursor:pointer;">
                                    @for($h = 1; $h <= 12; $h++)
                                        <option value="{{ $h }}" {{ $oldHour == $h ? 'selected' : '' }}>{{ $h }}</option>
                                    @endfor
                                </select>
                                <select id="event_minute" class="form-control-elegant" style="cursor:pointer;">
                                    @foreach(['00','15','30','45'] as $m)
                                        <option value="{{ $m }}" {{ $oldMin == $m ? 'selected' : '' }}>{{ $m }}</option>
                                    @endforeach
                                </select>
                                <select id="event_ampm" class="form-control-elegant" style="cursor:pointer;">
                                    <option value="AM" {{ $oldAmpm == 'AM' ? 'selected' : '' }}>AM</option>
                                    <option value="PM" {{ $oldAmpm == 'PM' ? 'selected' : '' }}>PM</option>
                                </select>
                            </div>
                            <input type="hidden" name="event_time" id="event_time" value="{{ $reservation->event_time }}">
                        </div>
                    </div>
                    <div class="form-group-elegant">
                        <label class="form-label-elegant">Number of Guests</label>
                        <input type="number" name="guest_count" class="form-control-elegant" value="{{ $reservation->guest_count }}" min="1" required>
                    </div>
                    <div class="form-group-elegant">
                        <label class="form-label-elegant">Special Requests <span style="font-weight:400;text-transform:none;letter-spacing:0;font-size:0.7rem;color:rgba(255,255,255,0.4);">(optional)</span></label>
                        <textarea name="special_requests" class="form-control-elegant" rows="3">{{ $reservation->special_requests }}</textarea>
                    </div>
                    <div class="form-group-elegant">
                        <label class="form-label-elegant">Reservation Status</label>
                        <select name="status" class="form-select-elegant">
                            <option value="Pending" @if($reservation->status=='Pending') selected @endif>Pending</option>
                            <option value="Confirmed" @if($reservation->status=='Confirmed') selected @endif>Confirmed</option>
                            <option value="Cancelled" @if($reservation->status=='Cancelled') selected @endif>Cancelled</option>
                        </select>
                    </div>
                    <div class="form-group-elegant">
                        <label class="form-label-elegant">Availability Calendar</label>
                        <div id="availCalendar">Loading...</div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div style="display:flex; gap:1rem; margin-top:0.5rem; flex-wrap:wrap;">
                    <button type="submit" class="btn-primary-elegant">
                        <i class="ti ti-device-floppy"></i> Update Reservation
                    </button>
                    <a href="/reservation/list" class="btn-secondary-elegant">
                        <i class="ti ti-x"></i> Cancel
                    </a>
                </div>
            </form>
        </div>

        {{-- Summary Sidebar --}}
        <div class="summary-col">
            <div class="summary-card">
                <div class="summary-item">
                    <span class="summary-key">Venue</span>
                    <span class="summary-val" id="sumVenue">{{ $reservation->venue ?: '—' }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-key">Service</span>
                    <span class="summary-val" id="sumService">{{ $reservation->event_type ?: '—' }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-key">Date</span>
                    <span class="summary-val">{{ \Carbon\Carbon::parse($reservation->event_date)->format('M j, Y') ?: '—' }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-key">Time</span>
                    <span class="summary-val">{{ $reservation->event_time ?: '—' }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-key">Guests</span>
                    <span class="summary-val">{{ number_format($reservation->guest_count) ?: '—' }}</span>
                </div>

                {{-- PRICE BREAKDOWN (ADDED) --}}
                <div class="summary-item">
                    <span class="summary-key">Venue Price</span>
                    <span class="summary-val summary-price" id="venuePriceDisplay">₱0</span>
                </div>
                <div class="summary-item">
                    <span class="summary-key">Service Price</span>
                    <span class="summary-val summary-price" id="servicePriceDisplay">₱0</span>
                </div>
                <div class="summary-item" style="border-top: 2px solid rgba(212, 175, 55, 0.3); margin-top: 0.2rem; padding-top: 0.8rem;">
                    <span class="summary-key">Total Price</span>
                    <span class="summary-val summary-price" id="totalPriceDisplay" style="font-size: 1rem; font-weight: 800;">₱0</span>
                </div>

                <div class="summary-item">
                    <span class="summary-key">Status</span>
                    <span class="status-badge
                        @if($reservation->status=='Confirmed') status-confirmed
                        @elseif($reservation->status=='Cancelled') status-cancelled
                        @else status-pending @endif">
                        {{ $reservation->status }}
                    </span>
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
        'Corporate': 20000,
    };
    window.defaultVenuePrice = 50000;
    window.defaultServicePrice = 10000;

    // Helper: get price for venue
    function getVenuePrice(venueVal) {
        if (!venueVal) return 0;
        return window.venuePricing[venueVal] || window.defaultVenuePrice;
    }

    // Helper: get price for service
    function getServicePrice(serviceVal) {
        if (!serviceVal) return 0;
        return window.servicePricing[serviceVal] || window.defaultServicePrice;
    }

    // Format as PHP-like currency
    function formatPHP(amount) {
        return '₱' + amount.toLocaleString('en-PH');
    }

    // Update price displays in sidebar
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

    // Original selectCard logic extended to update prices and summary name
    function selectCard(el, inputId) {
        document.querySelectorAll('.select-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
        document.getElementById(inputId).value = el.dataset.value;
        if (inputId === 'venueInput') {
            const venueName = el.querySelector('.select-card-name')?.textContent || el.dataset.value;
            document.getElementById('sumVenue').textContent = venueName;
            loadCalendar(el.dataset.value);
            updatePrices(); // update price when venue changes
        }
    }

    // Original selectService logic extended to update prices and summary name
    function selectService(el) {
        document.querySelectorAll('.service-pill').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
        document.getElementById('serviceInput').value = el.dataset.value;
        const serviceName = el.querySelector('.service-pill-label')?.textContent || el.dataset.value;
        document.getElementById('sumService').textContent = serviceName;
        document.getElementById('otherInput').style.display = el.dataset.value === 'Other' ? 'block' : 'none';
        updatePrices(); // update price when service changes
    }

    // Availability calendar (unchanged)
    async function loadCalendar(venue) {
        const cal = document.getElementById('availCalendar');
        if (!cal) return;
        
        cal.innerHTML = '<span style="color: rgba(255,255,255,0.5);">Checking availability...</span>';
        
        try {
            const response = await fetch('/api/availability?venue=' + (venue || ''));
            const data = await response.json();
            const blocked = [...(data.booked || []), ...(data.blocked || [])];
            
            if (!blocked.length) {
                cal.innerHTML = '<span style="color: #7C9D7C;"><i class="ti ti-circle-check"></i> All dates are available</span>';
                return;
            }
            
            cal.innerHTML = '<strong style="color: var(--gold-light);">⚠️ Unavailable dates:</strong><br>' +
                blocked.map(d => `<span style="display:inline-block;background:rgba(201,123,132,0.15);border-radius:20px;padding:2px 10px;margin:3px;font-size:0.7rem;color:#C97B84;">${d}</span>`).join('');
        } catch (error) {
            cal.innerHTML = '<span style="color: rgba(255,255,255,0.5);">Unable to load availability</span>';
        }
    }

    // Initialise on DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        // Set initial prices based on current selected values
        updatePrices();

        // Load availability for the current venue
        const currentVenue = document.getElementById('venueInput').value;
        if (currentVenue) loadCalendar(currentVenue);
        else loadCalendar(null);
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