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
            --magenta: #D946EF;
            --magenta-light: #E879F9;
            --surface: #FFFFFF;
            --surface-2: #F8F7FF;
            --border: #EDE9FE;
            --text: #1C1033;
            --text-muted: #6B7280;
            --text-subtle: #9CA3AF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: #F5F3FF;
            font-family: 'Inter', sans-serif;
            color: var(--text);
            margin: 0;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--surface) !important;
            border-bottom: 1px solid var(--border);
            padding: 0.65rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: -0.4px;
            color: var(--text) !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .brand-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--magenta);
            display: inline-block;
        }

        .navbar .nav-link {
            color: var(--text-muted) !important;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.4rem 0.75rem !important;
            border-radius: 6px;
            transition: color 0.15s, background 0.15s;
        }

        .navbar .nav-link:hover {
            color: var(--primary) !important;
            background: var(--surface-2);
        }

        .navbar .nav-link.active-link {
            color: var(--primary) !important;
            background: #EDE9FE;
        }

        .navbar .dropdown-menu {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(124, 58, 237, 0.08);
            min-width: 160px;
            padding: 4px;
        }

        .navbar .dropdown-item {
            color: var(--text);
            font-size: 0.875rem;
            border-radius: 6px;
            padding: 0.45rem 0.75rem;
            transition: background 0.12s;
        }

        .navbar .dropdown-item:hover {
            background: var(--surface-2);
            color: var(--primary);
        }

        .navbar .dropdown-item.text-danger {
            color: #EF4444 !important;
        }

        .navbar .dropdown-item.text-danger:hover {
            background: #FEF2F2;
        }

        .cart-badge {
            font-size: 0.6rem;
            font-weight: 700;
            padding: 2px 5px;
            background: var(--magenta) !important;
            color: #fff !important;
            border-radius: 20px;
        }

        .user-avatar-sm {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--magenta));
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 600;
            color: #fff;
        }

        /* ── ALERTS ── */
        .alert-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            border-left: 3px solid #22C55E;
            color: #15803D;
            border-radius: 8px;
            font-size: 0.875rem;
        }

        .alert-danger {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-left: 3px solid #EF4444;
            color: #B91C1C;
            border-radius: 8px;
            font-size: 0.875rem;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            color: var(--text-subtle);
        }

        footer .footer-brand {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--text);
            letter-spacing: -0.3px;
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
            min-height: calc(100vh - 200px);
        }
    </style>
    @stack('styles')
</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/home">
                GadgetHub<span class="brand-dot"></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <i class="bi bi-list" style="font-size:1.3rem; color:var(--text-muted);"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cart') ? 'active-link' : '' }}" href="/cart">
                            <i class="bi bi-bag me-1"></i>Keranjang
                            @php $cartCount = collect(session('cart', []))->sum('qty'); @endphp
                            @if ($cartCount > 0)
                                <span class="badge cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('orders*') ? 'active-link' : '' }}" href="/orders">
                            <i class="bi bi-receipt me-1"></i>Pesanan
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                            data-bs-toggle="dropdown">
                            <span class="user-avatar-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/profile">
                                    <i class="bi bi-person me-2"></i>Profil Saya
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
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
                    <div class="footer-brand mb-1">GadgetHub<span style="color:var(--magenta);">.</span></div>
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
