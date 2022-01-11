<form action="" id="formUpdateCover" data-post="post">
    <div>
        <div class="close">X</div>
        <label for="inputCover">
            <i class="fa fa-upload"></i>
            <input type="file" name="cover" hidden accept="/*" onclick="previewImageProfil();" id="inputCover">
            <img id="previewCover" src=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["cover"] ?> " alt="profil">
        </label>
        <button type="submit"> enregistrer
            <i class="fab fa-telegram-plane"></i>
        </button>
    </div>
</form>

<script src="<?= ASSETS ?>js/updateUserCover.js"></script>