@extends('master')


  
@section('title', 'Book forse')

@section('main')
    <form method="POST" action="/addBook">
        @csrf
        @if (isset($book))
            <input type="hidden" value="{{ $book['id'] }}" name="id">
        @endif
        <h2>Edit book</h2>
        <div class="form-group">
            <label for="title" class="form-label mt-4">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="title" 
                @if (isset($book)) 
                    value="{{$book['title'] }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="plot" class="form-label mt-4">Plot</label>
            <input type="text" name="plot" id="plot" class="form-control" placeholder="plot" 
                @if (isset($book)) 
                    value="{{$book['plot'] }}"
                @endif
            >
        </div>
        <button type="submit" class="btn btn-primary mb-4">submit</button>
    </form>
@stop


@section('footer')
    <h2>footer</h2>
@stop
