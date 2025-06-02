{{-- resources/views/books/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">
                        Formulir Tambah Buku
                    </h3>

                    {{-- Menampilkan error validasi global (jika ada) --}}
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md dark:bg-red-700 dark:text-red-100 dark:border-red-600">
                            <strong class="font-bold">Oops! Ada yang salah:</strong>
                            <ul class="mt-1 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf {{-- Token CSRF wajib untuk form POST --}}

                        @include('books._form', [
                            'book' => new \App\Models\Book, // KIRIM INSTANCE BOOK KOSONG
                            'submitButtonText' => 'Tambah Buku'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>