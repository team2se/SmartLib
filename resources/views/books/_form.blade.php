{{-- resources/views/books/_form.blade.php (SETELAH DIMODIFIKASI DENGAN TAILWIND) --}}
{{-- Token CSRF dan @vite seharusnya sudah ada di form pemanggil (create.blade.php atau edit.blade.php) dan layout utama --}}

<div class="space-y-6"> {{-- Memberikan spasi vertikal antar grup form --}}
    {{-- Judul --}}
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Buku</label>
        <input type="text" name="title" id="title"
               value="{{ old('title', $book->title ?? '') }}"
               required
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('title') border-red-500 @enderror">
        @error('title')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Penulis --}}
    <div>
        <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
        <input type="text" name="author" id="author"
               value="{{ old('author', $book->author ?? '') }}"
               required
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('author') border-red-500 @enderror">
        @error('author')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- ISBN --}}
    <div>
        <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ISBN</label>
        <input type="text" name="isbn" id="isbn"
               value="{{ old('isbn', $book->isbn ?? '') }}"
               required maxlength="14" {{-- Atribut maxlength tetap dipertahankan --}}
               placeholder="Contoh: 123-456-789012-3" {{-- Placeholder tetap dipertahankan --}}
               {{-- Anda bisa menambahkan data-isbn-format di sini jika isbn-formatter.js memerlukannya --}}
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('isbn') border-red-500 @enderror">
        @error('isbn')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tahun Terbit --}}
    <div>
        <label for="published_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Terbit</label>
        <input type="number" name="published_year" id="published_year"
               value="{{ old('published_year', $book->published_year ?? '') }}"
               required min="1000" max="{{ date('Y') }}"
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('published_year') border-red-500 @enderror">
        @error('published_year')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Stok --}}
    <div>
        <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stok</label>
        <input type="number" name="stock" id="stock"
               value="{{ old('stock', $book->stock ?? '0') }}"
               required min="0"
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('stock') border-red-500 @enderror">
        @error('stock')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 mt-8">
        <a href="{{ route('books.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-700 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 dark:focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
            Batal
        </a>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ $submitButtonText ?? 'Simpan' }}
        </button>
    </div>
</div>