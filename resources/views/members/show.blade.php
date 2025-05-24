{{-- resources/views/members/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detail Anggota: {{ $member->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $member->name }}</p>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $member->phone_number ?? 'Tidak ada' }}</p>
            <p><strong>Alamat:</strong> {{ $member->address ?? 'Tidak ada' }}</p>
            <p><strong>Tanggal Bergabung:</strong> {{ $member->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Data Terakhir Diperbarui:</strong> {{ $member->updated_at->format('d M Y, H:i') }}</p>

            {{-- Tambahan: Daftar buku yang pernah atau sedang dipinjam (membutuhkan relasi 'borrowings' di model Member) --}}
            {{--
            <hr>
            <h5>Riwayat Peminjaman:</h5>
            @if($member->borrowings && $member->borrowings->count() > 0)
                <ul>
                    @foreach($member->borrowings as $borrowing)
                        <li>
                            {{ $borrowing->book->title ?? 'Buku tidak ditemukan' }}
                            (Dipinjam: {{ $borrowing->borrowed_date }}, Status: {{ $borrowing->status }})
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada riwayat peminjaman.</p>
            @endif
            --}}
        </div>
        <div class="card-footer">
            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
            </form>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali ke Daftar Anggota</a>
        </div>
    </div>
</div>
@endsection