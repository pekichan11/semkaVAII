<div class="bookView">
    <a href="#" class="img">
        <img src="{{ asset('img/books')."/".$book['img'] }}" alt="">
    </a>
    <h3>{{ $book['title'] }}</h3>
    <p><?php 
        if (strlen($book->plot) > 20) {
            $text = substr($book['plot'], 0, 20);
            $text = $text . ' ...';
        } else {
            $text = $book['plot'];
        }
        echo $text;
    ?></p>
    <a href="/book/{{ $book['id'] }}" class="btn btn-info">viac</a>
</div>