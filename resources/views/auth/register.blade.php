<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — GadgetHub</title>
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
                radial-gradient(ellipse at 30% 60%, rgba(124, 58, 237, 0.12) 0%, transparent 55%),
                radial-gradient(ellipse at 75% 20%, rgba(217, 70, 239, 0.08) 0%, transparent 45%);
            pointer-events: none;
        }

        .dot-grid {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .brand-link {
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

        /* Steps */
        .steps-wrap {
            position: relative;
            z-index: 1;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 1.5rem;
        }

        .step-num {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(124, 58, 237, 0.15);
            border: 1px solid rgba(124, 58, 237, 0.3);
            color: var(--primary-light);
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .step-title {
            font-size: 0.845rem;
            font-weight: 600;
            color: #fff;
            line-height: 1;
            margin-bottom: 3px;
        }

        .step-desc {
            font-size: 0.75rem;
            color: var(--text-dim);
        }

        .step-connector {
            display: block;
            width: 1px;
            height: 16px;
            background: rgba(124, 58, 237, 0.2);
            margin-left: 13px;
            margin-bottom: 0;
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
            max-width: 260px;
        }

        /* RIGHT PANEL */
        .right-panel {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.5rem;
            background: var(--bg);
            overflow-y: auto;
        }

        @media (min-width: 992px) {
            .right-panel {
                width: 460px;
                flex-shrink: 0;
            }
        }

        .register-box {
            width: 100%;
            max-width: 390px;
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

        .register-heading {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.4px;
            margin-bottom: 0.3rem;
        }

        .register-sub {
            font-size: 0.875rem;
            color: var(--text-dim);
            margin-bottom: 1.75rem;
        }

        /* Alerts */
        .alert-danger-dark {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #FCA5A5;
            border-radius: 8px;
            font-size: 0.83rem;
            padding: 0.7rem 0.9rem;
            margin-bottom: 1.25rem;
        }

        .alert-danger-dark ul {
            padding-left: 1.1rem;
            margin: 0.25rem 0 0;
        }

        .alert-danger-dark li {
            margin-bottom: 2px;
        }

        /* Form */
        .form-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.5);
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

        /* Strength bar */
        .strength-bar {
            display: flex;
            gap: 4px;
            margin-top: 7px;
            height: 3px;
        }

        .strength-bar span {
            flex: 1;
            border-radius: 3px;
            background: rgba(255, 255, 255, 0.07);
            transition: background 0.25s;
        }

        .strength-label {
            font-size: 0.72rem;
            margin-top: 5px;
            color: rgba(255, 255, 255, 0.25);
            transition: color 0.25s;
        }

        .btn-register {
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

        .btn-register:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .terms-text {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.25);
            text-align: center;
            margin-top: 0.65rem;
        }

        .terms-text a {
            color: rgba(167, 139, 250, 0.7);
            text-decoration: none;
            transition: color 0.15s;
        }

        .terms-text a:hover {
            color: var(--primary-light);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.15);
            font-size: 0.77rem;
            margin: 1.2rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(124, 58, 237, 0.15);
        }

        .login-text {
            text-align: center;
            font-size: 0.845rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .login-text a {
            color: var(--primary-light);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.15s;
        }

        .login-text a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    {{-- LEFT PANEL --}}
    <div class="left-panel">
        <div class="dot-grid"></div>

        <a class="brand-link" href="/">
            <div class="brand-mark"><i class="bi bi-lightning-charge-fill"></i></div>
            <div class="brand-label">Gadget<span>Hub</span></div>
        </a>

        <div class="steps-wrap">
            <div class="step-item">
                <div class="step-num">1</div>
                <div>
                    <div class="step-title">Buat Akun</div>
                    <div class="step-desc">Daftar gratis, hanya butuh beberapa detik</div>
                </div>
            </div>
            <span class="step-connector"></span>
            <div class="step-item">
                <div class="step-num">2</div>
                <div>
                    <div class="step-title">Jelajahi Produk</div>
                    <div class="step-desc">Ribuan gadget & aksesoris pilihan</div>
                </div>
            </div>
            <span class="step-connector"></span>
            <div class="step-item">
                <div class="step-num">3</div>
                <div>
                    <div class="step-title">Tambah ke Keranjang</div>
                    <div class="step-desc">Pilih produk & atur pesananmu</div>
                </div>
            </div>
            <span class="step-connector"></span>
            <div class="step-item">
                <div class="step-num">4</div>
                <div>
                    <div class="step-title">Checkout & Nikmati</div>
                    <div class="step-desc">Pengiriman cepat ke seluruh Indonesia</div>
                </div>
            </div>
        </div>

        <div class="left-footer">
            <div class="left-tagline">Mulai belanja<br><span>hari ini.</span></div>
            <div class="left-desc">Bergabung dengan jutaan pembeli yang sudah percaya GadgetHub.</div>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="right-panel">
        <div class="register-box">

            <div class="mobile-brand">
                <div class="brand-mark"><i class="bi bi-lightning-charge-fill" style="color:#fff;"></i></div>
                <div style="font-family:'Inter',sans-serif;font-weight:700;font-size:1rem;color:#fff;">
                    Gadget<span style="color:var(--magenta);">Hub</span>
                </div>
            </div>

            <div class="register-heading">Buat akun baru</div>
            <div class="register-sub">Daftar dan mulai belanja sekarang</div>

            @if ($errors->any())
                <div class="alert-danger-dark">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-wrap">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Nama kamu" required autocomplete="name">
                        <i class="bi bi-person input-icon"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email">
                        <i class="bi bi-envelope input-icon"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-wrap">
                        <input type="password" name="password" id="passwordField" class="form-control"
                            placeholder="Min. 8 karakter" required autocomplete="new-password"
                            oninput="checkStrength(this.value)" style="padding-right: 2.6rem !important;">
                        <i class="bi bi-lock input-icon"></i>
                        <button type="button" class="btn-toggle-pw" onclick="togglePw('passwordField','eye1')">
                            <i class="bi bi-eye" id="eye1"></i>
                        </button>
                    </div>
                    <div class="strength-bar" id="strengthBar">
                        <span id="s1"></span><span id="s2"></span><span id="s3"></span><span
                            id="s4"></span>
                    </div>
                    <div class="strength-label" id="strengthLabel">Minimal 8 karakter</div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <input type="password" name="password_confirmation" id="confirmField" class="form-control"
                            placeholder="Ulangi password" required autocomplete="new-password"
                            style="padding-right: 2.6rem !important;">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <button type="button" class="btn-toggle-pw" onclick="togglePw('confirmField','eye2')">
                            <i class="bi bi-eye" id="eye2"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-register">Daftar Sekarang</button>

                <p class="terms-text">
                    Dengan mendaftar, kamu menyetujui
                    <a href="/terms">Syarat & Ketentuan</a> serta
                    <a href="/privacy">Kebijakan Privasi</a> kami.
                </p>
            </form>

            <div class="divider">atau</div>

            <p class="login-text">
                Sudah punya akun? <a href="/login">Login di sini</a>
            </p>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePw(fieldId, iconId) {
            const f = document.getElementById(fieldId);
            const i = document.getElementById(iconId);
            f.type = f.type === 'password' ? 'text' : 'password';
            i.className = f.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
        }

        const strengthColors = ['#EF4444', '#F97316', '#EAB308', '#22C55E'];
        const strengthLabels = ['Lemah', 'Cukup', 'Kuat', 'Sangat kuat'];

        function checkStrength(val) {
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            for (let i = 1; i <= 4; i++) {
                document.getElementById('s' + i).style.background =
                    i <= score ? strengthColors[score - 1] : 'rgba(255,255,255,0.07)';
            }

            const lbl = document.getElementById('strengthLabel');
            if (!val.length) {
                lbl.textContent = 'Minimal 8 karakter';
                lbl.style.color = 'rgba(255,255,255,0.25)';
            } else {
                lbl.textContent = strengthLabels[score - 1] || 'Terlalu pendek';
                lbl.style.color = strengthColors[score - 1] || '#EF4444';
            }
        }
    </script>
</body>

</html>
