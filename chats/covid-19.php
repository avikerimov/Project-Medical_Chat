<?php
session_start();

require '../app/assist.php';
 
$page_title = 'COVID-19'; 
$header2 = 'COVID-19 <i class="fas fa-virus"></i>';
$back = '../';

$colorNavbar = $colorHeader2 = '#A1A75B';
$colorHeader1 = '#dddd2a';

$chat_name = 'covid_chat';
?>

<?php require_once '../tpl/header.php'; ?>

<main>
    <div class="row">
        <div class="col-12 text-center">
            <?php require_once '../tpl/h1.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php require_once '../chat.php' ?>
        </div>
        <div class="col-lg-6">
            <ul class="list-group">
                <div class="mt-2">
                    <li class="list-group-item">How can I prevent COVID-19?</li>
                    <li class="list-group-item list-group-item-success">
                        The best way to prevent illness is to avoid being exposed to the virus. The CDC recommends everyday preventive actions to help prevent the spread of respiratory diseases. They include: 
                        <ul>
                            <li><b>Wash your hands</b> often with plain soap and water. The CDC recommends washing your hands often with soap and water for at least 20 seconds, especially after you have been in a public place, or after blowing your nose, coughing, or sneezing. If soap and water are not available, the CDC recommends using an alcohol-based hand sanitizer that contains at least 60 percent alcohol.</li>

                            <li><b>Cover your mouth and nose</b> with a cloth face covering or non-surgical mask when around others. Find more information about how to select, wear, and clean your mask.</li>

                            <li><b>Avoid crowds and practice social distancing</b> (stay at least 6 feet apart from others).</li>
                        </ul>
                    </li>
                </div>
                <div class="mt-2">
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item list-group-item-success">A simple success list group item</li>
                </div>
                <div class="mt-2">
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item list-group-item-success">A simple success list group item</li>
                </div>
        </ul>
        </div>
    </div>
</main>
<?php require_once '../tpl/footer.php'; ?>