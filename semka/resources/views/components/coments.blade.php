<?php 
    use App\Models\User;

    $int = intval(count($comments));
?>

<form method="POST" class="form-control dark" action="{{ route('comment') }}">
    @csrf
    <input type="hidden" name="user_name" value="{{Auth::user()->name }}">
    <input type="hidden" name="book_id" value="{{ $book['id'] }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="text" name="text" class="form-control mb-3" required>

    <button type="submit" class="btn " id="comment">submit</button>
</form>

<div class="comments">
    @for ($i = intval(count($comments)) - 1; $i > intval(count($comments) - 4) && $i >= 0; $i--)
    <?php $user = User::findOrFail($comments[$i]->user_id);?>
    <div class="card border-info mb-3 comment">
        <div class="card-header">{{ date("m.d H:i",strtotime($comments[$i]['created_at'])) }}</div>
        <div class="card-body">
            <p class="card-text"><?= $user->name ?></p>
            <h4 class="card-title">{{ $comments[$i]['text'] }}</h4>
        </div>
    </div>
    @endfor
    
    <ul class="comment-pages">
        @for ($j = 0; $j < ceil(intval(count($comments)) / 3); $j++)
            <li class="comment-page">
                <a href="#" class="comment-page-link"><?= $j + 1 ?></a>
            </li>    
        @endfor
        </ul>
</div>

