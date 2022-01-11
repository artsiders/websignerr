<form action="" id="formUpdatePicture" data-post="post">
    <div>
        <div class="close">X</div>
        <label for="inputPicture">
            <i class="fa fa-upload"></i>
            <input type="file" name="picture" hidden accept="/*" onclick="previewImageProfil();" id="inputPicture">
            <img id="previewProfil" src=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["picture"] ?> " alt="profil">
        </label>
        <button type="submit"> enregistrer
            <i class="fab fa-telegram-plane"></i>
        </button>
    </div>
</form>

<script src="<?= ASSETS ?>js/updateUserPicture.js"></script>