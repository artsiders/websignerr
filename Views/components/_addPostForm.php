<div class="add_post">
    <div class="profil">
        <div onclick="link('profil')">
            <img src=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["picture"] ?> " alt="profil">
        </div>
        <input onclick="createPost()" type="text" placeholder="exprime ta creativité">
        <i class="fas fa-image"></i>
    </div>

</div>