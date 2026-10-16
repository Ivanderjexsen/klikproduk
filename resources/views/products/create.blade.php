@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 800px;">
    <div class="mb-4">
        <a href="{{ route('products.index') }}"
           class="text-decoration-none">
            &larr; Kembali ke daftar produk
        </a>

        <h1 class="fw-bold mt-3">Tambah Produk</h1>
        <p class="text-muted">
            Masukkan informasi produk yang ingin ditampilkan.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data kamu:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Nama produk
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        Deskripsi
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                        rows="4"
                    >{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">
                        Harga (Rp)
                    </label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="form-control"
                        min="0"
                        step="0.01"
                        value="{{ old('price') }}"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">
                        Gambar produk (opsional)
                    </label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >
                    <div class="form-text">
                        Format JPG, PNG, atau WebP. Maksimal 2 MB.
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan Produk
                    </button>
                    <a href="{{ route('products.index') }}"
                       class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
