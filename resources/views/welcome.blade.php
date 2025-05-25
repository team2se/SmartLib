<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Selamat Datang di SmartLib</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    {{-- Scripts and Styles (Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Opsi: Tambahkan sedikit custom CSS jika diperlukan,
           misalnya untuk efek hover atau transisi yang lebih spesifik */
        .hero-bg {
            /* Ganti dengan URL gambar latar yang menarik bertema perpustakaan/buku jika Anda punya */
            /* background-image: url('path/to/your/library-background.jpg'); */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="antialiased font-sans">
    <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col items-center justify-center hero-bg selection:bg-blue-500 selection:text-white">

        {{-- Konten Utama Halaman Welcome --}}
        <main class="text-center z-0">
            <div class="mb-8">
                {{-- Ganti dengan SVG Logo SmartLib atau teks yang lebih menarik --}}
                {{-- Contoh Logo Teks Sederhana --}}
                <h1 class="text-6xl md:text-7xl font-bold text-gray-800 dark:text-white">
                    <span class="text-blue-600 dark:text-blue-400">Smart</span>Lib
                </h1>
                {{-- Alternatif dengan ikon buku (membutuhkan library ikon atau SVG kustom) --}}
                {{--
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto mb-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v11.494m0 0a8.485 8.485 0 0011.925 0M12 17.747a8.485 8.485 0 01-11.925 0M12 6.253c1.657 0 3 1.119 3 2.5s-1.343 2.5-3 2.5S9 9.872 9 8.372s1.343-2.119 3-2.119zM5.513 14.364A8.46 8.46 0 013 17.747m18 0a8.46 8.46 0 01-2.513-3.383M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                --}}
            </div>

            <p class="mt-4 text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Jelajahi dunia pengetahuan tanpa batas. Temukan buku favoritmu, pinjam dengan mudah, dan tingkatkan literasimu bersama kami.
            </p>

            <div class="mt-12 space-y-4 sm:space-y-0 sm:flex sm:justify-center sm:space-x-6">
                <a href="{{ route('login') }}"
                   class="inline-block w-full sm:w-auto px-8 py-3 text-lg font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out">
                    Masuk Akun
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="inline-block w-full sm:w-auto px-8 py-3 text-lg font-semibold text-blue-700 bg-transparent border-2 border-blue-600 rounded-lg hover:bg-blue-50 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out">
                        Daftar Akun Baru
                    </a>
                @endif
            </div>
        </main>

        <footer class="absolute bottom-0 w-full text-center p-6 text-sm text-gray-500 dark:text-gray-400">
            © {{ date('Y') }} SmartLib. Semua Hak Cipta Dilindungi.
            <span class="mx-1">|</span>
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</body>
</html>