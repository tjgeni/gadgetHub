@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-header py-3" style="background:var(--surface);border-bottom:1px solid var(--border);">
                    <h5 class="fw-bold mb-0" style="color:var(--text);">
                        <i class="bi bi-pencil-square me-2" style="color:var(--primary);"></i>Edit Produk
                    </h5>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.products.update', $product) }}"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row g-3">

                            <div class="col-md-8">
                                <label class="form-label fw-semibold" style="font-size:.85rem;color:var(--text);">
                                    Nama Produk <span style="color:var(--magenta);">*</span>
                                </label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $product->name) }}"
                                    style="border-color:var(--border);border-radius:8px;font-size:.875rem;">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold" style="font-size:.85rem;color:var(--text);">
                                    Kategori <span style="color:var(--magenta);">*</span>
                                </label>
                                <select name="category_id" class="form-select"
                                    style="border-color:var(--border);border-radius:8px;font-size:.875rem;">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:.85rem;color:var(--text);">Harga
                                    (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="border-color:var(--border);background:var(--surface-2);color:var(--text-muted);font-size:.875rem;">Rp</span>
                                    <input type="number" name="price" class="form-control"
                                        value="{{ old('price', $product->price) }}" min="0"
                                        style="border-color:var(--border);border-radius:0 8px 8px 0;font-size:.875rem;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold"
                                    style="font-size:.85rem;color:var(--text);">Stok</label>
                                <input type="number" name="stock" class="form-control"
                                    value="{{ old('stock', $product->stock) }}" min="0"
                                    style="border-color:var(--border);border-radius:8px;font-size:.875rem;">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold"
                                    style="font-size:.85rem;color:var(--text);">Deskripsi</label>
                                <textarea name="description" rows="3" class="form-control"
                                    style="border-color:var(--border);border-radius:8px;font-size:.875rem;">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold" style="font-size:.85rem;color:var(--text);">Foto
                                    Produk</label>
                                @if ($product->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="rounded-2"
                                            style="max-height:120px;border:1px solid var(--border);">
                                        <div class="form-text" style="color:var(--text-subtle);">Foto saat ini. Upload baru
                                            untuk mengganti.</div>
                                    </div>
                                @endif
                                <input type="file" name="image" id="imageInput" class="form-control" accept="image/*"
                                    style="border-color:var(--border);border-radius:8px;font-size:.875rem;">
                                <div class="mt-2">
                                    <img id="preview" src="" alt="Preview" class="rounded-2 d-none"
                                        style="max-height:120px;border:1px solid var(--border);">
                                </div>
                            </div>

                        </div>

                        <hr class="my-4" style="border-color:var(--border);">

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn fw-semibold px-4"
                                style="background:var(--primary);color:#fff;border-radius:8px;">
                                <i class="bi bi-check-lg me-1"></i>Update Produk
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn px-4"
                                style="border:1px solid var(--border);color:var(--text-muted);border-radius:8px;">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        });
    </script>
@endpush
