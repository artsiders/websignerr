<?php
$user = new Users;
$post = new Posts;
$comment = new Comments;
$userCount = $user->readCount()[0];
$postCount = $post->readCount()[0];
$countComment = $comment->readCount()[0];
?>

<div class="content_stat">
    <div class="count_user">
        <?= $userCount; ?>
        <span>Utilisateurs</span>
    </div>
    <div class="count_post">
        <?= $postCount; ?>
        <span>publications</span>
    </div>
    <div class="count_commnet">
        <?= $countComment; ?>
        <span>commentaires</span>
    </div>
</div>