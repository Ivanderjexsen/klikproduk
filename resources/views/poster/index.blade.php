@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-primary mb-3">KLIKPRODUK AI</span>
        <h1 class="fw-bold display-6">AI Pembuat Poster</h1>
        <p class="text-secondary">Buat konsep poster promosi produkmu.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('poster.generate') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="product_name" class="form-label fw-semibold">
                                Nama Produk
                            </label>
                            <input
                                type="text"
                                name="product_name"
                                id="product_name"
                                class="form-control form-control-lg"
                                placeholder="Contoh: Tas Laptop"
                                value="{{ old('product_name', $concept['product_name'] ?? '') }}"
                                maxlength="100"
                                required
                            >
                            @error('product_name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="poster_style" class="form-label fw-semibold">
                                Gaya Poster
                            </label>
                            <select name="poster_style" id="poster_style"
                                class="form-select form-select-lg" required>
                                @foreach ([
                                    'modern' => 'Modern dan Profesional',
                                    'minimalis' => 'Minimalis',
                                    'elegan' => 'Elegan dan Premium',
                                    'ceria' => 'Ceria dan Berwarna',
                                    'futuristik' => 'Futuristik'
                                ] as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('poster_style', 'modern') == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('poster_style')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="poster_prompt" class="form-label fw-semibold">
                                Deskripsi Produk dan Poster
                            </label>
                            <textarea
                                name="poster_prompt"
                                id="poster_prompt"
                                class="form-control"
                                rows="4"
                                maxlength="1000"
                                placeholder="Contoh: Tas laptop hitam, desain elegan, latar biru gelap."
                                required
                            >{{ old('poster_prompt', $concept['description'] ?? '') }}</textarea>
                            @error('poster_prompt')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Poster belum berhasil dibuat.</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            ✦ Buat Konsep Poster
                        </button>
                    </form>
                </div>
            </div>

            @isset($concept)
                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body p-4">
                        <span class="badge bg-success mb-3">Konsep Poster</span>
                        <h2 class="h4 fw-bold mb-4">Hasil dari AI</h2>

                        <p class="text-secondary small mb-1">Judul</p>
                        <h3 class="fw-bold">{{ $concept['headline'] ?? $concept['product_name'] }}</h3>

                        <p class="text-secondary small mb-1 mt-3">Tagline</p>
                        <p>{{ $concept['tagline'] ?? 'Temani aktivitasmu setiap hari.' }}</p>

                        <p class="text-secondary small mb-1">Ajakan membeli</p>
                        <p>{{ $concept['call_to_action'] ?? 'Pilih produk favoritmu.' }}</p>

                        <p class="text-secondary small mb-1">Ide visual</p>
                        <p class="mb-0">{{ $concept['visual_idea'] ?? 'Tampilan produk dengan desain modern dan profesional.' }}</p>
                    </div>
                </div>
            @endisset
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="h4 fw-bold mb-1">Pratinjau Poster</h2>
                    <p class="text-secondary small mb-0">Poster promosi produkmu.</p>
                </div>
                <button type="button" class="btn btn-outline-primary"
                    onclick="downloadPoster()">Unduh PNG</button>
            </div>

            <div id="poster-capture" class="poster-preview">
                <div class="poster-topline">
                    <span>KLIKPRODUK</span>
                    <span>POSTER PROMOSI</span>
                </div>

                <div class="poster-content">
                    <div class="poster-text">
                        <span class="poster-label">
                            {{ strtoupper($concept['style'] ?? 'MODERN DAN PROFESIONAL') }}
                        </span>

                        <h2 id="poster-title">
                            {{ strtoupper($concept['headline'] ?? $concept['product_name'] ?? 'NAMA PRODUK') }}
                        </h2>

                        <p id="poster-description">
                            {{ $concept['tagline'] ?? 'Tampilkan produk terbaikmu dengan desain yang menarik.' }}
                        </p>

                        <div class="poster-cta">
                            {{ strtoupper($concept['call_to_action'] ?? 'PILIH PRODUK FAVORITMU') }}
                        </div>
                    </div>

                    <div class="poster-art" aria-label="Ilustrasi tas dekoratif">
                        <div class="art-circle"></div>
                        <div class="art-card">
                            <div class="art-handle"></div>
                            <div class="art-front">
                                <div class="art-line"></div>
                                <div class="art-line short"></div>
                                <div class="art-mark">KP</div>
                            </div>
                            <div class="art-pocket"></div>
                        </div>
                        <span class="art-star star-one">✦</span>
                        <span class="art-star star-two">✧</span>
                    </div>
                </div>

                <div class="poster-footer">
                    <span>GAYA • KUALITAS • KENYAMANAN</span>
                    <span>KLIKPRODUK</span>
                </div>
            </div>

            <p class="text-secondary small mt-3">
                Pratinjau ini menggunakan ilustrasi HTML/CSS, bukan gambar AI.
            </p>
        </div>
    </div>
</div>

<style>
.poster-preview {
    overflow: hidden;
    padding: clamp(24px, 5vw, 52px);
    color: #fff;
    border-radius: 20px;
    background:
        radial-gradient(circle at 80% 40%, #1b6790 0, transparent 32%),
        linear-gradient(135deg, #071426, #123454 60%, #050c18);
    box-shadow: 0 20px 55px rgba(5,20,40,.18);
}
.poster-topline, .poster-footer {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    font-size: 10px;
    letter-spacing: 1.5px;
    font-weight: 800;
}
.poster-topline {
    padding-bottom: 20px;
    border-bottom: 1px solid #ffffff30;
}
.poster-content {
    display: grid;
    grid-template-columns: 1.15fr .85fr;
    align-items: center;
    gap: 20px;
    padding: 42px 0;
}
.poster-label {
    display: inline-block;
    padding: 7px 10px;
    margin-bottom: 18px;
    color: #06203a;
    background: #68d8ff;
    border-radius: 5px;
    font-size: 10px;
    font-weight: 900;
}
.poster-text h2 {
    font-size: clamp(28px, 5vw, 52px);
    font-weight: 900;
    line-height: 1.05;
    overflow-wrap: anywhere;
}
.poster-text p {
    color: #c5d5e6;
    line-height: 1.7;
    overflow-wrap: anywhere;
}
.poster-cta {
    display: inline-block;
    margin-top: 12px;
    padding: 13px 16px;
    border-radius: 5px;
    background: #68d8ff;
    color: #06203a;
    font-size: 10px;
    font-weight: 900;
    overflow-wrap: anywhere;
}
.poster-art {
    min-height: 230px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}
.art-circle {
    position: absolute;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2b9fd1, #123b70);
    box-shadow: 0 0 55px #41beff40;
}
.art-card {
    position: relative;
    z-index: 1;
    width: 125px;
    height: 155px;
    transform: rotate(7deg);
    border: 2px solid #8be1ff;
    border-radius: 16px 16px 22px 22px;
    background: linear-gradient(145deg, #344c65, #080f1c 75%);
    box-shadow: 15px 22px 35px #0006;
}
.art-handle {
    position: absolute;
    top: -20px;
    left: 38px;
    width: 45px;
    height: 24px;
    border: 5px solid #8be1ff;
    border-bottom: 0;
    border-radius: 10px 10px 0 0;
}
.art-front {
    height: 77px;
    margin: 25px 13px 0;
    padding: 12px 8px;
    border: 1px solid #8be1ff99;
    border-radius: 8px;
}
.art-line {
    height: 3px;
    width: 100%;
    margin-bottom: 8px;
    background: #8be1ff;
}
.art-line.short { width: 60%; }
.art-mark {
    margin-top: 8px;
    color: #8be1ff;
    text-align: center;
    font-weight: 900;
}
.art-pocket {
    position: absolute;
    bottom: 8px;
    left: 27px;
    width: 70px;
    height: 20px;
    border: 1px solid #8be1ff99;
    border-radius: 4px;
}
.art-star {
    position: absolute;
    color: #9ae7ff;
    font-size: 30px;
}
.star-one { top: 20px; right: 10px; }
.star-two { bottom: 22px; left: 12px; }
.poster-footer {
    padding-top: 18px;
    border-top: 1px solid #ffffff30;
    color: #b5d1e8;
}
@media (max-width: 600px) {
    .poster-content { grid-template-columns: 1fr; }
    .poster-art { min-height: 210px; }
    .poster-topline, .poster-footer { font-size: 8px; }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
async function downloadPoster() {
    const poster = document.getElementById('poster-capture');

    if (typeof html2canvas === 'undefined') {
        alert('Fitur unduh membutuhkan koneksi internet.');
        return;
    }

    try {
        const canvas = await html2canvas(poster, {
            scale: 2,
            backgroundColor: null
        });

        const link = document.createElement('a');
        const title = document.getElementById('poster-title').innerText
            .trim()
            .replace(/[^a-z0-9]+/gi, '-')
            .replace(/^-|-$/g, '');

        link.download = (title || 'poster') + '.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    } catch (error) {
        alert('Poster gagal diunduh. Muat ulang halaman dan coba lagi.');
    }
}
</script>
@endsection
