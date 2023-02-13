<?php 
?>

<form method="POST" class="form-control card border-info" action="{{ route('comment') }}">
    @csrf
    <input type="hidden" name="user_name" value="{{Auth::user()->name }}">
    <input type="hidden" name="book_id" value="{{ $book['id'] }}">
    <input type="text" name="text" class="form-control mb-3" required>

    <button type="submit" class="btn btn-success" id="comment">submit</button>
</form>

<div class="comments">
    @for ($i = intval(count($comments)) - 1; $i > intval(count($comments) - 4) && $i >= 0; $i--)
    <div class="card border-info mb-3 comment">
        <div class="card-header">{{ date("m.d H:i",strtotime($comments[$i]['created_at'])) }} 
            @if (Auth::user()->id === $comments[$i]['user_id'] || Auth::user()->role === 'admin')
            <span class="float-right">
                <a href="/editComment/{{$comments[$i]['id']}}">
                    <img src="{{asset('img/pencil.png')}}" alt="" width="30" height="30">
                </a>
                
            </span>
            @endif
        </div>
        <div class="card-body">
            <p class="card-text">{{ $comments[$i]['user_name'] }}</p>
            <h4 class="card-title">{{ $comments[$i]['text'] }}</h4>
        </div>
    </div>
    @endfor
    
    <ul class="comment-pages">
        @for ($j = 0; $j < ceil(intval(count($comments)) / 3); $j++)
            <li class="comment-page">
                <a href="#" class="comment-page-link btn btn-success" ><?= $j + 1 ?></a>
            </li>    
        @endfor
    </ul>
</div>

