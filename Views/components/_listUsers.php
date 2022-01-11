<?php
$users = new Users;
$datas = $users->readAll(4);
?>

<div class="list_users">
    <h2>utitlisateur</h2>
    <?php foreach ($datas as $key => $data) : ?>
        <div class="user" onclick="link(`./profils&id_user=<?= $data['id_user'] ?>`)">
            <div class="profil">
                <div>
                    <img src=" <?= ASSETS . "images/profil/" . $data['picture'] ?> " alt="profil">
                </div>
                <span><?= $data['username'] ?></span>
            </div>
        </div>
    <?php endforeach; ?>
    <button>liste complete <i class="fas fa-users"></i><sup>dev</sup></button>

</div>