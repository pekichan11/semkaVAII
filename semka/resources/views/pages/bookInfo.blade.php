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
    <form method="POST" action="{{route('pozicaj')}}">
        @csrf
        <input type="hidden" name = "book_id" value={{ $book['id'] }}>
        <input type="submit" class="btn btn-primary pozicaj " value="pozicaj">
    </form>
    @include('components\coments')
@endsection   

@section('footer')
    <div class="shadow"></div>
@endsection



    