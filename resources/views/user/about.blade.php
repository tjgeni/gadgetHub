@extends('layouts.app')
@section('title', 'About Us')
@section('content')

    @push('styles')
        <style>
            /* ── HERO ── */
            .about-hero {
                background: #0F0720;
                border-radius: 16px;
                padding: 3rem 2.5rem;
                margin-bottom: 2rem;
                position: relative;
                overflow: hidden;
                border: 1px solid rgba(124, 58, 237, 0.15);
                text-align: center;
            }

            .about-hero::before {
                content: '';
                position: absolute;
                inset: 0;
                background:
                    radial-gradient(ellipse at 80% 20%, rgba(217, 70, 239, 0.12) 0%, transparent 55%),
                    radial-gradient(ellipse at 15% 85%, rgba(124, 58, 237, 0.12) 0%, transparent 45%);
                pointer-events: none;
            }

            .about-hero .dot-grid {
                position: absolute;
                inset: 0;
                background-image: radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
                background-size: 28px 28px;
                border-radius: 16px;
            }

            .about-hero-content {
                position: relative;
                z-index: 1;
            }

            .about-hero-icon {
                width: 56px;
                height: 56px;
                border-radius: 14px;
                background: rgba(124, 58, 237, 0.2);
                border: 1px solid rgba(124, 58, 237, 0.3);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                color: #A78BFA;
                margin-bottom: 1.1rem;
            }

            .about-hero-title {
                font-size: 1.75rem;
                font-weight: 700;
                color: #fff;
                letter-spacing: -0.4px;
                margin-bottom: 0.4rem;
            }

            .about-hero-sub {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.4);
            }

            /* ── SECTION CARD ── */
            .about-card {
                background: #fff;
                border: 1px solid #EDE9FE;
                border-radius: 12px;
                padding: 1.5rem 1.75rem;
                margin-bottom: 1.25rem;
            }

            .about-card-title {
                font-size: 0.9rem;
                font-weight: 600;
                color: #1C1033;
                letter-spacing: -0.1px;
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .about-card-title i {
                width: 28px;
                height: 28px;
                background: #F5F3FF;
                border-radius: 7px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                color: #7C3AED;
                font-size: 0.85rem;
                flex-shrink: 0;
            }

            .about-card p {
                font-size: 0.875rem;
                color: #6B7280;
                line-height: 1.75;
                margin-bottom: 0.75rem;
            }

            .about-card p:last-child {
                margin-bottom: 0;
            }

            /* ── CONTACT GRID ── */
            .contact-item {
                display: flex;
                align-items: flex-start;
                gap: 12px;
            }

            .contact-icon {
                width: 36px;
                height: 36px;
                border-radius: 9px;
                background: #F5F3FF;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.9rem;
                color: #7C3AED;
                flex-shrink: 0;
            }

            .contact-label {
                font-size: 0.8rem;
                font-weight: 600;
                color: #1C1033;
                margin-bottom: 2px;
            }

            .contact-value {
                font-size: 0.8rem;
                color: #6B7280;
                line-height: 1.5;
            }

            /* ── VISI MISI ── */
            .vm-card {
                background: #fff;
                border: 1px solid #EDE9FE;
                border-radius: 12px;
                padding: 1.4rem 1.5rem;
                height: 100%;
            }

            .vm-title {
                font-size: 0.845rem;
                font-weight: 600;
                color: #1C1033;
                margin-bottom: 0.75rem;
                display: flex;
                align-items: center;
                gap: 7px;
            }

            .vm-title i {
                width: 26px;
                height: 26px;
                background: #F5F3FF;
                border-radius: 6px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                color: #7C3AED;
                font-size: 0.8rem;
                flex-shrink: 0;
            }

            .vm-text {
                font-size: 0.845rem;
                color: #6B7280;
                line-height: 1.7;
                margin: 0;
            }

            .vm-list {
                font-size: 0.845rem;
                color: #6B7280;
                line-height: 1.9;
                padding-left: 1.1rem;
                margin: 0;
            }

            /* ── CTA BUTTONS ── */
            .btn-purple {
                background: #7C3AED;
                border: none;
                border-radius: 8px;
                padding: 0.6rem 1.4rem;
                font-size: 0.875rem;
                font-weight: 600;
                color: #fff;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 7px;
                transition: background 0.15s, transform 0.12s;
            }

            .btn-purple:hover {
                background: #5B21B6;
                color: #fff;
                transform: translateY(-1px);
            }

            .btn-outline-purple {
                background: transparent;
                border: 1px solid #C4B5FD;
                border-radius: 8px;
                padding: 0.6rem 1.4rem;
                font-size: 0.875rem;
                font-weight: 600;
                color: #7C3AED;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 7px;
                transition: background 0.15s, border-color 0.15s, transform 0.12s;
            }

            .btn-outline-purple:hover {
                background: #F5F3FF;
                border-color: #7C3AED;
                color: #7C3AED;
                transform: translateY(-1px);
            }

            .cta-wrap {
                display: flex;
                justify-content: center;
                gap: 10px;
                flex-wrap: wrap;
                margin-top: 0.5rem;
            }

            .divider-row {
                border: none;
                border-top: 1px solid #EDE9FE;
                margin: 0 0 1.25rem;
            }
        </style>
    @endpush

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- HERO --}}
            <div class="about-hero">
                <div class="dot-grid"></div>
                <div class="about-hero-content">
                    <div class="about-hero-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <div class="about-hero-title">GadgetHub</div>
                    <div class="about-hero-sub">Toko Aksesoris & Gadget Online Terpercaya</div>
                </div>
            </div>

            {{-- TENTANG KAMI --}}
            <div class="about-card">
                <div class="about-card-title">
                    <i class="bi bi-info-circle-fill"></i>
                    Tentang Kami
                </div>
                <p>
                    GadgetHub adalah platform belanja gadget dan aksesoris online yang hadir untuk memudahkan
                    masyarakat mendapatkan kebutuhan teknologi sehari-hari dengan mudah, cepat, dan terpercaya.
                    Kami menyediakan berbagai produk berkualitas dengan harga terjangkau langsung dari distributor resmi.
                </p>
                <p>
                    Didirikan dengan semangat melayani, GadgetHub berkomitmen memberikan pengalaman belanja yang
                    menyenangkan dengan layanan pengiriman yang cepat dan aman ke seluruh wilayah Indonesia.
                </p>
            </div>

            {{-- INFORMASI TOKO --}}
            <div class="about-card">
                <div class="about-card-title">
                    <i class="bi bi-geo-alt-fill"></i>
                    Informasi Toko
                </div>
                <hr class="divider-row">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <div class="contact-label">Alamat</div>
                                <div class="contact-value">Jl. Gadget Raya No. 1<br>Jakarta Selatan, 12345</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <div class="contact-label">Telepon</div>
                                <div class="contact-value">(021) 1234-5678<br>+62 812-3456-7890</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-clock-fill"></i></div>
                            <div>
                                <div class="contact-label">Jam Operasional</div>
                                <div class="contact-value">Senin – Sabtu<br>08.00 – 20.00 WIB</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-item">
                            <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div>
                                <div class="contact-label">Email</div>
                                <div class="contact-value">admin@gadgethub.id<br>cs@gadgethub.id</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- VISI MISI --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="vm-card">
                        <div class="vm-title">
                            <i class="bi bi-eye-fill"></i>
                            Visi
                        </div>
                        <p class="vm-text">
                            Menjadi platform belanja gadget dan aksesoris online terpercaya yang menjangkau
                            seluruh lapisan masyarakat Indonesia.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vm-card">
                        <div class="vm-title">
                            <i class="bi bi-bullseye"></i>
                            Misi
                        </div>
                        <ul class="vm-list">
                            <li>Produk gadget & aksesoris berkualitas</li>
                            <li>Harga transparan dan terjangkau</li>
                            <li>Pengiriman cepat dan aman</li>
                            <li>Layanan pelanggan yang responsif</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="cta-wrap">
                <a href="/contact" class="btn-purple">
                    <i class="bi bi-envelope"></i> Hubungi Kami
                </a>
                <a href="/produk" class="btn-outline-purple">
                    <i class="bi bi-grid"></i> Lihat Produk
                </a>
            </div>

        </div>
    </div>

@endsection
