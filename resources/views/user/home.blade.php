@extends('layouts.app')
@section('title', 'Home')

@push('styles')
    <style>
        /* ── HERO ── */
        .hero {
            background: #0F0720;
            border-radius: 16px;
            padding: 3rem 2.5rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(124, 58, 237, 0.15);
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 85% 30%, rgba(124, 58, 237, 0.18) 0%, transparent 55%),
                radial-gradient(ellipse at 5% 90%, rgba(217, 70, 239, 0.1) 0%, transparent 45%);
            pointer-events: none;
        }

        .hero-dot {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 28px 28px;
            border-radius: 16px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(217, 70, 239, 0.1);
            border: 1px solid rgba(217, 70, 239, 0.25);
            color: #E879F9;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: clamp(1.7rem, 4vw, 2.5rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            letter-spacing: -0.5px;
            margin-bottom: 0.85rem;
        }

        .hero-title span {
            color: #A78BFA;
        }

        .hero-desc {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.45);
            max-width: 460px;
            line-height: 1.7;
            margin-bottom: 1.75rem;
        }

        .hero-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            background: #7C3AED;
            border: none;
            border-radius: 8px;
            padding: 0.65rem 1.4rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: background 0.15s, transform 0.12s;
        }

        .btn-hero-primary:hover {
            background: #5B21B6;
            transform: translateY(-1px);
            color: #fff;
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 0.65rem 1.4rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: background 0.15s, color 0.15s;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2.25rem;
            flex-wrap: wrap;
        }

        .hero-stat-val {
            font-size: 1.3rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.3px;
            line-height: 1;
        }

        .hero-stat-label {
            font-size: 0.72rem;
            color: rgba(255, 255, 255, 0.35);
            margin-top: 3px;
        }

        .hero-stat-sep {
            width: 1px;
            background: rgba(255, 255, 255, 0.07);
            align-self: stretch;
        }

        /* ── CATEGORIES ── */
        .section-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #1C1033;
            letter-spacing: -0.2px;
            margin-bottom: 0.9rem;
        }

        .chip-row {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 2.25rem;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            border: 1px solid #EDE9FE;
            border-radius: 20px;
            padding: 5px 14px;
            font-size: 0.8rem;
            font-weight: 500;
            color: #4B5563;
            text-decoration: none;
            transition: border-color 0.15s, color 0.15s, background 0.15s;
        }

        .chip:hover,
        .chip.active {
            border-color: #7C3AED;
            color: #7C3AED;
            background: #F5F3FF;
        }

        /* ── PROMO BANNER ── */
        .promo-banner {
            background: #0F0720;
            border: 1px solid rgba(124, 58, 237, 0.2);
            border-radius: 12px;
            padding: 1.5rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .promo-banner::before {
            content: '';
            position: absolute;
            right: -30px;
            top: -30px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(217, 70, 239, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .promo-eyebrow {
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #E879F9;
            margin-bottom: 3px;
            position: relative;
            z-index: 1;
        }

        .promo-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.2px;
            position: relative;
            z-index: 1;
        }

        .promo-desc {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.35);
            margin-top: 2px;
            position: relative;
            z-index: 1;
        }

        .btn-promo {
            background: #7C3AED;
            border: none;
            border-radius: 8px;
            padding: 0.55rem 1.2rem;
            font-size: 0.845rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            white-space: nowrap;
            position: relative;
            z-index: 1;
            transition: background 0.15s;
        }

        .btn-promo:hover {
            background: #5B21B6;
            color: #fff;
        }

        /* ── SECTION HEADER ── */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.1rem;
        }

        .section-link {
            font-size: 0.8rem;
            font-weight: 500;
            color: #7C3AED;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: color 0.15s;
        }

        .section-link:hover {
            color: #5B21B6;
        }

        /* ── PRODUCT CARDS ── */
        .product-card {
            background: #fff;
            border: 1px solid #EDE9FE;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.15s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(124, 58, 237, 0.1);
            border-color: #A78BFA;
        }

        .product-img-wrap {
            background: #F8F7FF;
            overflow: hidden;
        }

        .product-img-wrap img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .product-card:hover .product-img-wrap img {
            transform: scale(1.04);
        }

        .product-badge {
            position: absolute;
            top: 9px;
            left: 9px;
            font-size: 0.62rem;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 20px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            background: rgba(217, 70, 239, 0.12);
            color: #A21CAF;
            border: 1px solid rgba(217, 70, 239, 0.25);
        }

        .product-img-wrap {
            position: relative;
        }

        .product-body {
            padding: 0.85rem 1rem 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-category {
            font-size: 0.68rem;
            font-weight: 600;
            color: #9CA3AF;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 4px;
        }

        .product-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: #1C1033;
            line-height: 1.45;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 1rem;
            font-weight: 700;
            color: #1C1033;
            letter-spacing: -0.3px;
            margin-top: auto;
            margin-bottom: 0.7rem;
        }

        .product-price span {
            font-size: 0.68rem;
            font-weight: 400;
            color: #9CA3AF;
        }

        .btn-detail {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #F5F3FF;
            border: none;
            border-radius: 7px;
            padding: 0.5rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: #7C3AED;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }

        .btn-detail:hover {
            background: #7C3AED;
            color: #fff;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 3.5rem 2rem;
            background: #fff;
            border-radius: 12px;
            border: 1px dashed #C4B5FD;
        }

        .empty-icon {
            width: 56px;
            height: 56px;
            background: #F5F3FF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #A78BFA;
            margin: 0 auto 1rem;
        }

        .empty-state h6 {
            font-weight: 600;
            color: #1C1033;
            margin-bottom: 0.3rem;
        }

        .empty-state p {
            font-size: 0.845rem;
            color: #9CA3AF;
            margin: 0;
        }
    </style>
@endpush

@section('content')

    {{-- HERO --}}
    <div class="hero">
        <div class="hero-dot"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <i class="bi bi-stars"></i> New Arrivals — Mei 2025
            </div>
            <h1 class="hero-title">
                Gadget & Aksesoris<br><span>Terbaik Untukmu.</span>
            </h1>
            <p class="hero-desc">
                Temukan ribuan produk gadget original & aksesoris premium dengan harga terjangkau.
                Dikirim cepat ke seluruh Indonesia.
            </p>
            <div class="hero-actions">
                <a href="/produk" class="btn-hero-primary">
                    <i class="bi bi-grid-fill"></i> Jelajahi Produk
                </a>
                <a href="/produk?sort=terbaru" class="btn-hero-secondary">
                    <i class="bi bi-lightning-charge"></i> Produk Terbaru
                </a>
            </div>
            <div class="hero-stats">
                <div>
                    <div class="hero-stat-val">10K+</div>
                    <div class="hero-stat-label">Produk tersedia</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div>
                    <div class="hero-stat-val">50K+</div>
                    <div class="hero-stat-label">Pelanggan aktif</div>
                </div>
                <div class="hero-stat-sep"></div>
                <div>
                    <div class="hero-stat-val">4.9★</div>
                    <div class="hero-stat-label">Rating toko</div>
                </div>
            </div>
        </div>
    </div>

    {{-- CATEGORIES --}}
    <div class="chip-row">
        <a href="/produk" class="chip active"><i class="bi bi-grid"></i> Semua</a>
        <a href="/produk?kategori=smartphone" class="chip"><i class="bi bi-phone"></i> Smartphone</a>
        <a href="/produk?kategori=audio" class="chip"><i class="bi bi-headphones"></i> Audio</a>
        <a href="/produk?kategori=wearable" class="chip"><i class="bi bi-smartwatch"></i> Wearable</a>
        <a href="/produk?kategori=aksesoris" class="chip"><i class="bi bi-plug"></i> Aksesoris</a>
        <a href="/produk?kategori=laptop" class="chip"><i class="bi bi-laptop"></i> Laptop</a>
        <a href="/produk?kategori=gaming" class="chip"><i class="bi bi-controller"></i> Gaming</a>
    </div>

    {{-- PROMO BANNER --}}
    <div class="promo-banner">
        <div>
            <div class="promo-eyebrow">Promo terbatas</div>
            <div class="promo-title">Diskon hingga 40% untuk aksesoris pilihan</div>
            <div class="promo-desc">Berlaku s/d akhir bulan ini — jangan sampai kehabisan!</div>
        </div>
        <a href="/produk?promo=1" class="btn-promo">
            <i class="bi bi-tag-fill me-1"></i> Lihat Promo
        </a>
    </div>

    {{-- PRODUK TERBARU --}}
    <div class="section-header">
        <div class="section-title">Produk Terbaru</div>
        <a href="/produk" class="section-link">
            Lihat semua <i class="bi bi-arrow-right"></i>
        </a>
    </div>

    @if ($products->isEmpty())
        <div class="empty-state">
            <div class="empty-icon"><i class="bi bi-box-seam"></i></div>
            <h6>Belum ada produk</h6>
            <p>Produk akan segera ditambahkan. Pantau terus!</p>
        </div>
    @else
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach ($products as $index => $product)
                <div class="col">
                    <div class="product-card">
                        <div class="product-img-wrap">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x160/F5F3FF/A78BFA?text=No+Image' }}"
                                alt="{{ $product->name }}"
                                onerror="this.src='https://placehold.co/300x160/F5F3FF/A78BFA?text=No+Image'">
                            @if ($index < 4)
                                <span class="product-badge">New</span>
                            @endif
                        </div>
                        <div class="product-body">
                            <div class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</div>
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                <span>/ pcs</span>
                            </div>
                            <a href="/produk/{{ $product->id }}" class="btn-detail">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
