{{-- resources/views/members/_form.blade.php (VERSI TAILWIND CSS) --}}
{{-- Token CSRF seharusnya sudah ada di form pemanggil (create.blade.php atau edit.blade.php) --}}

<div class="space-y-6"> {{-- Memberikan spasi vertikal antar grup form --}}
    {{-- Nama Lengkap --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
        <input type="text" name="name" id="name"
               value="{{ old('name', $member->name ?? '') }}"
               required
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('name') border-red-500 @enderror">
        @error('name')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Alamat Email --}}
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Email</label>
        <input type="email" name="email" id="email"
               value="{{ old('email', $member->email ?? '') }}"
               required
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('email') border-red-500 @enderror">
        @error('email')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Nomor Telepon --}}
    <div>
        <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Telepon <span class="text-xs text-gray-500 dark:text-gray-400">(Opsional)</span></label>
        <input type="text" name="phone_number" id="phone_number"
               value="{{ old('phone_number', $member->phone_number ?? '') }}"
               class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('phone_number') border-red-500 @enderror">
        @error('phone_number')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Alamat --}}
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat <span class="text-xs text-gray-500 dark:text-gray-400">(Opsional)</span></label>
        <textarea name="address" id="address" rows="3"
                  class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('address') border-red-500 @enderror">{{ old('address', $member->address ?? '') }}</textarea>
        @error('address')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 mt-8">
        <a href="{{ route('members.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-700 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 dark:focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
            Batal
        </a>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ $submitButtonText ?? 'Simpan Anggota' }}
        </button>
    </div>
</div>