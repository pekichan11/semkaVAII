<?php 
    $random = rand(1, 300);
?>
<div class="">

    <img src="https://picsum.photos/id/<?= $random ?>/200/300" alt="">
    <h3>{{ $book['title'] }}</h3>
    <p>{{ $book['plot'] }}</p>
    <a href="#" class="btn btn-info">viac</a>
    <a href="#" class="btn btn-success">objednaj</a>
</div>