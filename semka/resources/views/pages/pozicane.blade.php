<?php 
    use App\Models\Book;
?>

@extends('master')

@section('title', 'Historia pozicani')



@section('main')
    <h1 class="zoznam-knih">Tvoje pozicania</h1>
    @if (count($loans) != 0)
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nazov knihy</th>
                <th scope="col">Datum pozicania</th>
                <th scope="col">Datunm vratenia</th>
                <th scope="col">vratenie</th>
              </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($loans); $i++) 
                <?php $book = Book::find($loans[$i]->book_id); ?>
                    @if ($i % 2 == 0)
                    <tr class="table-active">
                    @else
                    <tr>
                    @endif
                        <th scope="row">{{ $i + 1 }}</th>
                        <td><?= $book->title ?></td>
                        <td><?= $book->created_at ?></td>
                        <td><?= $book->returned ?></td>
                        <td><?php if($book->returned === null) {echo '<a href="#" class="btn btn-info">Vrat</a>';} ?></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    @else
        <h2>Prazdna historia</h2>
    @endif
@endsection
    
@section('footer')

@endsection