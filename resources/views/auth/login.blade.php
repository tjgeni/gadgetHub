<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — GadgetHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7C3AED;
            --primary-dark: #5B21B6;
            --primary-light: #A78BFA;
            --magenta: #D946EF;
            --bg: #0F0720;
            --surface: #1A0E30;
            --border: rgba(124, 58, 237, 0.2);
            --text-dim: rgba(255, 255, 255, 0.4);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            display: flex;
            align-items: stretch;
        }

        /* LEFT PANEL */
        .left-panel {
            flex: 1;
            display: none;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
            position: relative;
            overflow: hidden;
            background: var(--surface);
            border-right: 1px solid var(--border);
        }

        @media (min-width: 992px) {
            .left-panel {
                display: flex;
            }
        }

        .left-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 70% 30%, rgba(124, 58, 237, 0.15) 0%, transparent 60%),
                radial-gradient(ellipse at 20% 80%, rgba(217, 70, 239, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        /* subtle grid */
        .dot-grid {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .left-brand {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 8px;
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
            font-size: 0.9rem;
            color: #fff;
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

        /* feature list */
        .feature-list {
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 1.5rem;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        .feature-icon.purple {
            background: rgba(124, 58, 237, 0.15);
            color: var(--primary-light);
        }

        .feature-icon.magenta {
            background: rgba(217, 70, 239, 0.12);
            color: #E879F9;
        }

        .feature-icon.teal {
            background: rgba(20, 184, 166, 0.20);
            color: #2DD4BF;
            border: 1px solid rgba(20, 184, 166, 0.25);
        }

        .feature-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #fff;
            line-height: 1;
            margin-bottom: 3px;
        }

        .feature-desc {
            font-size: 0.75rem;
            color: var(--text-dim);
        }

        .left-footer {
            position: relative;
            z-index: 1;
        }

        .left-tagline {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.5px;
            line-height: 1.3;
            margin-bottom: 0.4rem;
        }

        .left-tagline span {
            color: var(--magenta);
        }

        .left-desc {
            font-size: 0.845rem;
            color: var(--text-dim);
            max-width: 280px;
        }

        /* RIGHT PANEL */
        .right-panel {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            background: var(--bg);
        }

        @media (min-width: 992px) {
            .right-panel {
                width: 420px;
                flex-shrink: 0;
            }
        }

        .login-box {
            width: 100%;
            max-width: 360px;
        }

        .mobile-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 2rem;
        }

        @media (min-width: 992px) {
            .mobile-brand {
                display: none;
            }
        }

        .login-heading {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.4px;
            margin-bottom: 0.3rem;
        }

        .login-sub {
            font-size: 0.875rem;
            color: var(--text-dim);
            margin-bottom: 1.75rem;
        }

        /* Alerts */
        .alert-success-dark {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #86EFAC;
            border-radius: 8px;
            font-size: 0.845rem;
            padding: 0.65rem 0.9rem;
            margin-bottom: 1rem;
        }

        .alert-danger-dark {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #FCA5A5;
            border-radius: 8px;
            font-size: 0.845rem;
            padding: 0.65rem 0.9rem;
            margin-bottom: 1rem;
        }

        /* Form */
        .form-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 0.4rem;
            display: block;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.2);
            font-size: 0.9rem;
            pointer-events: none;
            transition: color 0.15s;
        }

        .input-wrap:focus-within .input-icon {
            color: var(--primary-light);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(124, 58, 237, 0.2) !important;
            color: #fff !important;
            border-radius: 8px !important;
            padding: 0.65rem 1rem 0.65rem 2.4rem !important;
            font-size: 0.875rem !important;
            font-family: 'Inter', sans-serif !important;
            transition: border-color 0.15s, box-shadow 0.15s !important;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.18) !important;
        }

        .form-control:focus {
            border-color: var(--primary-light) !important;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15) !important;
            background: rgba(255, 255, 255, 0.07) !important;
        }

        .form-control.is-invalid {
            border-color: #EF4444 !important;
        }

        .btn-toggle-pw {
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
            padding: 0;
            font-size: 0.9rem;
            transition: color 0.15s;
        }

        .btn-toggle-pw:hover {
            color: rgba(255, 255, 255, 0.5);
        }

        .forgot-link {
            font-size: 0.77rem;
            color: var(--primary-light);
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.15s;
        }

        .forgot-link:hover {
            opacity: 1;
            color: var(--primary-light);
        }

        .btn-login {
            background: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 0.7rem;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            color: #fff;
            width: 100%;
            cursor: pointer;
            transition: background 0.15s, transform 0.12s;
            letter-spacing: -0.1px;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.15);
            font-size: 0.77rem;
            margin: 1.25rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(124, 58, 237, 0.15);
        }

        .register-text {
            text-align: center;
            font-size: 0.845rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .register-text a {
            color: var(--primary-light);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.15s;
        }

        .register-text a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    {{-- LEFT PANEL --}}
    <div class="left-panel">
        <div class="dot-grid"></div>

        <a class="left-brand" href="/">
            <div class="brand-mark"><i class="bi bi-lightning-charge-fill"></i></div>
            <div class="brand-label">Gadget<span>Hub</span></div>
        </a>

        <div class="feature-list">
            <div class="feature-item">
                <div class="feature-icon purple"><i class="bi bi-cpu-fill"></i></div>
                <div>
                    <div class="feature-title">10.000+ Produk</div>
                    <div class="feature-desc">Gadget & aksesoris pilihan terlengkap</div>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon teal"><i class="bi bi-patch-check-fill"></i></div>
                <div>
                    <div class="feature-title">Garansi Resmi</div>
                    <div class="feature-desc">Semua produk 100% original</div>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon magenta"><i class="bi bi-truck"></i></div>
                <div>
                    <div class="feature-title">Pengiriman Cepat</div>
                    <div class="feature-desc">Same-day ke seluruh kota besar</div>
                </div>
            </div>
        </div>

        <div class="left-footer">
            <div class="left-tagline">Belanja gadget<br><span>lebih mudah.</span></div>
            <div class="left-desc">Aksesoris & gadget terlengkap dengan harga terbaik.</div>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="right-panel">
        <div class="login-box">

            <div class="mobile-brand">
                <div class="brand-mark"><i class="bi bi-lightning-charge-fill" style="color:#fff;"></i></div>
                <div class="brand-label"
                    style="font-family:'Inter',sans-serif;font-weight:700;font-size:1rem;color:#fff;">
                    Gadget<span style="color:var(--magenta);">Hub</span>
                </div>
            </div>

            <div class="login-heading">Selamat datang</div>
            <div class="login-sub">Masuk ke akun GadgetHub kamu</div>

            @if (session('success'))
                <div class="alert-success-dark">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert-danger-dark">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email">
                        <i class="bi bi-envelope input-icon"></i>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label mb-0">Password</label>
                        <a href="/forgot-password" class="forgot-link">Lupa password?</a>
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="password" id="passwordField" class="form-control"
                            placeholder="••••••••" required autocomplete="current-password"
                            style="padding-right: 2.6rem !important;">
                        <i class="bi bi-lock input-icon"></i>
                        <button type="button" class="btn-toggle-pw" onclick="togglePassword()">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <div class="divider">atau</div>

            <p class="register-text">
                Belum punya akun? <a href="/register">Daftar sekarang</a>
            </p>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const field = document.getElementById('passwordField');
            const icon = document.getElementById('eyeIcon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                field.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>
</body>

</html>
