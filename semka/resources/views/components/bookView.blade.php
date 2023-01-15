<?php 
    $random = rand(1, 300);
?>
<div class="bookView">
    <div class="img">
        <img src="https://picsum.photos/id/<?= $random ?>/100/200" alt="">
    </div>
    <h3>{{ $book['title'] }}</h3>
    <p>{{ $book['plot'] }}</p>
    <a href="#" class="btn btn-info">viac</a>
    <a href="#" class="btn btn-success">objednaj</a>
</div>