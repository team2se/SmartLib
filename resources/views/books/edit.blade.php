{{-- resources/views/books/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku: {{ $book->title }}</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @method('PUT') {{-- Method spoofing untuk PUT request --}}
        @include('books._form', ['book' => $book, 'submitButtonText' => 'Perbarui Buku'])
    </form>
</div>
@endsection