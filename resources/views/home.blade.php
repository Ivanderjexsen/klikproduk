@extends('layouts.app')

@section('title', 'KlikProduk - Promosi Digital UMKM')

@section('content')

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge rounded-pill text-bg-success mb-4 px-3 py-2">
                    Solusi Digital untuk UMKM
                </span>

                <h1>
                    Produk Hebat,<br>
                    Promosi Lebih <span class="text-kp">Mudah.</span>
                </h1>

                <p class="lead text-secondary my-4">
                    Kelola produk UMKM, buat konsep poster promosi berbantuan AI,
                    dan tampilkan produkmu dalam katalog digital di satu tempat.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="#fitur" class="btn btn-kp">
                        Mulai Jelajahi
                    </a>

                    <a href="#cara-kerja"
                       class="btn btn-outline-success rounded-3 px-4 py-3">
                        Pelajari Cara Kerja
                    </a>
                </div>

                <p class="small text-secondary mt-4 mb-0">
                    Dibuat untuk membantu UMKM Indonesia berkembang secara digital.
                </p>
            </div>

            <div class="col-lg-5">
                <div class="bg-white border rounded-4 shadow-sm p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <small class="text-secondary">Pratinjau promosi</small>
                            <h5 class="fw-bold mb-0">Produk Pilihanmu</h5>
                        </div>
                        <span class="badge text-bg-success">Contoh</span>
                    </div>

                    <div class="rounded-4 p-4 text-center"
                         style="background: linear-gradient(135deg, #dff5e5, #f6fff8);">
                        <div class="display-1 mb-3">🍪</div>
                        <span class="badge bg-success mb-3">Homemade</span>
                        <h3 class="fw-bold">Enak di Setiap Gigitan!</h3>
                        <p class="text-secondary mb-3">
                            Camilan lezat untuk menemani harimu.
                        </p>
                        <div class="d-inline-block bg-success text-white
                                    rounded-pill px-4 py-2 fw-semibold">
                            Pesan Sekarang
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2 mt-3">
                        <span class="text-success fs-4">✦</span>
                        <small class="text-secondary">
                            Contoh konsep poster yang nantinya bisa kamu sesuaikan.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space" id="fitur">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-kp fw-bold">FITUR UTAMA</span>
            <h2 class="fw-bold mt-2">Semua Kebutuhan Promosi dalam Satu Platform</h2>
            <p class="text-secondary">
                Mulai dari mengelola produk hingga menyiapkan materi promosi.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h5 class="fw-bold">Kelola Produk</h5>
                    <p class="text-secondary mb-0">
                        Simpan informasi produk, harga, deskripsi, dan foto
                        agar data usaha lebih terorganisasi.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">✨</div>
                    <h5 class="fw-bold">Konsep Poster AI</h5>
                    <p class="text-secondary mb-0">
                        Dapatkan ide headline, teks promosi, warna, dan
                        saran tata letak untuk materi pemasaran.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🏪</div>
                    <h5 class="fw-bold">Katalog Digital</h5>
                    <p class="text-secondary mb-0">
                        Tampilkan produk dalam katalog online yang mudah
                        dibagikan kepada calon pelanggan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space" id="cara-kerja"
         style="background: #f7faf8;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-kp fw-bold">CARA KERJA</span>
            <h2 class="fw-bold mt-2">Tiga Langkah Memulai</h2>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="feature-card bg-white">
                    <div class="feature-icon">01</div>
                    <h5 class="fw-bold">Masukkan Produk</h5>
                    <p class="text-secondary mb-0">
                        Isi nama produk, harga, deskripsi, dan foto.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card bg-white">
                    <div class="feature-icon">02</div>
                    <h5 class="fw-bold">Buat Konsep Promosi</h5>
                    <p class="text-secondary mb-0">
                        Siapkan konsep promosi dan sesuaikan dengan kebutuhan usaha.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card bg-white">
                    <div class="feature-icon">03</div>
                    <h5 class="fw-bold">Bagikan Produk</h5>
                    <p class="text-secondary mb-0">
                        Tampilkan produk melalui katalog digital dan bagikan kepada pelanggan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space">
    <div class="container">
        <div class="rounded-4 p-4 p-md-5 text-center text-white"
             style="background: #12352a;">
            <h2 class="fw-bold">Saatnya UMKM Tampil Lebih Digital</h2>
            <p class="mb-4">
                Kelola produk dan siapkan promosi dengan lebih terarah bersama KlikProduk.
            </p>
            <a href="#fitur" class="btn btn-light text-success fw-bold px-4 py-3">
                Kenali Fitur Kami
            </a>
        </div>
    </div>
</section>

@endsection