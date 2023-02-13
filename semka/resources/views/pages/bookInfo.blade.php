@extends('master')
<?php 
    use Illuminate\Support\Facades\Auth;
?>
@section('title', $book->title)

@section('main')
    <div class="book-info">
        <a class="link-book-img" href="{{ asset('img/books')."/".$book['img'] }}">
            <img class="book-info-img" src="{{ asset('img/books')."/".$book['img'] }}" alt="">
        </a>
        
        <div class="book-info-content">
            <h2>{{ $book['title'] }}</h2>
            @if ($book['autor_id'] !== null)
            <a href="/autor/{{$book['autor_id']}}">Autor</a>
            @endif
            <p>{{ $book['plot'] }}</p>
        </div>
    </div>
    <div class="forms">
        @if (Auth::user()->role == 'admin')
            <form method="POST" id="delete-book" action="{{route('vymaz')}}">
                @csrf
                <input type="hidden"  name = "book_id" value={{ $book['id'] }}>
                <input type="submit" class="btn btn-danger" value="vymaz">
            </form>
            <form method="GET" action="/editbook/{{ $book['id'] }}">
                @csrf
                <input type="hidden" name = "book_id" value={{ $book['id'] }}>
                <input type="submit" class="btn btn-info" value="edit">
            </form>
        @else 
            <form method="POST" action="{{route('pozicaj')}}">
                @csrf
                <input type="hidden" name = "book_id" value={{ $book['id'] }}>
                <input type="submit" class="btn btn-primary pozicaj " value="pozicaj">
            </form>
        @endif
    </div>
    @include('components\coments')
@endsection   

@section('footer')
    <div class="shadow"></div>
@endsection



    