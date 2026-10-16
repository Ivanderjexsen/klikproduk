@extends('layouts.app')

@section('title', 'Katalog Galeri Contoh Poster')

@section('content')
<div class="container py-5">

    {{-- Judul katalog --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">Katalog Galeri Contoh Poster</h1>
        <p class="text-muted">
            Temukan inspirasi desain poster untuk mempromosikan produkmu.
        </p>

        <a href="{{ route('poster.index') }}" class="btn btn-success mt-2">
            Buat Poster AI
        </a>
    </div>

    {{-- Galeri contoh poster --}}
    <div class="row g-4">

        {{-- Poster 1 --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="poster-preview poster-modern">
                    <span class="poster-label">NEW COLLECTION</span>
                    <div class="poster-art">🎒</div>
                    <h2>TAS KEREN</h2>
                    <p>Temani aktivitasmu setiap hari.</p>
                    <span class="poster-cta">PILIH FAVORITMU</span>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Poster Tas Modern</h5>
                    <p class="text-muted mb-0">
                        Desain modern untuk promosi tas dan aksesori.
                    </p>
                </div>
            </div>
        </div>

        {{-- Poster 2 --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="poster-preview poster-fresh">
                    <span class="poster-label">FRESH EVERY DAY</span>
                    <div class="poster-art">🥤</div>
                    <h2>SEGARIN HARIMU</h2>
                    <p>Kesegaran dalam setiap tegukan.</p>
                    <span class="poster-cta">COBA SEKARANG</span>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Poster Minuman Segar</h5>
                    <p class="text-muted mb-0">
                        Cocok untuk promosi minuman dan produk kuliner.
                    </p>
                </div>
            </div>
        </div>

        {{-- Poster 3 --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="poster-preview poster-elegant">
                    <span class="poster-label">SPECIAL EDITION</span>
                    <div class="poster-art">✨</div>
                    <h2>BEAUTY GLOW</h2>
                    <p>Rawat diri, pancarkan pesonamu.</p>
                    <span class="poster-cta">TEMUKAN GLOW-MU</span>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Poster Kecantikan</h5>
                    <p class="text-muted mb-0">
                        Tampilan elegan untuk kosmetik dan perawatan diri.
                    </p>
                </div>
            </div>
        </div>

        {{-- Poster 4 --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="poster-preview poster-food">
                    <span class="poster-label">SPECIAL MENU</span>
                    <div class="poster-art">🍔</div>
                    <h2>LEZAT TIAP GIGIT</h2>
                    <p>Rasa nikmat yang bikin kembali.</p>
                    <span class="poster-cta">PESAN SEKARANG</span>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Poster Makanan</h5>
                    <p class="text-muted mb-0">
                        Inspirasi promosi makanan dan usaha kuliner.
                    </p>
                </div>
            </div>
        </div>

        {{-- Poster 5 --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="poster-preview poster-tech">
                    <span class="poster-label">SMART TECHNOLOGY</span>
                    <div class="poster-art">🎧</div>
                    <h2>LEVEL UP</h2>
                    <p>Teknologi untuk gaya hidupmu.</p>
                    <span class="poster-cta">LIHAT PRODUK</span>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Poster Elektronik</h5>
                    <p class="text-muted mb-0">
                        Desain futuristik untuk aksesori dan perangkat elektronik.
                    </p>
                </div>
            </div>
        </div>

        {{-- Poster 6 --}}
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="poster-preview poster-nature">
                    <span class="poster-label">NATURAL CARE</span>
                    <div class="poster-art">🌿</div>
                    <h2>ALAMI & SEHAT</h2>
                    <p>Pilihan baik untuk keseharianmu.</p>
                    <span class="poster-cta">KENALI PRODUK</span>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Poster Produk Alami</h5>
                    <p class="text-muted mb-0">
                        Inspirasi desain untuk produk alami dan ramah lingkungan.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Ajakan membuat poster --}}
    <div class="text-center bg-light rounded-4 p-4 p-md-5 mt-5">
        <h3 class="fw-bold">Punya ide poster sendiri?</h3>
        <p class="text-muted">
            Buat desain promosi sesuai produk dan gaya pilihanmu.
        </p>
        <a href="{{ route('poster.index') }}" class="btn btn-success">
            Mulai Buat Poster
        </a>
    </div>

</div>

<style>
    .poster-preview {
        min-height: 340px;
        padding: 28px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        overflow: hidden;
    }

    .poster-label {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        margin-bottom: 22px;
    }

    .poster-art {
        font-size: 76px;
        margin-bottom: 15px;
        filter: drop-shadow(0 8px 8px rgba(0, 0, 0, .15));
    }

    .poster-preview h2 {
        font-size: 27px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    .poster-preview p {
        font-size: 14px;
        margin-bottom: 22px;
    }

    .poster-cta {
        display: inline-block;
        padding: 10px 16px;
        border: 1px solid rgba(255, 255, 255, .8);
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .poster-modern {
        background: linear-gradient(145deg, #12352a, #168653);
    }

    .poster-fresh {
        background: linear-gradient(145deg, #087f8c, #64d8c5);
    }

    .poster-elegant {
        background: linear-gradient(145deg, #42213d, #ba789f);
    }

    .poster-food {
        background: linear-gradient(145deg, #9e321f, #f39b38);
    }

    .poster-tech {
        background: linear-gradient(145deg, #111827, #3456a1);
    }

    .poster-nature {
        background: linear-gradient(145deg, #31572c, #90a955);
    }

    .card {
        transition: transform .2s, box-shadow .2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, .10) !important;
    }
</style>
@endsection
