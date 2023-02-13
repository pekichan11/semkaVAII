@extends('master')

@section('title', 'Listing all books')

@section('main')
    <h1 class="zoznam-knih">Zoznam knih</h1>
    @if (Auth::user()->role === 'admin')
        <div class="addBook">
            <a href="/add" class="btn btn-success"> add new</a>
        </div>
    @endif
    @if(isset($books))
        @foreach ($books as $book)
                    @include('components.bookView')
        @endforeach
    @endif
@stop


    
