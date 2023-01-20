<form method="POST" action="/newcomment">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book['id'] }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="text" name="text" id="">

    <button type="submit" class="btn btn-danger">submit</button>
</form>