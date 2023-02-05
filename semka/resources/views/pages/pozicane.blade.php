@extends('master')

@section('title', 'Historia pozicani')



@section('main')
    @if (count($loans) == 0)
        <h2>Neprazdna historia</h2>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Column heading</th>
                <th scope="col">Column heading</th>
                <th scope="col">Column heading</th>
              </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 4; $i++)
                    @if ($i % 2 == 0)
                    <tr class="table-active">
                    @else
                    <tr>
                    @endif
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
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