{{-- resources/views/books/index.blade.php --}}
@extends('layouts.app') {{-- Asumsi Anda memiliki layout utama bernama app.blade.php --}}

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Daftar Buku</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku Baru</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>ISBN</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $index => $book)
                <tr>
                    <td>{{ $books->firstItem() + $index }}</td> {{-- Untuk nomor urut dengan paginasi --}}
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Tampilkan link paginasi --}}
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>
@endsection