@extends('master')

@section('title', $book->title)

@section('main')
    <div class="book-info">
        <a class="link-book-img" href="{{ asset('img/books')."/".$book['img'] }}">
            <img class="book-info-img" src="{{ asset('img/books')."/".$book['img'] }}" alt="">
        </a>
        <div class="book-info-content">
            <h2>{{ $book['title'] }}</h2>
            <p>{{ $book['plot'] }}</p>
        </div>
    </div>
    @include('components\coments')
@endsection   

@section('footer')
    
@endsection



    