<?php
session_start();
require_once 'app/assist.php';

$back = './';

$page_title = 'Q/A Chat';

$chats = [
    'COVID-19' => 'chats/covid-19.php', 'Migraine' => 'chats/migraine.php', 'Asthma' => 'chats/asthma.php'
];
ksort($chats);
?>

<?php require_once 'tpl/header.php' ?>

<main>
    <div class="row">
        <div class="col-12 text-center">
            <?php require_once 'tpl/h1.php' ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="column-3">
                <?php foreach($chats as $key => $value): ?>
                    <li><a href="<?= $value; ?>"><?= $key; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    

</main>
    
<?php require_once 'tpl/footer.php' ?>