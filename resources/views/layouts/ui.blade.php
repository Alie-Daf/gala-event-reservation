<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> GÁLA| Event Reservation System</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800;900&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- Bootstrap (lightweight, only for grid if needed) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    
    <style>
        /* ============================================
           ROYAL RENAISSANCE THEME - MAIN LAYOUT
           Royal Blue & Gold Color Palette
        ============================================ */
        
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
        }

        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, var(--royal-blue-dark) 0%, var(--royal-blue) 50%, var(--royal-blue-light) 100%);
            color: var(--white-soft);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Satin-like Texture Overlay */
        body::before {
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

        /* Animated Gold Dust */
        body::after {
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

        /* ========== NAVBAR ========== */
        .navbar-royal {
            background: linear-gradient(135deg, var(--royal-blue-dark) 0%, var(--royal-blue) 100%);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            padding: 0.75rem 1.5rem;
            box-shadow: var(--shadow-md);
            position: relative;
            z-index: 100;
        }

        .navbar-royal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), var(--gold-light), var(--gold), transparent);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: 1px;
            transition: var(--transition-fast);
        }

        .navbar-brand:hover {
            transform: scale(1.02);
            color :transparent !important;
            text-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        }

        .navbar-toggler {
            border-color: rgba(212, 175, 55, 0.5);
            background: rgba(16, 32, 66, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23C9A03D' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.03em;
            transition: var(--transition-fast);
            position: relative;
            padding: 0.5rem 1rem !important;
        }

        .nav-link i {
            margin-right: 0.5rem;
            font-size: 1rem;
            color: var(--gold-light);
            transition: var(--transition-fast);
        }

        .nav-link:hover {
            color: var(--gold-light) !important;
            transform: translateY(-1px);
        }

        .nav-link:hover i {
            color: var(--gold);
            transform: scale(1.1);
        }

        /* Active nav link indicator */
        .nav-link.active {
            color: var(--gold-light) !important;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        /* Dropdown Styling */
        .dropdown-menu {
            background: linear-gradient(145deg, var(--royal-blue), var(--royal-blue-dark));
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(10px);
        }

        .dropdown-item {
            color: var(--white-soft);
            transition: var(--transition-fast);
        }

        .dropdown-item:hover {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-light);
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            position: relative;
            z-index: 1;
            min-height: calc(100vh - 80px);
            padding: 2rem 1rem;
        }

        .content-wrapper {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ========== PAGE HEADER STYLES (for child pages) ========== */
        .section-label {
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.85rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold-soft);
            margin-bottom: 0.5rem;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--white) 0%, var(--gold-light) 40%, var(--gold) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .page-divider {
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
            margin: 1rem 0 1.5rem;
            border-radius: 2px;
        }

        /* ========== CARD STYLES ========== */
        .card-elegant {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.15);
            border-radius: 24px;
            transition: var(--transition-base);
        }

        .card-elegant:hover {
            border-color: rgba(212, 175, 55, 0.4);
            box-shadow: var(--shadow-sm);
            transform: translateY(-3px);
        }

        /* ========== BUTTON OVERRIDES ========== */
        .btn-primary-elegant {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
            color: var(--royal-blue-dark) !important;
            border: none;
            border-radius: 40px;
            padding: 0.7rem 1.8rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            transition: var(--transition-base);
        }

        .btn-primary-elegant:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
        }

        .btn-outline-teal {
            background: transparent;
            border: 1.5px solid rgba(212, 175, 55, 0.5);
            color: var(--gold-light) !important;
            border-radius: 40px;
            padding: 0.7rem 1.8rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            transition: var(--transition-base);
        }

        .btn-outline-teal:hover {
            background: rgba(212, 175, 55, 0.1);
            border-color: var(--gold);
            transform: translateY(-2px);
            text-decoration: none;
            color: var(--gold-light);
        }

        /* ========== STATUS BADGES ========== */
        .status-pending {
            background: rgba(245, 215, 110, 0.15);
            color: var(--gold-soft);
            border: 1px solid rgba(245, 215, 110, 0.3);
        }
        .status-confirmed {
            background: rgba(124, 157, 124, 0.15);
            color: #7C9D7C;
            border: 1px solid rgba(124, 157, 124, 0.3);
        }
        .status-cancelled {
            background: rgba(201, 123, 132, 0.15);
            color: #C97B84;
            border: 1px solid rgba(201, 123, 132, 0.3);
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease;
        }

        .slide-up {
            animation: slideUp 0.5s ease;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .navbar-royal {
                padding: 0.5rem 1rem;
            }
            
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .nav-link {
                padding: 0.5rem 0 !important;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .main-content {
                padding: 1rem;
            }
        }

        /* ========== SCROLLBAR ========== */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--royal-blue-dark);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-light);
        }

        /* ========== UTILITY CLASSES ========== */
        .text-gold {
            color: var(--gold-light);
        }
        
        .bg-gold-gradient {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        }
        
        .border-gold {
            border-color: var(--gold) !important;
        }
    </style>
</head>
<body>

    {{-- Royal Navigation Bar --}}
    <nav class="navbar navbar-royal navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <i class="ti ti-crown" style="font-size: 1.3rem; margin-right: 0.5rem;"></i>
                GÁLA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">
                            <i class="ti ti-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('venues') ? 'active' : '' }}" href="/venues">
                            <i class="ti ti-building"></i> Venues
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('reservation/new') ? 'active' : '' }}" href="/reservation/new">
                            <i class="ti ti-plus"></i> New Reservation
                        </a>
                    </li>

                    {{-- Authorization Section --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('reservation/list') ? 'active' : '' }}" href="/reservation/list">
                                <i class="ti ti-calendar-user"></i> My Reservations
                            </a>
                        </li>
                        @if(auth()->user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/*') ? 'active' : '' }}" href="/admin/dashboard">
                                    <i class="ti ti-dashboard"></i> Admin
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="ti ti-login"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                <i class="ti ti-user-plus"></i> Register
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ti ti-logout"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="main-content">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer style="text-align: center; padding: 2rem; position: relative; z-index: 1; border-top: 1px solid rgba(212, 175, 55, 0.15); margin-top: 2rem;">
        <p style="font-size: 0.7rem; color: rgba(255, 255, 255, 0.4); letter-spacing: 1px;">
            <i class="ti ti-crown"></i> GÁLA — Ginagi pero Sosyal.
        </p>
        <p style="font-size: 0.65rem; color: rgba(255, 255, 255, 0.3);">
            © {{ date('Y') }} GÁLA. All rights reserved.
        </p>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Page-specific scripts --}}
    @yield('script')
    
    {{-- Additional global scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add slide-up animation to main content
            const mainContent = document.querySelector('.main-content');
            if (mainContent) {
                mainContent.classList.add('slide-up');
            }
            
            // Active nav link highlighting based on current URL
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                const href = link.getAttribute('href');
                if (href && href !== '#' && currentPath === href) {
                    link.classList.add('active');
                } else if (href && href !== '#' && currentPath.startsWith(href) && href !== '/') {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>