<?php
if (isset($_GET['id_user']) && !empty($_GET['id_user'])) :
    $idUser = (int) $_GET["id_user"];

    $posts = new Posts;
    $datas = $posts->readAllPostUser($idUser);
?>
    <div class="content_post_user">

        <?php foreach ($datas as $key => $data) : ?>
            <div class="card card_user">
                <div class="box_image" onclick="showPost('<?= $data['id_post'] ?>')" data-idPost="<?= $data['id_post'] ?>">
                    <img data-idPost="<?= $data['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $data['principal_item'] ?> " alt="illustration">
                </div>
                <p>
                    <?= $data['post_description'] ?>
                </p>
            </div>
        <?php endforeach; ?>

        <div class="pagination">

        </div>

    </div>

<?php endif; ?>