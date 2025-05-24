{{-- resources/views/borrowings/create.blade.php --}}
@extends('layouts.app') {{-- Asumsi Anda memiliki layout utama --}}

@section('title', 'Form Peminjaman Buku')

@section('content')
<div class="container">
    <h1>Form Peminjaman Buku</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="member_id" class="form-label">Pilih Anggota</label>
            <select class="form-select @error('member_id') is-invalid @enderror" id="member_id" name="member_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }} ({{ $member->email }})
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Pilih Buku (Stok Tersedia)</label>
            <select class="form-select @error('book_id') is-invalid @enderror" id="book_id" name="book_id" required>
                <option value="">-- Pilih Buku --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} (Penulis: {{ $book->author }}, Stok: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
            @error('book_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal Pinjam dan Jatuh Tempo bisa di-set otomatis di controller --}}
        {{--
        <div class="mb-3">
            <label for="borrowed_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control @error('borrowed_date') is-invalid @enderror" id="borrowed_date" name="borrowed_date" value="{{ old('borrowed_date', date('Y-m-d')) }}" required>
            @error('borrowed_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+7 days'))) }}" required>
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        --}}

        <button type="submit" class="btn btn-primary">Pinjam Buku</button>
        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
