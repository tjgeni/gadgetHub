@extends('layouts.admin')
@section('title', 'Kategori')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="color:var(--text);">
            <i class="bi bi-tag me-2" style="color:var(--primary);"></i>Kategori Produk
        </h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm fw-semibold d-flex align-items-center gap-1"
            style="background:var(--primary);color:#fff;border-radius:8px;padding:.45rem .9rem;">
            <i class="bi bi-plus-lg"></i> Tambah Kategori
        </a>
    </div>

    <div class="card border-0 shadow-sm" style="background:var(--surface);border:1px solid var(--border)!important;">
        <div class="card-body p-0">
            @if ($categories->isEmpty())
                <div class="text-center py-5" style="color:var(--text-muted);">
                    <i class="bi bi-tag fs-1" style="color:var(--border);"></i>
                    <p class="mt-2 mb-0">Belum ada kategori</p>
                </div>
            @else
                <div class="card border-0 overflow-hidden rounded-3"
                    style="background:var(--surface); border:1px solid var(--border)!important;">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead style="background:var(--surface-2);">
                                <tr style="border-color:var(--border);">
                                    <th width="60" style="color:var(--text-muted);font-size:.78rem;font-weight:600;">#
                                    </th>
                                    <th style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Nama Kategori</th>
                                    <th class="text-center"
                                        style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Jumlah Produk</th>
                                    <th class="text-center"
                                        style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Dibuat</th>
                                    <th class="text-center" width="180"
                                        style="color:var(--text-muted);font-size:.78rem;font-weight:600;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $i => $cat)
                                    <tr style="border-color:var(--border);">
                                        <td style="color:var(--text-subtle);font-size:.85rem;">
                                            {{ $categories->firstItem() + $loop->index }}</td>
                                        <td class="fw-semibold" style="font-size:.875rem;color:var(--text);">
                                            {{ $cat->name }}</td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill px-2 py-1"
                                                style="background:rgba(124,58,237,0.1);color:var(--primary);font-size:.75rem;">
                                                {{ $cat->products_count }} produk
                                            </span>
                                        </td>
                                        <td class="text-center" style="color:var(--text-muted);font-size:.83rem;">
                                            {{ $cat->created_at->format('d M Y') }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-sm me-1"
                                                style="border:1px solid var(--primary);color:var(--primary);border-radius:7px;font-size:.8rem;">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST"
                                                id="delete-form-{{ $cat->id }}" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm" data-bs-toggle="modal" type="button"
                                                    data-bs-target="#deleteModal{{ $cat->id }}"
                                                    style="border:1px solid #EF4444;color:#EF4444;border-radius:7px;font-size:.8rem;">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>

                                            <div class="modal fade" id="deleteModal{{ $cat->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin hapus kategori <strong>{{ $cat->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" form="delete-form-{{ $cat->id }}"
                                                                class="btn btn-danger">Ya, Hapus</button>
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
                <div style="padding: 20px;">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
