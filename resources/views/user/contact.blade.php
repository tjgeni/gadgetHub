@extends('layouts.app')
@section('title', 'Contact')
@section('content')

    @push('styles')
        <style>
            /* ── CONTACT CARD ── */
            .contact-card {
                background: #fff;
                border: 1px solid #EDE9FE;
                border-radius: 12px;
                padding: 1.75rem;
                margin-bottom: 1rem;
            }

            .contact-heading {
                font-size: 1.1rem;
                font-weight: 700;
                color: #1C1033;
                letter-spacing: -0.3px;
                margin-bottom: 0.3rem;
            }

            .contact-sub {
                font-size: 0.875rem;
                color: #6B7280;
                margin-bottom: 1.5rem;
            }

            /* ── FORM ── */
            .form-label-custom {
                font-size: 0.8rem;
                font-weight: 600;
                color: #374151;
                margin-bottom: 0.4rem;
                display: block;
            }

            .form-label-custom .req {
                color: #D946EF;
                margin-left: 2px;
            }

            .form-control-custom {
                width: 100%;
                background: #F8F7FF;
                border: 1px solid #EDE9FE;
                border-radius: 8px;
                padding: 0.65rem 0.9rem;
                font-size: 0.875rem;
                font-family: 'Inter', sans-serif;
                color: #1C1033;
                transition: border-color 0.15s, box-shadow 0.15s;
                outline: none;
            }

            .form-control-custom::placeholder {
                color: #9CA3AF;
            }

            .form-control-custom:focus {
                border-color: #A78BFA;
                box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
                background: #fff;
            }

            .form-control-custom:disabled {
                background: #F3F4F6;
                color: #9CA3AF;
                cursor: not-allowed;
            }

            .form-control-custom.is-invalid {
                border-color: #EF4444;
            }

            .invalid-msg {
                font-size: 0.78rem;
                color: #EF4444;
                margin-top: 4px;
            }

            .form-hint {
                font-size: 0.75rem;
                color: #9CA3AF;
                margin-top: 4px;
            }

            /* ── ALERTS ── */
            .alert-success-ui {
                background: #F0FDF4;
                border: 1px solid #BBF7D0;
                border-left: 3px solid #22C55E;
                color: #15803D;
                border-radius: 8px;
                font-size: 0.875rem;
                padding: 0.7rem 0.9rem;
                margin-bottom: 1.25rem;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .alert-danger-ui {
                background: #FEF2F2;
                border: 1px solid #FECACA;
                border-left: 3px solid #EF4444;
                color: #B91C1C;
                border-radius: 8px;
                font-size: 0.875rem;
                padding: 0.7rem 0.9rem;
                margin-bottom: 1.25rem;
            }

            .alert-danger-ui ul {
                margin: 0.25rem 0 0;
                padding-left: 1.1rem;
            }

            .alert-danger-ui li {
                margin-bottom: 2px;
            }

            /* ── BUTTONS ── */
            .btn-purple {
                background: #7C3AED;
                border: none;
                border-radius: 8px;
                padding: 0.6rem 1.4rem;
                font-size: 0.875rem;
                font-weight: 600;
                font-family: 'Inter', sans-serif;
                color: #fff;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 7px;
                transition: background 0.15s, transform 0.12s;
                text-decoration: none;
            }

            .btn-purple:hover {
                background: #5B21B6;
                color: #fff;
                transform: translateY(-1px);
            }

            .btn-purple:active {
                transform: translateY(0);
            }

            .btn-ghost {
                background: transparent;
                border: 1px solid #EDE9FE;
                border-radius: 8px;
                padding: 0.6rem 1.4rem;
                font-size: 0.875rem;
                font-weight: 500;
                font-family: 'Inter', sans-serif;
                color: #6B7280;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 7px;
                text-decoration: none;
                transition: background 0.15s, color 0.15s;
            }

            .btn-ghost:hover {
                background: #F8F7FF;
                color: #7C3AED;
                border-color: #C4B5FD;
            }

            .form-actions {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            }

            /* ── INFO BAR ── */
            .info-bar {
                background: #fff;
                border: 1px solid #EDE9FE;
                border-radius: 12px;
                padding: 1rem 1.5rem;
            }

            .info-bar-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 4px;
                text-align: center;
            }

            .info-bar-icon {
                width: 32px;
                height: 32px;
                border-radius: 8px;
                background: #F5F3FF;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.85rem;
                color: #7C3AED;
            }

            .info-bar-val {
                font-size: 0.78rem;
                color: #6B7280;
                line-height: 1.4;
            }

            .info-bar-sep {
                width: 1px;
                background: #EDE9FE;
                align-self: stretch;
            }

            .divider-row {
                border: none;
                border-top: 1px solid #EDE9FE;
                margin: 1.25rem 0;
            }
        </style>
    @endpush

    <div class="row justify-content-center">
        <div class="col-lg-7">

            {{-- FORM CARD --}}
            <div class="contact-card">
                <div class="contact-heading">Hubungi Admin</div>
                <div class="contact-sub">Punya pertanyaan atau keluhan? Kirim pesan ke tim GadgetHub.</div>

                @if ($errors->any())
                    <div class="alert-danger-ui">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/contact">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label-custom">Nama</label>
                        <input type="text" class="form-control-custom" value="{{ Auth::user()->name }}" disabled>
                        <div class="form-hint">Pesan dikirim atas nama akun kamu.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-custom">
                            Subjek <span class="req">*</span>
                        </label>
                        <input type="text" name="subject"
                            class="form-control-custom @error('subject') is-invalid @enderror" value="{{ old('subject') }}"
                            placeholder="Misal: Pertanyaan tentang pesanan saya">
                        @error('subject')
                            <div class="invalid-msg">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label-custom">
                            Pesan <span class="req">*</span>
                        </label>
                        <textarea name="body" rows="5" class="form-control-custom @error('body') is-invalid @enderror"
                            placeholder="Tulis pesanmu di sini...">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="invalid-msg">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-purple">
                            <i class="bi bi-send-fill"></i> Kirim Pesan
                        </button>
                        <a href="/home" class="btn-ghost">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

            {{-- INFO BAR --}}
            <div class="info-bar">
                <div class="d-flex align-items-center justify-content-around gap-2">
                    <div class="info-bar-item">
                        <div class="info-bar-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div class="info-bar-val">(021) 1234-5678</div>
                    </div>
                    <div class="info-bar-sep"></div>
                    <div class="info-bar-item">
                        <div class="info-bar-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div class="info-bar-val">admin@gadgethub.id</div>
                    </div>
                    <div class="info-bar-sep"></div>
                    <div class="info-bar-item">
                        <div class="info-bar-icon"><i class="bi bi-clock-fill"></i></div>
                        <div class="info-bar-val">08.00 – 20.00 WIB</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
