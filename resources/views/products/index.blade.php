
@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Pesan sukses setelah produk disimpan --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Tutup"></button>
        </div>
    @endif

    {{-- Judul halaman dan tombol tambah produk --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between align-items-md-center
                gap-3 mb-4">

        <div>
            <h1 class="fw-bold mb-2">Daftar Produk</h1>
            <p class="text-muted mb-0">
                Temukan produk yang kamu butuhkan.
            </p>
        </div>

        <a href="{{ route('products.create') }}"
           class="btn btn-primary">
            <span class="me-1">+</span> Tambah Produk
        </a>

    </div>

    {{-- Daftar produk dari database --}}
    <div class="row g-4">

        @forelse ($products as $product)

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">

                    {{-- Gambar produk --}}
                    @if ($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="card-img-top"
                            alt="{{ $product->name }}"
                            style="height: 220px; object-fit: cover;"
                        >
                    @else
                        <div class="bg-light d-flex
                                    align-items-center
                                    justify-content-center"
                             style="height: 220px;">
                            <span class="text-muted">
                                Belum ada gambar
                            </span>
                        </div>
                    @endif

                    {{-- Informasi produk --}}
                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title fw-bold">
                            {{ $product->name }}
                        </h5>

                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit(
                                $product->description ?? 'Belum ada deskripsi.',
                                100
                            ) }}
                        </p>

                        <div class="mt-auto">
                            <p class="fs-5 fw-bold text-primary mb-0">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                                
                            <div class="d-flex gap-2 mt-3">
                                <a href="{{ route('products.edit', $product) }}"
                                class="btn btn-outline-primary btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        @empty

            {{-- Tampilan jika belum ada produk --}}
            <div class="col-12">
                <div class="text-center bg-light rounded-4 p-5">

                    <div class="mb-3">
                        <span style="font-size: 48px;">📦</span>
                    </div>

                    <h4 class="fw-bold">Belum Ada Produk</h4>

                    <p class="text-muted">
                        Produk yang kamu tambahkan akan muncul di sini.
                    </p>

                    <a href="{{ route('products.create') }}"
                       class="btn btn-primary mt-2">
                        Tambahkan Produk Pertama
                    </a>

                </div>
            </div>

        @endforelse

    </div>
</div>
@endsection
    