<?php
if (isset($_GET['id_user']) && !empty($_GET['id_user'])) :
    $idUser = (int) $_GET["id_user"];
    $user = new Users;
    $data = $user->read($idUser);
?>
    <div class="user_info">
        <div class="user_profil">
            <div>
                <div>
                    <img src=" <?= ASSETS . "images/profil/" . $data["picture"] ?> " alt="profil">
                </div>
            </div>
        </div>
        <form action="" id="formProfilView">
            <label for="">nom d'utitisateur</label>
            <input type="text" name="username" value="<?= $data["username"] ?>" disabled>
            <label for="">telephone</label>
            <input type="text" name="user_phone" value="<?= $data["user_phone"] ?>" disabled>
            <label for="">email</label>
            <input type="text" name="user_email" value="<?= $data["user_email"] ?>" disabled>
            <label for="">description</label>
            <textarea name="user_description" disabled><?= $data["user_description"] ?></textarea>
        </form>
    </div>

<?php endif; ?>