{{-- resources/views/borrowings/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Peminjaman Buku')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Daftar Peminjaman Buku</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Buat Peminjaman Baru</a>
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
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Jatuh Tempo</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrowings as $index => $borrowing)
                <tr>
                    <td>{{ $borrowings->firstItem() + $index }}</td>
                    <td>{{ $borrowing->member->name ?? 'N/A' }}</td>
                    <td>{{ $borrowing->book->title ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($borrowing->borrowed_date)->isoFormat('D MMM YYYY') }}</td>
                    <td>{{ \Carbon\Carbon::parse($borrowing->due_date)->isoFormat('D MMM YYYY') }}</td>
                    <td>
                        @if ($borrowing->returned_date)
                            {{ \Carbon\Carbon::parse($borrowing->returned_date)->isoFormat('D MMM YYYY') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($borrowing->status == 'borrowed')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @elseif ($borrowing->status == 'returned')
                            <span class="badge bg-success">Dikembalikan</span>
                        @elseif ($borrowing->status == 'overdue')
                            <span class="badge bg-danger">Terlambat</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($borrowing->status) }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($borrowing->status == 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin buku ini akan dikembalikan?')">Kembalikan</button>
                            </form>
                        @endif
                        <a href="{{ route('borrowings.show', $borrowing->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $borrowings->links() }}
    </div>
</div>
@endsection
