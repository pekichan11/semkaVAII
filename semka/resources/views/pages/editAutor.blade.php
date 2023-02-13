@extends('master')

@section('title', 'fine editing')

@section('main')

    <form method="POST" class="form-control" action="/addAutor" enctype="multipart/form-data" files="true"> 
        <h1>Add new Autor</h1>
        @csrf
        <label for="name" class="form-label">Name:</label>
        <input class="form-control" type="text" name="name" id="name" required>
        <label for="birthdate" class="form-label">Birthdate: </label>
        <input class="form-control" type="date" name="birthdate" id="birthdate" required>
        <label for="img" class="form-label">Image:</label>
        <input type="file" name="img" id="img">
        <label for="info">Info: </label>
        <textarea class="form-control" name="info" id="info" cols="50" rows="5"></textarea>
        <input class="btn btn-info" type="submit" value="create">
    </form>

@endsection