@extends('master')

@section('title', $book->title)

@section('main')

    <div class="book-info">
        <img class="book-info-img" src="{{ asset('img/books')."/".$book['img'] }}" alt="">
        <div class="book-info-content">
            <h2>{{ $book['title'] }}</h2>
            <p>{{ $book['plot'] }}</p>
        </div>
    </div>
    @include('components\coments')
@endsection   

@section('footer')
    
@endsection



    