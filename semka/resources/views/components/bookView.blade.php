<?php 
    $random = rand(1, 300);
?>
<div class="bookView">
    <div class="img">
        <img src="https://picsum.photos/id/<?= $random ?>/100/150" alt="">
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
    <a href="#" class="btn btn-info">viac</a>
    <a href="#" class="btn btn-success">objednaj</a>
</div>