<?php
$posts = new Posts;
$datas = $posts->readAllPostUser($_SESSION["user"]["id_user"]);
?>
<div class="content_post_user">

    <?php foreach ($datas as $key => $data) : ?>
        <div class="card card_user">
            <div class="box_image" onclick="showPost('<?= $data['id_post'] ?>')" data-idPost="<?= $data['id_post'] ?>">
                <img data-idPost="<?= $data['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $data['principal_item'] ?> " alt="illustration">
            </div>
            <div class="action">
                <button class="edit" onclick="updatePost(<?= $data['id_post'] ?>)">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="delete" data-idPost="<?= $data['id_post'] ?>">
                    <i class="fas fa-trash-alt" data-idPost="<?= $data['id_post'] ?>"></i>
                </button>
            </div>
            <p>
                <?= $data['post_description'] ?>
            </p>
        </div>
    <?php endforeach; ?>

    <div class="pagination">

    </div>

</div>