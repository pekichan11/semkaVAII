<?php 
    use App\Models\User;
?>
<div class="comments">
    @foreach ($comments as $item)
    <?php 
        $user = User::findOrFail($item->user_id);
    ?>
    <div class="card border-info mb-3 comment">
        <div class="card-header">{{ date("m.d H:i",strtotime($item['created_at'])) }}</div>
        <div class="card-body">
            <p class="card-text"><?= $user->name ?></p>
            <h4 class="card-title">{{ $item['text'] }}</h4>
        </div>
    </div>
    @endforeach
</div>

<form method="POST" action="{{ route('comment') }}">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book['id'] }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="text" name="text" id="">

    <button type="submit" class="btn btn-danger">submit</button>
</form>