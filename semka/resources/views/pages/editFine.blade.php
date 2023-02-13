@extends('master')
<?php 
    function edit(): bool {
        return isset($fine);
    }
?>
@section('title', 'fine editing')

@section('main')
    
    <form method="POST" action="{{edit() ? "a" : route('createFine')}}"> 
        @csrf
        @if (edit())
            <h1>Edit fine</h1>
        @else 
            <h1>Udel pokutu</h1>
        @endif
        
        <input class="form-control" type="hidden" name="user_id" value="{{$user_id}}">
        <label class="form-label" for="value">Value: </label>
        <input class="form-control" id="value" type="text" name="value" value="<?= edit() ? $fine->value :"" ?>">
        <label class="form-label" for="text">Popis: </label>
        <input class="form-control" id="text" type="text" name="text" value="<?= edit() ? $fine->text : "text" ?>">
        <input class="btn <?= edit() ? 'btn-info' :'btn-success' ?>" type="submit" value="<?= edit() ? 'edit' :'odosli' ?>">
    </form>

@endsection