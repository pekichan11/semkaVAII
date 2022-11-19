@extends('master')

@section('title', 'Listing all books')

@section('main')
    @foreach ($books as $book)
    <ul>
        <li>ID: {{ $book['id'] }}</li>
        <li>Title: {{$book['title']}}</li>
        <li>Plot: {{$book['plot']}}</li>
    </ul>
    @endforeach
@stop

@section('footer')
    <h1>footer</h1>
@stop