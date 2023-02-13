@extends('master')

@section('title', 'autors')

@section('main')
    <h1>Autory</h1>
    <ul>
        @foreach ($autors as $item)
            <li><a href="/autor/{{$item['id']}}">{{$item['name']}}</a></li>
        @endforeach
    </ul>
@endsection