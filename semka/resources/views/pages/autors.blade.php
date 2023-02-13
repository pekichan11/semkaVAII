@extends('master')

@section('title', 'autors')

@section('main')
    <h1>Autory</h1>
    @if (Auth::user()->role === 'admin')
        <a href="addAutor" class="btn btn-success">add autor</a>
    @endif
    <ul>
        @foreach ($autors as $item)
            <li><a href="/autor/{{$item['id']}}">{{$item['name']}}</a></li>
        @endforeach
    </ul>
@endsection