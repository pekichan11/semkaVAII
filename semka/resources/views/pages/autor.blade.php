@extends('master')

@section('title', $autor['name'])

@section('main')
    <h1>{{$autor['name']}}</h1>
    <a href="https://sk.wikipedia.org/w/index.php?go=Go&search=<?= $autor->name?>&title=%C5%A0peci%C3%A1lne:H%C4%BEadanie&ns0=1">wiki</a>
    <p>{{$autor['birthdate']}}</p>
    <p>{{$autor['info']}}</p>
    @foreach ($books as $book)
        @include('components.bookView')
    @endforeach
@endsection