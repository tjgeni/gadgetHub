@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm" style="background:var(--surface);border:1px solid var(--border)!important;">
                <div class="card-header py-3" style="background:var(--surface);border-bottom:1px solid var(--border);">
                    <h5 class="fw-bold mb-0" style="color:var(--text);">
                        <i class="bi bi-plus-circle me-2" style="color:var(--primary);"></i>Tambah Kategori
                    </h5>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:.85rem;color:var(--text);">
                                Nama Kategori <span style="color:var(--magenta);">*</span>
                            </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Misal: Smartphone, Laptop, Aksesoris"
                                style="border-color:var(--border);border-radius:8px;font-size:.875rem;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn fw-semibold px-4"
                                style="background:var(--primary);color:#fff;border-radius:8px;">
                                <i class="bi bi-check-lg me-1"></i>Simpan
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn px-4"
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
