<?php
$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
$sqlSelect = "SELECT u.name, u.profile_image, c.* FROM $chat_name c
JOIN users u ON u.id = c.user_id
ORDER BY c.date DESC";

$resultSelect = mysqli_query($link, $sqlSelect);
?>

<?php if( mysqli_num_rows($resultSelect) > 0 ): ?>
            <div class="overflow">
                <?php while($post = mysqli_fetch_assoc($resultSelect)): ?>
                    <div class="card">
                        <div class="card-header">
                            <img src="<?= $back; ?>images/<?= $post['profile_image']; ?>" alt="Profile Picture" width="50" height="50" class="rounded-circle">
                            <span><b><?= htmlentities($post['name']); ?></b></span>
                            <span class="float-end"><i><?php date('d/m/Y H:i:s', strtotime($post['date'])); ?></i></span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlentities($post['title']); ?></h5>
                            <p class="card-text"><?= str_replace("\n", '<br>', htmlentities($post['article'])); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php require_once 'publish_chat.php' ?>
<?php else: ?>
        <div class="card">
            <div class="card-header">
                <p><b>There are no discussion about this topic yet</b></p>
            </div>
            <div class="card-body">
                <p>Be the first one to comment!</p>
            </div>
        </div>
        <?php require_once 'publish_chat.php' ?>
<?php endif; ?>