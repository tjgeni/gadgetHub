@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <h4 class="fw-bold mb-4" style="color:var(--text);">
        <i class="bi bi-speedometer2 me-2" style="color:var(--primary);"></i>Dashboard
    </h4>

    {{-- Stat Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100"
                style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-body text-center py-4">
                    <div class="rounded-3 d-inline-flex align-items-center justify-content-center mb-2"
                        style="width:48px;height:48px;background:rgba(124,58,237,0.12);">
                        <i class="bi bi-cpu" style="font-size:1.4rem;color:var(--primary);"></i>
                    </div>
                    <h3 class="fw-bold mt-1 mb-0" style="color:var(--text);">{{ $totalProduk }}</h3>
                    <small style="color:var(--text-muted);">Total Produk</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100"
                style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-body text-center py-4">
                    <div class="rounded-3 d-inline-flex align-items-center justify-content-center mb-2"
                        style="width:48px;height:48px;background:rgba(217,70,239,0.10);">
                        <i class="bi bi-tag" style="font-size:1.4rem;color:var(--magenta);"></i>
                    </div>
                    <h3 class="fw-bold mt-1 mb-0" style="color:var(--text);">{{ $totalKategori }}</h3>
                    <small style="color:var(--text-muted);">Total Kategori</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100"
                style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-body text-center py-4">
                    <div class="rounded-3 d-inline-flex align-items-center justify-content-center mb-2"
                        style="width:48px;height:48px;background:rgba(124,58,237,0.08);">
                        <i class="bi bi-people" style="font-size:1.4rem;color:var(--primary-light);"></i>
                    </div>
                    <h3 class="fw-bold mt-1 mb-0" style="color:var(--text);">{{ $totalUser }}</h3>
                    <small style="color:var(--text-muted);">Total User</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100"
                style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-body text-center py-4">
                    <div class="rounded-3 d-inline-flex align-items-center justify-content-center mb-2"
                        style="width:48px;height:48px;background:rgba(217,70,239,0.10);">
                        <i class="bi bi-bag-check" style="font-size:1.4rem;color:var(--magenta);"></i>
                    </div>
                    <h3 class="fw-bold mt-1 mb-0" style="color:var(--text);">{{ $totalPesanan }}</h3>
                    <small style="color:var(--text-muted);">Total Pesanan</small>
                </div>
            </div>
        </div>
    </div>

    {{-- Status Pesanan --}}
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm"
                style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-3 p-3" style="background:rgba(245,208,254,0.3);">
                        <i class="bi bi-hourglass-split fs-4" style="color:var(--magenta);"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-4" style="color:var(--text);">{{ $pesananPending }}</div>
                        <div class="small" style="color:var(--text-muted);">Pesanan Pending</div>
                    </div>
                    <a href="/admin/orders" class="btn btn-sm ms-auto"
                        style="border:1px solid var(--magenta);color:var(--magenta);border-radius:7px;">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm"
                style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-3 p-3" style="background:rgba(124,58,237,0.1);">
                        <i class="bi bi-check-circle fs-4" style="color:var(--primary);"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-4" style="color:var(--text);">{{ $pesananSelesai }}</div>
                        <div class="small" style="color:var(--text-muted);">Pesanan Selesai</div>
                    </div>
                    <a href="/admin/orders" class="btn btn-sm ms-auto"
                        style="border:1px solid var(--primary);color:var(--primary);border-radius:7px;">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Pesanan Terbaru --}}
    <div class="card border-0 shadow-sm" style="background:var(--surface);border:1px solid var(--border)!important;">
        <div class="card-header border-bottom py-3" style="background:var(--surface);border-color:var(--border)!important;">
            <h6 class="fw-bold mb-0" style="color:var(--text);">
                <i class="bi bi-clock-history me-2" style="color:var(--primary);"></i>Pesanan Terbaru
            </h6>
        </div>
        <div class="card-body p-0">
            @if ($pesananTerbaru->isEmpty())
                <div class="text-center py-4" style="color:var(--text-muted);">Belum ada pesanan.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background:var(--surface-2);">
                            <tr style="border-color:var(--border);">
                                <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">#</th>
                                <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">User</th>
                                <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Total</th>
                                <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Status</th>
                                <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesananTerbaru as $order)
                                <tr style="border-color:var(--border);">
                                    <td style="color:var(--text-subtle);font-size:.85rem;">{{ $order->id }}</td>
                                    <td class="fw-semibold" style="font-size:.875rem;color:var(--text);">
                                        {{ $order->user->name }}</td>
                                    <td style="font-size:.875rem;color:var(--text);">Rp
                                        {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                            $styles = match ($order->status) {
                                                'pending' => 'background:rgba(217,70,239,0.1);color:var(--magenta);',
                                                'diproses' => 'background:rgba(124,58,237,0.12);color:var(--primary);',
                                                'dikirim'
                                                    => 'background:rgba(167,139,250,0.15);color:var(--primary-light);',
                                                'selesai'
                                                    => 'background:rgba(124,58,237,0.08);color:var(--primary-dark);',
                                                default
                                                    => 'background:rgba(156,163,175,0.15);color:var(--text-muted);',
                                            };
                                        @endphp
                                        <span class="badge rounded-pill px-2 py-1"
                                            style="{{ $styles }}font-size:.75rem;">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td style="color:var(--text-muted);font-size:.85rem;">
                                        {{ $order->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="/admin/orders/{{ $order->id }}" class="btn btn-sm"
                                            style="border:1px solid var(--border);color:var(--text-muted);border-radius:7px;font-size:.8rem;">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
