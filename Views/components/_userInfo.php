<div class="user_info">
    <div class="user_profil">
        <div>
            <a href=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["picture"] ?> " data-lightbox="mygallery" data-title="<?= $_SESSION["user"]["username"] ?>">
                <img src=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["picture"] ?> " alt="profil">
            </a>
            <button type="button" id="btnEditPic">
                <i class="fas fa-edit"></i>
            </button>
        </div>
    </div>
    <form action="" id="formProfilView">
        <input type="text" name="username" value="<?= $_SESSION["user"]["username"] ?>" disabled>
        <input type="text" name="user_phone" value="<?= $_SESSION["user"]["user_phone"] ?>" disabled>
        <input type="text" name="user_email" value="<?= $_SESSION["user"]["user_email"] ?>" disabled>
        <textarea name="user_description" disabled><?= $_SESSION["user"]["user_description"] ?></textarea>
        <button type="button" id="btnUpdateProfil">Modifier le profil
            <i class="fas fa-user-edit"></i>
        </button>
    </form>
    <form action="" id="formProfilUpdate">
        <legend>Modifier ton profil</legend>
        <label for="">Nom d'utilisateur</label>
        <input type="text" name="username" value="<?= $_SESSION["user"]["username"] ?>">
        <label for="">Numéro de téléphone</label>
        <input type="text" name="user_phone" value="<?= $_SESSION["user"]["user_phone"] ?>">
        <label for="">Adresse Email</label>
        <input type="text" name="user_email" value="<?= $_SESSION["user"]["user_email"] ?>">
        <label for="">Description</label>
        <textarea name="user_description"><?= $_SESSION["user"]["user_description"] ?></textarea>

        <a href="#">Modifier vos identifiant ?</a>

        <button type="submit" id="btnUpdateProfil">Enregistrer
            <i class="fas fa-user-edit"></i>
        </button>
    </form>
</div>
<script>
    let btnEditPic = document.getElementById("btnEditPic");

    btnEditPic.addEventListener("click", e => {
        e.preventDefault()
        formUpdatePicture.style.display = "flex";
    })
</script>