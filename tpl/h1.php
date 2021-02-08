<style>
    .mainHeader{
        color: <?= $headerColor ?>;
    }
    .colorHeader1{
        color: <?= $colorHeader1 ?>;
    }
    .colorHeader2{
        color: <?= $colorHeader2 ?>;
    }

    .colorHeart{
        color: #f70945;
    }
</style>

<h1 class="mainHeader mt-3">
    <?php if( isset($header1) ): ?>
        <span class="colorHeader1"><?= $header1 ?></span>
    <?php else: ?>
        <span class="colorHeader1"><?= 'Medical '; ?><i class="fa fa-heartbeat colorHeart"></i><?= ' Chat'; ?></span>
    <?php endif; ?>
    <hr>
    <?php if( isset($header2) ): ?>
        <span class="colorHeader2"><?= $header2 ?></span>
    <?php endif; ?>
</h1>