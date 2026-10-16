<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'KlikProduk')</title>

    {{-- Bootstrap lokal --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        :root {
            --kp-green: #168653;
            --kp-dark: #12352a;
            --kp-light: #f4faf6;
        }

        body {
            font-family: Arial, sans-serif;
            color: #26352d;
            background: #fff;
        }

        /* Logo */
        .navbar-brand {
            color: var(--kp-green);
            font-size: 1.5rem;
            font-weight: 800;
        }

        .navbar-brand:hover {
            color: var(--kp-dark);
        }

        /* Tombol utama */
        .btn-kp {
            background: var(--kp-green);
            color: #fff;
            border: 1px solid var(--kp-green);
            border-radius: 9px;
            padding: 10px 18px;
            font-weight: 600;
            transition: background .2s, transform .2s;
        }

        .btn-kp:hover {
            background: #106b41;
            border-color: #106b41;
            color: #fff;
            transform: translateY(-1px);
        }

        /* Tombol login */
        .btn-kp-login {
            color: var(--kp-green);
            background: #fff;
            border: 1px solid var(--kp-green);
            border-radius: 9px;
            padding: 9px 16px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: background .2s, color .2s;
        }

        .btn-kp-login:hover {
            background: var(--kp-green);
            color: #fff;
        }

        /* Navbar */
        .navbar {
            min-height: 76px;
        }

        .navbar .nav-link {
            color: #405148;
            font-weight: 500;
            transition: color .2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link:focus {
            color: var(--kp-green);
        }

        .navbar-toggler {
            border-color: #dce8df;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 .2rem rgba(22, 134, 83, .15);
        }

        /* Hero halaman utama */
        .hero {
            background: linear-gradient(135deg, #f2fbf5, #ffffff);
            padding: 90px 0;
        }

        .hero h1 {
            color: var(--kp-dark);
            font-size: clamp(2.3rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.15;
        }

        .text-kp {
            color: var(--kp-green);
        }

        /* Kartu fitur */
        .feature-card {
            height: 100%;
            padding: 28px;
            border: 1px solid #e8eee9;
            border-radius: 16px;
            transition: transform .2s, box-shadow .2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(20, 70, 40, .08);
        }

        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            margin-bottom: 18px;
            border-radius: 14px;
            background: #e5f6eb;
            font-size: 25px;
        }

        .section-space {
            padding: 75px 0;
        }

        /* Footer */
        .footer {
            background: #12352a;
            color: #dce9df;
            padding: 30px 0;
        }

        /* Tampilan layar kecil */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                padding-top: 16px;
            }

            .navbar-nav {
                align-items: stretch !important;
                gap: 4px !important;
            }

            .navbar-nav .nav-link {
                padding: 10px 0;
            }

            .navbar-actions {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                margin-top: 12px;
                padding-top: 16px;
                border-top: 1px solid #e8eee9;
            }

            .navbar-actions .btn-kp-login,
            .navbar-actions .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- Navbar KlikProduk --}}
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
        <div class="container">

            {{-- Logo --}}
            <a class="navbar-brand" href="{{ route('home') }}">
                KlikProduk<span class="text-dark">.</span>
            </a>

            {{-- Tombol menu untuk HP --}}
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarKlikProduk"
                    aria-controls="navbarKlikProduk"
                    aria-expanded="false"
                    aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarKlikProduk">

                {{-- Menu navigasi --}}
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                    {{-- Beranda --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    {{-- Buat Poster AI: hanya satu menu --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('poster.index') }}">
                            Buat Poster AI
                        </a>
                    </li>

                    {{-- Menu untuk pengunjung yang belum login --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#galeri">
                                Galeri Contoh Poster
                            </a>
                        </li>
                    @endguest

                    {{-- Menu khusus setelah login --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/produk') }}">
                                Katalog Galeri Contoh Poster
                            </a>
                        </li>
                    @endauth

                    {{-- Cara kerja --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#cara-kerja">
                            Cara Kerja
                        </a>
                    </li>

                </ul>

                {{-- Tombol di sisi kanan navbar --}}
                <div class="navbar-actions d-flex align-items-lg-center gap-2 ms-lg-4">

                    {{-- Login untuk pengunjung --}}
                    @guest
                        <a class="btn-kp-login" href="{{ route('login') }}">
                            Login
                        </a>
                    @endguest

                    {{-- Logout untuk pengguna yang sudah login --}}
                    @auth
                        <form action="{{ route('logout') }}"
                              method="POST"
                              class="m-0">
                            @csrf

                            <button type="submit"
                                    class="btn btn-outline-danger">
                                Logout
                            </button>
                        </form>
                    @endauth

                </div>
            </div>
        </div>
    </nav>

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container d-flex flex-column flex-md-row
                    justify-content-between gap-2">

            <div>
                <strong>KlikProduk</strong>
                <div class="small">
                    Dari Produk Menjadi Promosi, Lebih Mudah dengan AI.
                </div>
            </div>

            <div class="small align-self-md-center">
                &copy; {{ date('Y') }} KlikProduk.
                Dibuat untuk UMKM Indonesia.
            </div>

        </div>
    </footer>

    {{-- Bootstrap JavaScript lokal --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')

</body>
</html>