{{-- resources/views/books/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Buku Baru</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @include('books._form', ['submitButtonText' => 'Tambah Buku'])
    </form>
</div>
@endsection