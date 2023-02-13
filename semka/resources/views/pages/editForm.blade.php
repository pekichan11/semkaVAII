@extends('master')
<?php
    use App\Models\Autor;

    $autors = Autor::All();
?>

  
@section('title', 'Book forse')

@section('main')
    <form method="POST" action="/addBook" enctype="multipart/form-data" files="true">
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
            <textarea type="text" rows="5" cols="100" name="plot" id="plot" class="form-control" placeholder="plot" 
                @if (isset($book)) 
                    value="{{$book['plot'] }}"
                @endif
            ></textarea>
        </div>

        <div class="form-group">
            <label for="autor" class="form-label mt-4">Autor</label>
            <select name="autor" id="autor">
                    <option value="null"></option>
                @foreach ($autors as $autor)
                    <option value="{{$autor['id']}}">{{$autor['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" class="form-control" required name="image">
        </div>
        <button type="submit" class="btn btn-primary mb-4">submit</button>
    </form>
@stop


@section('footer')
    <h2>footer</h2>
@stop
