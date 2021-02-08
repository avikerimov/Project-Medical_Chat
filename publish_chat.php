<?php
$errors = [ 'title' => '', 'article' => '', ];

if( isset($_POST['submit']) ){
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $title = trim($title);
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $article = trim($article);
    $form_valid = true;
    
    if( ! $title || mb_strlen($title) < 2 || mb_strlen($title) > 255 ){
        $errors['title'] = 'A valid title is required!';
        $form_valid = false;
    }
    
    if( ! $article || mb_strlen($article) < 2 ){
        $errors['article'] = 'A qustion/answer must be writen';
        $form_valid = false;
    }
    
    
    
    if($form_valid){
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
        $title = mysqli_real_escape_string($link, $title);
        $article = mysqli_real_escape_string($link, $article);
        $u_id = $_SESSION['user_id'];
        $sqlInsert = "INSERT INTO $chat_name VALUES(null, $u_id, '$title', '$article', NOW())";
        $resultInsert = mysqli_query($link, $sqlInsert);

        if($resultInsert && mysqli_affected_rows($link) > 0){
            header("location: $page_title.php");
        }
    }
}
?>
<div class="publishContainer border mt-2">
    <?php if(!isset($_SESSION['user_id'])): ?>
        <div class="col-12 text-center">
            <p>
                Want to add a comment or ask somethin? <br>
                Having answer for all the qustion's in this title? <br>
                <a class="btn btn-outline-primary" href="../login.php">Signin</a> or <a class="btn btn-outline-primary" href="../register.php">Create Free Account</a>
            </p>
        </div>
    <?php else: ?>
        <div class="col-12">
            <h5 class="text-center">Post / Answer a Qustion</h5>
            <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                <label class="d-none" for="title">Title</label>
                <input type="text" value="<?= holder_field_data('title'); ?>" name="title" id="title" class="form-control" placeholder="Title">
                <span class="text-danger"><?= $errors['title']; ?></span>
                <label class="d-none" for="article">Type your Qustion/Answer</label>
                <textarea type="text" name="article" id="article" class="form-control" placeholder="Type your Qustion/Answer" rows="5"><?= holder_field_data('article'); ?></textarea>
                <span class="text-danger"><?= $errors['article']; ?></span>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Post</button>                    
                </div>
            </form>
        </div>        
    <?php endif; ?>
</div>