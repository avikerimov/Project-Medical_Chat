<?php
session_start();

require '../app/assist.php';
 
$page_title = 'Migraine'; 
$header2 = 'migraine <i class="fas fa-head-side-virus"></i>';
$back = '../';

$colorNavbar = $colorHeader2 = '#752727';

$chat_name = 'migraine_chat';
?>

<?php require_once '../tpl/header.php'; ?>

<main>
    <div class="row">
        <div class="col-12 text-center">
            <?php require_once '../tpl/h1.php'; ?>
        </div>
    </div>
   <?php require_once '../chat.php' ?>
</main>
    
<?php require_once '../tpl/footer.php'; ?>