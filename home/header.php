<?php
    $pictures = ['mainPic1', 'mainPic2', 'mainPic3'];
    $length = count($pictures);
?>
<div class="imgContainer">
    <h1 class="mainTitle text-warning">Medical <i class="fa fa-heartbeat"></i> Chat</h1>
    <img class="img-fluid imgMain" src="images/<?= $pictures[rand(0,$length-1)]; ?>.jpg" alt="">
</div>
