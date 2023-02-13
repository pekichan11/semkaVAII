@extends('master')

@section('title', $comment['id'])

@section('main')
    <form  method="POST" action="http://localhost:8000/editC/{{$comment['id']}}">
        @csrf
        <h1>Comment n. {{$comment['id']}}</h1>
        <input type="text" class="form-control" name="text" id="" value="{{$comment['text']}}">
        <input type="submit" action="edit" class="btn btn-info" value="edit">
    </form>
    <form method="POST" id="delete-comment" action="http://localhost:8000/deleteC/{{$comment['id']}}" >
        @csrf
        <input type="submit" class="btn btn-danger" value="delete">
    </form>
@endsection
