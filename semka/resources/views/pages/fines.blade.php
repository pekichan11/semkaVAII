@extends('master')

@section('title', 'pokuty') 

@section('main')

    <div class="fines">
        <h1 class="zoznam-knih">Pokuty</h1>
        @if (isset($fines))
            @foreach ($fines as $item)
            <div class="card border-info mb-3 comment">
                <div class="card-header">{{ date("m.d H:i",strtotime($item->created_at)) }}</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $item['value'] }}€</h4>
                    <p class="card-text">{{ $item['text'] }}</p>
                </div>
            </div>    
            @endforeach
        @endif
    </div>
    
@endsection