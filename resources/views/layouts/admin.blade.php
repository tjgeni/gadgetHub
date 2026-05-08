<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetHub Admin — @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7C3AED;
            --primary-light: #A78BFA;
            --primary-dark: #5B21B6;
            --magenta: #D946EF;
            --magenta-soft: #F5D0FE;
            --sidebar-bg: #0F0720;
            --sidebar-width: 232px;
            --surface: #FFFFFF;
            --surface-2: #F8F7FF;
            --border: #EDE9FE;
            --text: #1C1033;
            --text-muted: #6B7280;
            --text-subtle: #9CA3AF;
            --sidebar-text: rgba(255, 255, 255, 0.55);
            --sidebar-border: rgba(255, 255, 255, 0.06);
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

        /* ─── SIDEBAR ─── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 100;
            border-right: 1px solid var(--sidebar-border);
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 3px;
        }

        /* Brand */
        .sidebar-brand {
            padding: 1.25rem 1.2rem 1rem;
            border-bottom: 1px solid var(--sidebar-border);
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand-mark {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: #fff;
            flex-shrink: 0;
        }

        .brand-label {
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .brand-label span {
            color: var(--magenta);
        }

        .brand-sub {
            font-size: 0.65rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-top: 1px;
        }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 0.85rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .nav-section-label {
            font-size: 0.62rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.25);
            padding: 0.9rem 0.65rem 0.3rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 0.5rem 0.75rem;
            border-radius: 7px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 0.845rem;
            font-weight: 500;
            transition: background 0.12s, color 0.12s;
        }

        .sidebar-link i {
            font-size: 0.95rem;
            width: 16px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .sidebar-link.active {
            background: rgba(124, 58, 237, 0.22);
            color: var(--primary-light);
        }

        .sidebar-divider {
            border: none;
            border-top: 1px solid var(--sidebar-border);
            margin: 0.5rem 0;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 0.5rem 0.75rem;
            border-radius: 7px;
            color: rgba(217, 70, 239, 0.7);
            font-size: 0.845rem;
            font-weight: 500;
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            transition: background 0.12s, color 0.12s;
        }

        .btn-logout:hover {
            background: rgba(217, 70, 239, 0.1);
            color: var(--magenta);
        }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 0.75rem 1rem 1rem;
            border-top: 1px solid var(--sidebar-border);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--magenta));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: #fff;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: #fff;
            line-height: 1.2;
        }

        .user-role {
            font-size: 0.68rem;
            color: rgba(255, 255, 255, 0.3);
        }

        /* ─── MAIN ─── */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0.7rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text);
            letter-spacing: -0.2px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-btn {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: var(--surface-2);
            color: var(--text-muted);
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.12s, color 0.12s;
            position: relative;
        }

        .topbar-btn:hover {
            background: #EDE9FE;
            color: var(--primary);
        }

        .topbar-btn .dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--magenta);
            border: 1px solid #fff;
        }

        .topbar-divider {
            width: 1px;
            height: 20px;
            background: var(--border);
            margin: 0 4px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--magenta));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 600;
            color: #fff;
        }

        .topbar-username {
            font-size: 0.845rem;
            font-weight: 500;
            color: var(--text);
        }

        /* Page content */
        .page-content {
            flex: 1;
            padding: 1.5rem;
        }

        /* Alerts */
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
    </style>
    @stack('styles')
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <a class="brand-link" href="/admin/dashboard">
                <div class="brand-mark"><i class="bi bi-lightning-charge-fill"></i></div>
                <div>
                    <div class="brand-label">Gadget<span>Hub</span></div>
                    <div class="brand-sub">Admin Panel</div>
                </div>
            </a>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">Overview</div>
            <a href="/admin/dashboard" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section-label">Katalog</div>
            <a href="/admin/categories" class="sidebar-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                <i class="bi bi-tag"></i> Kategori
            </a>
            <a href="/admin/products" class="sidebar-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                <i class="bi bi-cpu"></i> Produk
            </a>

            <div class="nav-section-label">Transaksi</div>
            <a href="/admin/orders" class="sidebar-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
                <i class="bi bi-receipt"></i> Pesanan
            </a>

            <div class="nav-section-label">Manajemen</div>
            <a href="/admin/users" class="sidebar-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Users
            </a>
            <a href="/admin/messages" class="sidebar-link {{ request()->is('admin/messages*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> Pesan Masuk
            </a>
        </nav>
    </aside>

    {{-- MAIN --}}
    <div class="main-wrapper">
        <header class="topbar">
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
            <div class="topbar-right">
                <button class="topbar-btn" title="Notifikasi">
                    <i class="bi bi-bell"></i>
                    <span class="dot"></span>
                </button>
                <a href="/admin/settings" class="topbar-btn" title="Pengaturan">
                    <i class="bi bi-gear"></i>
                </a>
                <div class="topbar-divider"></div>
                <div class="dropdown">
                    <div class="topbar-user d-flex align-items-center gap-2 dropdown-toggle" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="topbar-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <span class="topbar-username">
                            {{ Auth::user()->name }}
                        </span>
                    </div>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="/profile" style="font-size:14px;">
                                <i class="bi bi-person me-2"></i>Profil Saya
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item text-danger w-100 border-0 bg-transparent text-start"
                                    style="font-size:14px;">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="page-content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
