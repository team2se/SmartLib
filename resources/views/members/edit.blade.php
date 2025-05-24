{{-- resources/views/members/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Anggota: {{ $member->name }}</h1>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @method('PUT')
        @include('members._form', ['member' => $member, 'submitButtonText' => 'Perbarui Anggota'])
    </form>
</div>
@endsection
