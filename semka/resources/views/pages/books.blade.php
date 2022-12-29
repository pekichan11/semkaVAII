@extends('master')

@section('title', 'Listing all books')

@section('main')
    <a href="/add" class="btn btn-success"> add new</a>

    @if(isset($books))
        @foreach ($books as $book)
        <ul>
            <li>ID: {{ $book['id'] }}</li>
            <li>Title: {{$book['title']}}</li>
            <li>Plot: {{$book['plot']}}</li>
            
            <a href="/delete/{{ $book['id'] }}" class="btn btn-danger"> delete</a>
            <a href="/editbook/{{ $book['id'] }}" class="btn btn-info"> edit</a>           
        </ul>
        @endforeach
    @endif

@stop

@section('footer')
    <h1>footer</h1>
@stop