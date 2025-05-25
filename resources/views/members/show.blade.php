{{-- resources/views/members/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $member->name }}</h1>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $member->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Nomor Telepon</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $member->phone_number ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2"> {{-- Alamat bisa mengambil lebar penuh di grid jika perlu --}}
                            <p class="text-sm text-gray-500 dark:text-gray-400">Alamat</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white whitespace-pre-line">{{ $member->address ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Bergabung</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $member->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Data Terakhir Diperbarui</p>
                            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $member->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    {{-- Riwayat Peminjaman (Sudah di-styling dengan Tailwind) --}}
                    {{-- Pastikan Anda memiliki relasi 'borrowings' di model Member dan 'book' di model Borrowing --}}
                    {{--
                    <div class="border-t border-gray-200 dark:border-gray-700 mt-6 pt-6">
                        <h5 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Riwayat Peminjaman:</h5>
                        @if($member->borrowings && $member->borrowings->count() > 0)
                            <ul class="space-y-3">
                                @foreach($member->borrowings as $borrowing)
                                    <li class="p-3 bg-gray-50 dark:bg-gray-700 rounded-md shadow-sm">
                                        <p class="font-medium text-gray-900 dark:text-white">
                                            {{ $borrowing->book->title ?? 'Buku tidak ditemukan' }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            Dipinjam: {{ \Carbon\Carbon::parse($borrowing->borrowed_date)->format('d M Y') }},
                                            Status: <span class="font-semibold
                                                @if($borrowing->status == 'borrowed') text-yellow-600 dark:text-yellow-400 @endif
                                                @if($borrowing->status == 'returned') text-green-600 dark:text-green-400 @endif
                                                @if($borrowing->status == 'overdue') text-red-600 dark:text-red-400 @endif
                                            ">{{ ucfirst($borrowing->status) }}</span>
                                            @if($borrowing->returned_date)
                                                , Dikembalikan: {{ \Carbon\Carbon::parse($borrowing->returned_date)->format('d M Y') }}
                                            @endif
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600 dark:text-gray-400">Belum ada riwayat peminjaman.</p>
                        @endif
                    </div>
                    --}}

                    <div class="border-t border-gray-200 dark:border-gray-700 mt-6 pt-6 flex flex-wrap gap-3 items-center">
                        <a href="{{ route('members.edit', $member->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('members.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-700 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 dark:focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                            Kembali ke Daftar Anggota
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>