@extends('layouts.admin')
@section('title', 'Produk')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="color:var(--text);">
            <i class="bi bi-cpu me-2" style="color:var(--primary);"></i> Produk
        </h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-sm fw-semibold d-flex align-items-center gap-1"
            style="background:var(--primary);color:#fff;border-radius:8px;padding:.45rem .9rem;">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </a>
    </div>

    <div class="card border-0 shadow-sm" style="background:var(--surface);border:1px solid var(--border)!important;">
        <div class="card-body p-0">
            @if ($products->isEmpty())
                <div class="text-center py-5" style="color:var(--text-muted);">
                    <i class="bi bi-cpu fs-1" style="color:var(--border);"></i>
                    <p class="mt-2 mb-0">Belum ada produk.</p>
                </div>
            @else
                <div class="card border-0 overflow-hidden rounded-3"
                    style="background:var(--surface); border:1px solid var(--border)!important;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background:var(--surface-2);">
                                    <tr style="border-color:var(--border);">
                                        <th width="50"
                                            style="color:var(--text-muted);font-size:.78rem;font-weight:600;">#</th>
                                        <th width="80"
                                            style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Foto
                                        </th>
                                        <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Nama Produk
                                        </th>
                                        <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Kategori</th>
                                        <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Harga</th>
                                        <th class="text-center"
                                            style="color:var(--text-muted);font-size:.78rem;font-weight:600;">
                                            Stok</th>
                                        <th class="text-center" width="180"
                                            style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $i => $product)
                                        <tr style="border-color:var(--border);">
                                            <td style="color:var(--text-subtle);font-size:.85rem;">
                                                {{ ($products->currentPage() - 1) * $products->perPage() + $i + 1 }}
                                            </td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" class="rounded-2"
                                                        width="50" height="50"
                                                        style="object-fit:cover;border:1px solid var(--border);"
                                                        onerror="this.src='https://via.placeholder.com/50?text=?'">
                                                @else
                                                    <div class="rounded-2 d-flex align-items-center justify-content-center"
                                                        style="width:50px;height:50px;background:var(--surface-2);border:1px solid var(--border);">
                                                        <i class="bi bi-image" style="color:var(--text-subtle);"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="fw-semibold" style="font-size:.875rem;color:var(--text);">
                                                    {{ $product->name }}</div>
                                                <small
                                                    style="color:var(--text-muted);">{{ Str::limit($product->description, 40) }}</small>
                                            </td>
                                            <td>
                                                <span class="badge rounded-pill px-2 py-1"
                                                    style="background:rgba(124,58,237,0.1);color:var(--primary);font-size:.75rem;font-weight:500;">
                                                    {{ $product->category->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="fw-semibold" style="font-size:.875rem;color:var(--text);">
                                                Rp{{ number_format($product->price, 0, ',', '.') }}
                                            </td>
                                            <td class="text-center">
                                                @if ($product->stock <= 0)
                                                    <span class="badge rounded-pill px-2"
                                                        style="background:rgba(239,68,68,0.1);color:#DC2626;font-size:.75rem;">Habis</span>
                                                @elseif($product->stock <= 10)
                                                    <span class="badge rounded-pill px-2"
                                                        style="background:rgba(217,70,239,0.1);color:var(--magenta);font-size:.75rem;">{{ $product->stock }}</span>
                                                @else
                                                    <span class="badge rounded-pill px-2"
                                                        style="background:rgba(124,58,237,0.1);color:var(--primary);font-size:.75rem;">{{ $product->stock }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.products.edit', $product) }}"
                                                    class="btn btn-sm me-1"
                                                    style="border:1px solid var(--primary);color:var(--primary);border-radius:7px;font-size:.8rem;">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}"
                                                    method="POST" class="d-inline" id="delete-form-{{ $product->id }}">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm" data-bs-toggle="modal" type="button"
                                                        data-bs-target="#deleteModal{{ $product->id }}"
                                                        style="border:1px solid #EF4444;color:#EF4444;border-radius:7px;font-size:.8rem;">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                                    aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Hapus</h5>

                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Yakin hapus produk
                                                                <strong>{{ $product->name }}</strong>?
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Batal
                                                                </button>

                                                                <button type="submit"
                                                                    form="delete-form-{{ $product->id }}"
                                                                    class="btn btn-danger">
                                                                    Ya, Hapus
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="p-3" style="border-top:1px solid var(--border);">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
