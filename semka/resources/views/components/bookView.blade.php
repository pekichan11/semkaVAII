<div class="bookView">
    <div class="img">
        <img src="{{ $book['img'] }}" alt="">
    </div>
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
    <a href="#" class="btn btn-success">pozicaj</a>
</div>