<?php
$posts = new Posts;
$comments = new Comments;
$datas = $posts->readAll();

$count = new Comments;
?>

<div class="content_card">

    <?php foreach ($datas as $key => $data) : ?>
        <div class="card card_home">
            <div class="box_image" data-idPost="<?= $data['id_post'] ?>">
                <div class="profil" onclick="link(`./profils&id_user=<?= $data['id_user'] ?>`)">
                    <div>
                        <img src=" <?= ASSETS . "images/profil/" . $data['picture'] ?> " alt="profil">
                    </div>
                    <span><?= $data['username'] ?></span>
                </div>
                <img onclick="showPost('<?= $data['id_post'] ?>')" data-idPost="<?= $data['id_post'] ?>" src=" <?= ASSETS . "images/uploads/" . $data['principal_item'] ?> " alt="illustration">
            </div>
            <div class="content_description">
                <p>
                    <?= $data['post_description'] ?>
                </p>
                <div class="buttons">
                    <button class="btn_like">
                        <i class="fas fa-heart"></i>
                    </button>
                    <button class="btn_dislike">
                        <i class="fas fa-angry"></i>
                    </button>
                    <button class="btn_comment" onclick="showPost('<?= $data['id_post'] ?>')">
                        <?php ($count->readCountForOnePost($data['id_post'])[0] != 0) ? $countComments = $count->readCountForOnePost($data['id_post'])[0] : $countComments = ''; ?>
                        <i class="fas fa-comment-dots"></i> <?= $countComments; ?>
                    </button>
                </div>
                <form action="" class="post_comment">
                    <input onfocus="showPost('<?= $data['id_post'] ?>')" type="text" name="comment" class="comment" placeholder="ajouter un commentaire">
                    <button type="button">
                        <i class="fas fa-comment-dots"></i>
                    </button>
                </form>
                <?php $comment = $comments->read($data['id_post']); ?>
                <?php if (!empty($comment)) : ?>
                    <div class="box_preview_comment">
                        <div class="preview_comment">
                            <img src="<?= ASSETS . "images/profil/" . $comment["picture"]; ?>">
                            <div class="comment">
                                <?= $comment["comment"]; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="pagination">

    </div>

</div>
<script>
    let btnlike = document.querySelectorAll(".btn_like");
    let btndislike = document.querySelectorAll(".btn_dislike");

    let btn = [...btnlike, ...btndislike]
    btn.forEach(element => {
        if (element.getAttribute("class") == "btn_like") {
            element.innerHTML += Math.floor(Math.random() * 20)
        } else {
            element.innerHTML += Math.floor(Math.random() * 10)
        }
    });
</script>