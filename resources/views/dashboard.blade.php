{{-- Meng-extend layout utama aplikasi Anda, sesuaikan jika nama filenya berbeda --}}
@extends('layouts.app')

{{-- Judul Halaman --}}
@section('title', 'Dashboard Perpustakaan')

{{-- Konten Halaman --}}
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Perpustakaan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ringkasan Data</li>
    </ol>

    {{-- Baris untuk Statistik Utama --}}
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i> {{-- Ganti dengan ikon yang sesuai --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMembers ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i> {{-- Ganti dengan ikon yang sesuai --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Buku Sedang Dipinjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $booksCurrentlyBorrowed ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-reader fa-2x text-gray-300"></i> {{-- Ganti dengan ikon yang sesuai --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Buku Sudah Dikembalikan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $booksReturned ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-undo-alt fa-2x text-gray-300"></i> {{-- Ganti dengan ikon yang sesuai --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris untuk Daftar Buku Jatuh Tempo dan Terlambat --}}
    <div class="row mt-4">
        {{-- Kolom Buku Akan Jatuh Tempo --}}
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-bell me-1"></i> {{-- Ganti dengan ikon yang sesuai --}}
                    Buku Akan Segera Jatuh Tempo (3 Hari ke Depan)
                </div>
                <div class="card-body">
                    @if(isset($booksDueSoon) && $booksDueSoon->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($booksDueSoon as $borrowing)
                                <li class="list-group-item">
                                    <strong>{{ $borrowing->book->title ?? 'Judul Tidak Tersedia' }}</strong>
                                    <small class="d-block">
                                        Peminjam: {{ $borrowing->member->name ?? 'Anggota Tidak Ditemukan' }}
                                    </small>
                                    <small class="d-block">
                                        Jatuh Tempo: {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}
                                        ({{ \Carbon\Carbon::parse($borrowing->due_date)->diffForHumans() }})
                                    </small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Tidak ada buku yang akan jatuh tempo dalam waktu dekat.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Kolom Buku Terlambat --}}
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-exclamation-triangle me-1"></i> {{-- Ganti dengan ikon yang sesuai --}}
                    Buku Terlambat Dikembalikan
                </div>
                <div class="card-body">
                    @if(isset($overdueBooks) && $overdueBooks->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($overdueBooks as $borrowing)
                                <li class="list-group-item list-group-item-danger">
                                    <strong>{{ $borrowing->book->title ?? 'Judul Tidak Tersedia' }}</strong>
                                    <small class="d-block">
                                        Peminjam: {{ $borrowing->member->name ?? 'Anggota Tidak Ditemukan' }}
                                    </small>
                                    <small class="d-block">
                                        Jatuh Tempo: {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}
                                        (Terlambat {{ \Carbon\Carbon::parse($borrowing->due_date)->diffInDays(now()) }} hari)
                                    </small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Tidak ada buku yang terlambat dikembalikan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

{{-- Jika Anda menggunakan styling tambahan atau JavaScript khusus untuk halaman ini --}}
@push('styles')
    {{-- <link href="path/to/your/custom_dashboard_styles.css" rel="stylesheet"> --}}
@endpush

@push('scripts')
    {{-- <script src="path/to/your/custom_dashboard_scripts.js"></script> --}}
@endpush