@extends('master')

@section('title', 'Listing all books')

@section('main')
    @if(isset($books))
        @foreach ($books as $book)
                    @include('components.bookView')
        @endforeach
    @endif
@stop

@section('footer')
    <h1>footer</h1>
    <a href="/add" class="btn btn-success"> add new</a>
@stop