<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan Laravel') }} - @yield('title', 'Beranda')</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Bootstrap CSS dari CDN untuk kemudahan --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Anda bisa menggantinya dengan Vite jika menggunakan asset bundling Laravel --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    {{-- CSS Kustom Tambahan --}}
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }
        .main-content {
            flex-grow: 1;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.9em;
            color: #6c757d;
        }
        .navbar-brand img {
            max-height: 40px; /* Sesuaikan tinggi logo jika ada */
        }
    </style>
    @stack('styles') {{-- Untuk menambahkan style spesifik per halaman --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- Tambahkan logo jika ada --}}
                    {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo Aplikasi"> --}}
                    {{ config('app.name', 'Perpustakaan Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Manajemen Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}" href="{{ route('members.index') }}">Manajemen Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('borrowings.*') ? 'active' : '' }}" href="{{ route('borrowings.index') }}">Manajemen Peminjaman</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    {{-- Tambahkan link profil atau pengaturan di sini --}}
                                    {{-- <a class="dropdown-item" href="#">Profil Saya</a> --}}
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 main-content">
            @yield('content') {{-- Konten dari view spesifik akan ditampilkan di sini --}}
        </main>

        <footer class="footer mt-auto">
            <div class="container">
                <span>&copy; {{ date('Y') }} {{ config('app.name', 'Perpustakaan Laravel') }}. Semua Hak Dilindungi.</span>
                {{-- Tambahkan link atau informasi lain di footer jika perlu --}}
                {{-- <p>Dibuat dengan <span style="color: #e25555;">&hearts;</span> oleh Tim Anda</p> --}}
            </div>
        </footer>
    </div>

    {{-- Bootstrap JS Bundle dari CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts') {{-- Untuk menambahkan script spesifik per halaman --}}
</body>
</html>
