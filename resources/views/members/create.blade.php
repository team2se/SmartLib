{{-- resources/views/members/create.blade.php --}}
@extends('layouts.app') {{-- Asumsi Anda memiliki layout utama --}}

@section('content')
<div class="container">
    <h1>Tambah Anggota Baru</h1>

    <form action="{{ route('members.store') }}" method="POST">
        @include('members._form', ['submitButtonText' => 'Tambah Anggota'])
    </form>
</div>
@endsection