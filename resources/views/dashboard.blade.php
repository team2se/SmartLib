{{-- /Users/catapulta/Uni/SmartLib/resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard SmartLib') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold mb-6">{{ __("Selamat Datang Kembali!") }}</h3>

                    {{-- Ringkasan Statistik Utama --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        {{-- Total Buku --}}
                        <div class="bg-blue-100 dark:bg-blue-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h4 class="text-lg font-semibold text-blue-800 dark:text-blue-200">Total Buku</h4>
                            <p class="text-4xl font-bold text-blue-900 dark:text-blue-100 mt-2">{{ $totalBooks ?? '0' }}</p>
                        </div>

                        {{-- Total Anggota --}}
                        <div class="bg-green-100 dark:bg-green-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h4 class="text-lg font-semibold text-green-800 dark:text-green-200">Total Anggota</h4>
                            <p class="text-4xl font-bold text-green-900 dark:text-green-100 mt-2">{{ $totalMembers ?? '0' }}</p>
                        </div>

                        {{-- Buku Sedang Dipinjam --}}
                        <div class="bg-yellow-100 dark:bg-yellow-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h4 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200">Buku Dipinjam</h4>
                            <p class="text-4xl font-bold text-yellow-900 dark:text-yellow-100 mt-2">{{ $booksCurrentlyBorrowed ?? '0' }}</p>
                        </div>

                        {{-- Buku Sudah Dikembalikan --}}
                        <div class="bg-indigo-100 dark:bg-indigo-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h4 class="text-lg font-semibold text-indigo-800 dark:text-indigo-200">Buku Dikembalikan</h4>
                            <p class="text-4xl font-bold text-indigo-900 dark:text-indigo-100 mt-2">{{ $booksReturned ?? '0' }}</p>
                        </div>
                    </div>

                    {{-- Daftar Buku Akan Jatuh Tempo dan Terlambat (Side by side jika ada keduanya) --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- Daftar Buku Akan Jatuh Tempo --}}
                        <div>
                            @if(isset($booksDueSoon) && $booksDueSoon->count() > 0)
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Buku Akan Segera Jatuh Tempo (3 Hari)</h4>
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow">
                                    <ul class="space-y-3">
                                        @foreach($booksDueSoon as $borrowing)
                                            <li class="text-sm text-gray-700 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600 pb-2 last:border-b-0">
                                                <strong>{{ $borrowing->book->title ?? 'Judul Tidak Tersedia' }}</strong>
                                                <span class="block text-xs text-gray-500 dark:text-gray-400">
                                                    Peminjam: {{ $borrowing->member->name ?? 'Anggota Tidak Ditemukan' }}
                                                </span>
                                                <span class="block text-xs text-gray-500 dark:text-gray-400">
                                                    Jatuh tempo: <span class="font-medium">{{ \Carbon\Carbon::parse($borrowing->due_date)->isoFormat('dddd, D MMM YYYY') }}</span>
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow text-center">
                                    <p class="text-gray-600 dark:text-gray-400">Tidak ada buku yang akan jatuh tempo dalam 3 hari ke depan.</p>
                                </div>
                            @endif
                        </div>

                        {{-- Daftar Buku Terlambat --}}
                        <div>
                            @if(isset($overdueBooks) && $overdueBooks->count() > 0)
                                <h4 class="text-xl font-semibold text-red-600 dark:text-red-400 mb-4">Buku Terlambat</h4>
                                <div class="bg-red-50 dark:bg-red-900/30 p-4 rounded-lg shadow">
                                    <ul class="space-y-3">
                                        @foreach($overdueBooks as $borrowing)
                                            <li class="text-sm text-red-700 dark:text-red-300 border-b border-red-200 dark:border-red-700 pb-2 last:border-b-0">
                                                <strong>{{ $borrowing->book->title ?? 'Judul Tidak Tersedia' }}</strong>
                                                <span class="block text-xs text-red-500 dark:text-red-400">
                                                    Peminjam: {{ $borrowing->member->name ?? 'Anggota Tidak Ditemukan' }}
                                                </span>
                                                <span class="block text-xs text-red-500 dark:text-red-400">
                                                    Jatuh tempo: <span class="font-medium">{{ \Carbon\Carbon::parse($borrowing->due_date)->isoFormat('dddd, D MMM YYYY') }}</span>
                                                    ({{ \Carbon\Carbon::parse($borrowing->due_date)->diffForHumans() }})
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow text-center">
                                    <p class="text-gray-600 dark:text-gray-400">Tidak ada buku yang terlambat.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
