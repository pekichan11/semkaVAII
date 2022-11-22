@extends('master')

@section('title', 'Listing all books')

@section('main')
    @if(isset($books))
        @foreach ($books as $book)
        <ul>
            <li>ID: {{ $book['id'] }}</li>
            <li>Title: {{$book['title']}}</li>
            <li>Plot: {{$book['plot']}}</li>
            <a href="/delete/"{{ $book['id'] }} class="btn btn-danger">Delete</a>            
        </ul>
        @endforeach
    @endif
@stop

@section('footer')
    <h1>footer</h1>
@stop