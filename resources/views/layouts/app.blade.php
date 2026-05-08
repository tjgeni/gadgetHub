<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetHub — @yield('title', 'Toko Aksesoris & Gadget Online')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7C3AED;
            --primary-light: #A78BFA;
            --primary-dark: #5B21B6;
            --primary-bg: #EDE9FE;
            --primary-bg-2: #F4F2FF;
            --magenta: #D946EF;
            --magenta-bg: #FDF0FF;
            --surface: #FFFFFF;
            --border: #EDE9FE;
            --text: #1C1033;
            --text-muted: #6B7280;
            --text-subtle: #9CA3AF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--primary-bg-2);
            font-family: 'Inter', sans-serif;
            color: var(--text);
            margin: 0;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--surface) !important;
            border-bottom: 1px solid var(--border);
            padding: 0;
            min-height: 58px;
        }

        .navbar>.container {
            min-height: 58px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.05rem;
            letter-spacing: -0.5px;
            color: var(--text) !important;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0;
            margin-right: 20px;
        }

        .brand-icon {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--primary), var(--magenta));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .brand-icon i {
            font-size: 0.85rem;
            color: #fff;
        }

        /* Nav links */
        .navbar .nav-link {
            color: var(--text-muted) !important;
            font-size: 0.83rem;
            font-weight: 500;
            padding: 6px 11px !important;
            border-radius: 7px;
            transition: color 0.15s, background 0.15s;
        }

        .navbar .nav-link:hover {
            color: var(--primary) !important;
            background: var(--primary-bg-2);
        }

        .navbar .nav-link.active-link {
            color: var(--primary) !important;
            background: var(--primary-bg);
        }

        /* Icon buttons */
        .nav-icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            position: relative;
            transition: background 0.15s, color 0.15s;
            text-decoration: none;
        }

        .nav-icon-btn:hover {
            background: var(--primary-bg-2);
            color: var(--primary);
        }

        .nav-icon-btn.active-link {
            background: var(--primary-bg);
            color: var(--primary);
        }

        .nav-icon-btn i {
            font-size: 1.05rem;
        }

        /* Cart badge */
        .cart-badge {
            position: absolute;
            top: 3px;
            right: 2px;
            width: 16px;
            height: 16px;
            background: var(--magenta);
            color: #fff;
            font-size: 0.58rem;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--surface);
        }

        /* Divider */
        .nav-divider {
            width: 1px;
            height: 24px;
            background: var(--border);
            margin: 0 4px;
        }

        /* User pill */
        .user-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 10px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--surface);
            transition: background 0.15s, border-color 0.15s;
            cursor: pointer;
        }

        .user-pill:hover {
            background: var(--primary-bg-2);
            border-color: var(--primary-light);
        }

        .user-avatar-sm {
            width: 27px;
            height: 27px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--magenta));
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .user-pill .user-name {
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text);
        }

        /* Dropdown */
        .navbar .dropdown-menu {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 8px 28px rgba(124, 58, 237, 0.10);
            min-width: 168px;
            padding: 5px;
            margin-top: 6px !important;
        }

        .navbar .dropdown-item {
            color: var(--text);
            font-size: 0.84rem;
            font-weight: 500;
            border-radius: 7px;
            padding: 8px 12px;
            transition: background 0.12s;
        }

        .navbar .dropdown-item:hover {
            background: var(--primary-bg-2);
            color: var(--primary);
        }

        .navbar .dropdown-item.text-danger {
            color: #EF4444 !important;
        }

        .navbar .dropdown-item.text-danger:hover {
            background: #FEF2F2;
            color: #DC2626 !important;
        }

        .navbar .dropdown-divider {
            border-color: var(--border);
            margin: 4px 0;
        }

        /* ── ALERTS ── */
        .alert-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            border-left: 3px solid #22C55E;
            color: #15803D;
            border-radius: 9px;
            font-size: 0.84rem;
            font-weight: 500;
        }

        .alert-danger {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-left: 3px solid #EF4444;
            color: #B91C1C;
            border-radius: 9px;
            font-size: 0.84rem;
            font-weight: 500;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
        }

        footer .footer-brand {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--text);
            letter-spacing: -0.3px;
        }

        footer .footer-brand-dot {
            color: var(--magenta);
        }

        footer a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.8rem;
            transition: color 0.15s;
        }

        footer a:hover {
            color: var(--primary);
        }

        footer small {
            color: var(--text-subtle);
            font-size: 0.73rem;
        }

        /* ── BUTTONS ── */
        .btn-primary {
            background: var(--primary);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: background 0.15s, transform 0.12s;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        main.container {
            min-height: calc(100vh - 220px);
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            {{-- Brand --}}
            <a class="navbar-brand" href="/home">
                <div class="brand-icon">
                    <i class="bi bi-layers-fill"></i>
                </div>
                GadgetHub
            </a>

            {{-- Toggler --}}
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <i class="bi bi-list" style="font-size:1.3rem; color:var(--text-muted);"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                {{-- Left links --}}
                <ul class="navbar-nav me-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home') ? 'active-link' : '' }}" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('produk*') ? 'active-link' : '' }}"
                            href="/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active-link' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active-link' : '' }}"
                            href="/contact">Support</a>
                    </li>
                </ul>

                {{-- Right actions --}}
                <ul class="navbar-nav ms-auto align-items-center gap-1">

                    {{-- Cart --}}
                    @php $cartCount = collect(session('cart', []))->sum('qty'); @endphp
                    <li class="nav-item">
                        <a class="nav-icon-btn {{ request()->is('cart') ? 'active-link' : '' }}" href="/cart"
                            title="Keranjang">
                            <i class="bi bi-bag"></i>
                            @if ($cartCount > 0)
                                <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>

                    {{-- Orders --}}
                    <li class="nav-item">
                        <a class="nav-icon-btn {{ request()->is('orders*') ? 'active-link' : '' }}" href="/orders"
                            title="Pesanan">
                            <i class="bi bi-receipt"></i>
                        </a>
                    </li>

                    {{-- Divider --}}
                    <li class="nav-item d-none d-lg-flex align-items-center">
                        <div class="nav-divider"></div>
                    </li>

                    {{-- User dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link p-0 d-flex align-items-center" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="user-pill">
                                <span class="user-avatar-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <i class="bi bi-chevron-down" style="font-size:0.7rem; color:var(--text-subtle);"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/profile">
                                    <i class="bi bi-person me-2"></i>Profil Saya
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item text-danger w-100 border-0 bg-transparent text-start">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- FLASH MESSAGES --}}
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    {{-- CONTENT --}}
    <main class="container my-4">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="py-4 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="footer-brand mb-1">
                        GadgetHub<span class="footer-brand-dot">.</span>
                    </div>
                    <small>Toko Aksesoris & Gadget Online Terpercaya</small>
                </div>
                <div class="col-md-4 text-md-center mb-3 mb-md-0">
                    <div class="d-flex justify-content-md-center gap-3">
                        <a href="/home">Home</a>
                        <a href="/produk">Produk</a>
                        <a href="/about">About</a>
                        <a href="/contact">Support</a>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <small>&copy; {{ date('Y') }} GadgetHub. All rights reserved.</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
