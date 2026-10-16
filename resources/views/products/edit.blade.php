@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 800px;">

    <a href="{{ route('products.index') }}"
       class="text-decoration-none">
        &larr; Kembali ke daftar produk
    </a>

    <h1 class="fw-bold mt-3">Edit Produk</h1>
    <p class="text-muted">Perbarui informasi produk kamu.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body p-4">

            <form action="{{ route('products.update', $product) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama produk</label>
                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $product->name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description"
                              name="description"
                              class="form-control"
                              rows="4">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number"
                           id="price"
                           name="price"
                           class="form-control"
                           min="0"
                           step="0.01"
                           value="{{ old('price', $product->price) }}"
                           required>
                </div>

                @if ($product->image)
                    <div class="mb-3">
                        <label class="form-label">Gambar saat ini</label>
                        <div>
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="img-thumbnail"
                                 style="max-width: 220px;">
                        </div>
                    </div>
                @endif

                <div class="mb-4">
                    <label for="image" class="form-label">
                        Ganti gambar (opsional)
                    </label>
                    <input type="file"
                           id="image"
                           name="image"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">
                    <div class="form-text">Maksimal 2 MB.</div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('products.index') }}"
                   class="btn btn-outline-secondary">
                    Batal
                </a>

            </form>
        </div>
    </div>
</div>
@endsection
