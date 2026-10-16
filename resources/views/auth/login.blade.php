
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">

            <div class="text-center mb-4">
                <h1 class="fw-bold">Login Admin</h1>
                <p class="text-muted">
                    Masuk untuk mengelola produk KlikProduk.
                </p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <form action="{{ route('login.submit') }}"
                          method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email admin
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                autocomplete="username"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                autocomplete="current-password"
                                required
                            >
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('products.index') }}"
                           class="text-decoration-none">
                            Kembali ke daftar produk
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
