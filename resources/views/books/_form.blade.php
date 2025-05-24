{{-- resources/views/books/_form.blade.php --}}
@csrf {{-- Token CSRF untuk keamanan --}}
<div class="mb-3">
    <label for="title" class="form-label">Judul Buku</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="author" class="form-label">Penulis</label>
    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $book->author ?? '') }}" required>
    @error('author')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" required maxlength="14" placeholder="Contoh: 1234-567890123">
    @error('isbn')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="mb-3">
    <label for="published_year" class="form-label">Tahun Terbit</label>
    <input type="number" class="form-control @error('published_year') is-invalid @enderror" id="published_year" name="published_year" value="{{ old('published_year', $book->published_year ?? '') }}" required min="1000" max="{{ date('Y') }}">
    @error('published_year')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stok</label>
    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $book->stock ?? '0') }}" required min="0">
    @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText ?? 'Simpan' }}</button>
<a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
