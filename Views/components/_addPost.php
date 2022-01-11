<div class="content_addpost hide" data-post="post">
    <form action="" id="addPost" enctype="multipart/form-data">
        <div class="close">X</div>
        <label for="principal_item" class="principal_item">
            <i class="far fa-image"></i>
            <input type="file" name="principal_item" accept="/*" onclick="previewImage();" id="principal_item">
            <img id="previewPrincipal" alt="">
        </label>

        <textarea name="description" placeholder="entrer la description complète de votre realisation"></textarea>
        <span>( optionnels )</span>
        <div class="items">
            <label for="item1">
                <i class="far fa-image"></i>
                <input type="file" name="item1" accept="/*" onclick="previewImage();" id="item1">
                <img id="preview2" alt="">
            </label>
            <label for="item2">
                <i class="far fa-image"></i>
                <input type="file" name="item2" accept="/*" onclick="previewImage();" id="item2">
                <img id="preview3" alt="">
            </label>
            <label for="item3">
                <i class="far fa-image"></i>
                <input type="file" name="item3" accept="/*" onclick="previewImage();" id="item3">
                <img id="preview4" alt="">
            </label>
        </div>
        <button type="submit" data-action="add">ajouter</button>
    </form>

</div>