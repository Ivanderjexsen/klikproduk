
@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Header --}}
    <div class="text-center mb-5">
        <span class="badge bg-primary mb-3">KLIKPRODUK AI</span>

        <h1 class="fw-bold display-6">AI Pembuat Poster</h1>

        <p class="text-secondary">
            Buat konsep poster promosi produk dengan mudah.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Form Poster --}}
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('poster.generate') }}"
                          method="POST">
                        @csrf

                        {{-- Nama Produk --}}
                        <div class="mb-4">
                            <label for="product_name"
                                   class="form-label fw-semibold">
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                name="product_name"
                                id="product_name"
                                class="form-control"
                                placeholder="Contoh: Tas Laptop"
                                value="{{ old('product_name') }}"
                                maxlength="100"
                                required
                            >

                            @error('product_name')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Gaya Poster --}}
                        <div class="mb-4">
                            <label for="poster_style"
                                   class="form-label fw-semibold">
                                Gaya Poster
                            </label>

                            <select
                                name="poster_style"
                                id="poster_style"
                                class="form-select"
                                required
                            >
                                <option value="modern"
                                    {{ old('poster_style', 'modern') == 'modern' ? 'selected' : '' }}>
                                    Modern dan Profesional
                                </option>

                                <option value="minimalis"
                                    {{ old('poster_style') == 'minimalis' ? 'selected' : '' }}>
                                    Minimalis
                                </option>

                                <option value="elegan"
                                    {{ old('poster_style') == 'elegan' ? 'selected' : '' }}>
                                    Elegan dan Premium
                                </option>

                                <option value="ceria"
                                    {{ old('poster_style') == 'ceria' ? 'selected' : '' }}>
                                    Ceria dan Berwarna
                                </option>

                                <option value="futuristik"
                                    {{ old('poster_style') == 'futuristik' ? 'selected' : '' }}>
                                    Futuristik
                                </option>
                            </select>

                            @error('poster_style')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Deskripsi Poster --}}
                        <div class="mb-4">
                            <label for="poster_prompt"
                                   class="form-label fw-semibold">
                                Deskripsi Poster
                            </label>

                            <textarea
                                name="poster_prompt"
                                id="poster_prompt"
                                class="form-control"
                                rows="5"
                                maxlength="1000"
                                placeholder="Contoh: Buat poster promosi tas laptop dengan warna hitam dan biru, tampilan profesional, latar futuristik, serta ruang untuk informasi harga dan diskon."
                                required
                            >{{ old('poster_prompt') }}</textarea>

                            <div class="form-text">
                                Jelaskan warna, suasana, dan konsep
                                visual yang kamu inginkan.
                            </div>

                            @error('poster_prompt')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <button type="submit"
                                class="btn btn-primary btn-lg w-100">
                            Buat Konsep Poster
                        </button>

                        <p class="text-secondary small text-center mt-3 mb-0">
                            Tahap awal: konsep dibuat berdasarkan
                            aturan sederhana, tanpa API berbayar.
                        </p>
                    </form>

                </div>
            </div>

            {{-- Hasil Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <strong>Periksa kembali isianmu.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Hasil Konsep Poster --}}
            @if (isset($concept))
                <div class="card shadow-sm border-0 rounded-4 mt-4">
                    <div class="card-body p-4">

                        <span class="badge bg-success mb-3">
                            Konsep Berhasil Dibuat
                        </span>

                        <h2 class="h4 fw-bold mb-4">
                            Hasil Konsep Poster
                        </h2>

                        <div class="mb-3">
                            <div class="text-secondary small">
                                Nama Produk
                            </div>
                            <div class="fw-semibold">
                                {{ $concept['product_name'] }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="text-secondary small">
                                Gaya Poster
                            </div>
                            <div class="fw-semibold">
                                {{ $concept['style'] }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="text-secondary small">
                                Ide Judul
                            </div>
                            <div class="fw-semibold fs-5">
                                {{ $concept['headline'] }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="text-secondary small">
                                Deskripsi
                            </div>
                            <p class="mb-0">
                                {{ $concept['description'] }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <div class="text-secondary small">
                                Arah Desain
                            </div>
                            <p class="mb-0">
                                {{ $concept['visual_idea'] }}
                            </p>
                        </div>

                        <div class="alert alert-info mb-0 mt-4">
                            <strong>Catatan:</strong>
                            Ini masih konsep berbasis aturan,
                            belum berupa gambar yang dihasilkan AI.
                        </div>

                    </div>
                </div>
            @endif

        </div>
    </div>
</div>


{{-- Pratinjau Poster Otomatis --}}
<div class="card border-0 shadow-sm rounded-4 mt-5">
    <div class="card-body p-4">
        <h2 class="h4 fw-bold mb-3">
            Pratinjau Poster
        </h2>

        <p class="text-secondary small">
            Contoh desain poster promosi produk.
        </p>

        <div class="poster-preview p-4 p-md-5 rounded-4 text-white">
            <div class="small fw-bold mb-4">
                KLIKPRODUK
                <span class="float-end">NEW COLLECTION</span>
            </div>

            <div class="row align-items-center">
                <div class="col-md-7">
                    <span class="badge bg-info text-dark mb-3">
                        PILIHAN TERBAIK
                    </span>

                    <h2 class="display-6 fw-bold">
                        TAS LAPTOP
                        <span class="text-info">PREMIUM</span>
                    </h2>

                    <p class="text-white-50">
                        Tampil praktis, modern, dan profesional
                        untuk menemani aktivitasmu.
                    </p>

                    <div class="fw-bold mt-4">
                        TEMUKAN FAVORITMU
                    </div>
                </div>

                <div class="col-md-5 text-center mt-4 mt-md-0">
                    <div class="poster-product">
                        <span>💼</span>
                    </div>
                </div>
            </div>

            <hr class="border-info mt-4">

            <div class="small d-flex justify-content-between">
                <span>STYLE YOUR EVERYDAY</span>
                <span>KLIKPRODUK</span>
            </div>
        </div>
    </div>
</div>

<style>
    .poster-preview {
        background:
            radial-gradient(circle at 85% 45%, #155e9b 0, transparent 35%),
            linear-gradient(135deg, #071426, #102b49 65%, #06101f);
        overflow: hidden;
        min-height: 340px;
    }

    .poster-preview h2 {
        letter-spacing: -1px;
    }

    .poster-product {
        width: 150px;
        height: 180px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(145deg, #263d56, #080e18);
        border: 2px solid #54c8ff;
        border-radius: 24px;
        box-shadow: 0 15px 40px #0008;
        transform: rotate(5deg);
    }

    .poster-product span {
        font-size: 76px;
    }

    @media (max-width: 576px) {
        .poster-preview {
            padding: 24px !important;
        }

        .poster-preview h2 {
            font-size: 2rem;
        }
    }
</style>

@endsection
