<?php
$user = new Users;
$data = $user->readAll();
?>

<div class="user_table">
    <h2>Administrateurs</h2>

    <div class="table_post">
        <div class="thead admin">
            <div class="id"><i class="fas fa-sort-numeric-down"></i></div>
            <div>name</div>
            <div class="id"><i class="fas fa-key"></i></div>
            <div>Email</div>
            <div>phone</div>
            <div>login</div>
            <div>description</div>
            <div class="img"><i class="fas fa-image"></i></div>
            <div class="img"><i class="fas fa-images"></i></div>
            <div class="id"><i class="far fa-file-pdf"></i></div>
            <div>join date</div>
        </div>
        <?php foreach ($data as $key => $value) : ?>
            <?php if ($value["statut"] == "Admin") { ?>
                <div class="tbody">
                    <div class="id"><?= $key ?></div>
                    <div><?= $value["username"] ?></div>
                    <div class="id"><?= $value["id_user"] ?></div>
                    <div><?= $value["user_email"] ?></div>
                    <div><?= $value["user_phone"] ?></div>
                    <div><?= $value["user_login"] ?></div>
                    <div><?= $value["user_description"] ?></div>
                    <div class="img">
                        <img data-idPost="<?= $value['id_user'] ?>" src=" <?= ASSETS . "images/profil/" . $value['picture'] ?> " alt="illustration">
                    </div>
                    <div class="img">
                        <img data-idPost="<?= $value['id_user'] ?>" src=" <?= ASSETS . "images/profil/" . $value['cover'] ?> " alt="illustration">
                    </div>
                    <div class="id"><i class="fas fa-download" onclick="link(this, '<?= ASSETS . 'images/profil/' . $value['user_cv'] ?>')"></i></div>
                    <div><?= $value["join_date"] ?></div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>

    <h2>Liste d'Utilisateurs</h2>

    <div class="table_post">
        <div class="thead">
            <div class="id"><i class="fas fa-sort-numeric-down"></i></div>
            <div>name</div>
            <div class="id"><i class="fas fa-key"></i></div>
            <div>Email</div>
            <div>phone</div>
            <div>login</div>
            <div>description</div>
            <div class="img"><i class="fas fa-image"></i></div>
            <div class="img"><i class="fas fa-images"></i></div>
            <div class="id"><i class="far fa-file-pdf"></i></div>
            <div>join date</div>
            <div class="action">action</div>
        </div>
        <?php foreach ($data as $key => $value) : ?>
            <?php if ($value["statut"] != "Admin") { ?>
                <div class="tbody">
                    <div class="id"><?= $key ?></div>
                    <div><?= $value["username"] ?></div>
                    <div class="id"><?= $value["id_user"] ?></div>
                    <div><?= $value["user_email"] ?></div>
                    <div><?= $value["user_phone"] ?></div>
                    <div><?= $value["user_login"] ?></div>
                    <div><?= $value["user_description"] ?></div>
                    <div class="img">
                        <img data-idPost="<?= $value['id_user'] ?>" src=" <?= ASSETS . "images/profil/" . $value['picture'] ?> " alt="illustration">
                    </div>
                    <div class="img">
                        <img data-idPost="<?= $value['id_user'] ?>" src=" <?= ASSETS . "images/profil/" . $value['cover'] ?> " alt="illustration">
                    </div>
                    <div class="id"><i class="fas fa-download" onclick="//link(this, '<?php //echo ASSETS . 'images/profil/' . $value['user_cv'] 
                                                                                        ?>')"></i></div>
                    <div><?= $value["join_date"] ?></div>
                    <div class="action">
                        <i title="suprimmer" onclick="deleteUser('<?= $value['id_user'] ?>', '<?= $value['username'] ?>')" class="fas fa-trash-alt"></i> | <i title="contacter" class="fab fa-telegram"></i>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function deleteUser(iduser, username) {
        const conf = confirm(`voulez vous réelement suprimer ${username}`);
        conf ? link(`dashboard&action_admin=deleteUser&id=${iduser}`) : console.log('')
    }
</script>