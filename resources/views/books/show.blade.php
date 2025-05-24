{{-- resources/views/books/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detail Buku: {{ $book->title }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Judul:</strong> {{ $book->title }}</p>
            <p><strong>Penulis:</strong> {{ $book->author }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $book->published_year }}</p>
            <p><strong>Stok:</strong> {{ $book->stock }}</p>
            <p><strong>Ditambahkan pada:</strong> {{ $book->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Diperbarui pada:</strong> {{ $book->updated_at->format('d M Y, H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
            </form>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
        </div>
    </div>
</div>
@endsection