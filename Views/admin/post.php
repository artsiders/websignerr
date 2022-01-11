<?php
$post = new Posts;
$data = $post->readAll();
?>

<div class="post_table">
    <h2>liste des post</h2>

    <div class="table_post">
        <div class="thead">
            <div class="id"><i class="fas fa-sort-numeric-down"></i></div>
            <div class="img"><i class="fas fa-image"></i></div>
            <div class="id"><i class="fas fa-key"></i></div>
            <div>description</div>
            <div class="img"><i class="fas fa-images"></i></div>
            <div class="img"><i class="fas fa-images"></i></div>
            <div class="img"><i class="fas fa-images"></i></div>
            <div>add date</div>
            <div class="id"><i class="fas fa-user"></i></div>
            <div class="action">action</div>
        </div>
        <?php foreach ($data as $key => $value) : ?>
            <div class="tbody">
                <div class="id"><?= $key ?></div>
                <div class="img">
                    <img data-idPost="<?= $value['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $value['principal_item'] ?> " alt="illustration">
                </div>
                <div class="id"><?= $value["id_post"] ?></div>
                <div><?= $value["post_description"] ?></div>
                <div class="img">
                    <img data-idPost="<?= $value['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $value['item1'] ?> " alt="illustration">
                </div>
                <div class="img">
                    <img data-idPost="<?= $value['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $value['item2'] ?> " alt="illustration">
                </div>
                <div class="img">
                    <img data-idPost="<?= $value['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $value['item3'] ?> " alt="illustration">
                </div>
                <div><?= $value["add_date"] ?></div>
                <div class="id"><?= $value["id_user"] ?></div>
                <div class="action">
                    <i class="fas fa-trash-alt" onclick="deletePost('<?= $value['id_post'] ?>')"></i> | <i class="fab fa-telegram"></i>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function deletePost(idpost) {
        const conf = confirm(`voulez vous réelement suprimer cette publication ?`);
        conf ? link(`dashboard&action_admin=deletePost&id=${idpost}`) : console.log('')
    }
</script>