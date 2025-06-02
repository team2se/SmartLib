{{-- resources/views/borrowings/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            Peminjaman ID: {{ $borrowing->id }}
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Nama Anggota</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $borrowing->member->name ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Email Anggota</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $borrowing->member->email ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Judul Buku</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $borrowing->book->title ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">ISBN Buku</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ $borrowing->book->isbn ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pinjam</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($borrowing->borrowed_date)->isoFormat('D MMMM YYYY, HH:mm') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Jatuh Tempo</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($borrowing->due_date)->isoFormat('D MMMM YYYY, HH:mm') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                @if ($borrowing->status == 'borrowed')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100">
                                        Dipinjam
                                    </span>
                                @elseif ($borrowing->status == 'returned')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                                        Dikembalikan
                                    </span>
                                @elseif ($borrowing->status == 'overdue')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100">
                                        Terlambat
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-100">
                                        {{ ucfirst($borrowing->status) }}
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Kembali</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                @if ($borrowing->returned_date)
                                    {{ \Carbon\Carbon::parse($borrowing->returned_date)->isoFormat('D MMMM YYYY, HH:mm') }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 flex flex-wrap gap-3 items-center">
                        @if ($borrowing->status == 'borrowed' || $borrowing->status == 'overdue')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin buku ini akan dikembalikan?')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Tandai Sudah Kembali
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('borrowings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-700 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 dark:focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                            Kembali ke Daftar Peminjaman
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>