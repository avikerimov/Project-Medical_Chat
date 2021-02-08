<?php
session_start();

require '../app/assist.php';
 
$page_title = 'Asthma'; 
$header2 = 'Asthma <i class="fas fa-lungs-virus"></i>';
$back = '../';

$colorNavbar = $colorHeader2 = '#49b794';

$chat_name = 'asthma_chat';
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