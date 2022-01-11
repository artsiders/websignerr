<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= ASSETS ?>images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS ?>css/index.css">
    <link rel="stylesheet" href="<?= ASSETS ?>fonts/font-awesome-pro-master/css/all.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/lightbox.min.css">
    <link rel="manifest" href="<?= RACINE ?>manifest.json">
    <!-- PWA -->
    <meta name="theme-color" content="white">
    <title>Websignerr/profil</title>
    <?php
    if (isset($_GET['id_user']) && !empty($_GET['id_user'])) :
        $idUser = (int) $_GET["id_user"];
        $user = new Users;
        $data = $user->read($idUser);
    ?>
        <style>
            .user_cover .cover {
                background-image: url(<?= ASSETS . "images/profil/" . $data["cover"] ?>);
            }
        </style>
    <?php endif; ?>
</head>

<body onload="ready();" class="body">
    <?php include VIEW . "components/_loader.php"; ?>
    <?php include VIEW . "components/_post.php"; ?>
    <?php include VIEW . "components/_bulleMessage.php" ?>
    <?php include VIEW . "components/_addPost.php"; ?>
    <main id="root">
        <header>
            <?php include VIEW . "components/_topBar.php" ?>
        </header>
        <div class="bannier user_cover">
            <div class="cover">
                <div class="box_etiquete">
                    <div class="etiquete">
                        <h2>websignerr</h2>
                        <p>the freelance for the future</p>
                    </div>
                </div>
            </div>
        </div>
        <section class="section_profil">
            <aside>
                <div class="aside">
                    <?php include VIEW . "components/_autherUserInfo.php" ?>
                </div>
            </aside>
            <article>
                <?php include VIEW . "components/_autherUserPost.php" ?>
            </article>
        </section>
        <footer>
            <?php include VIEW . "components/_footer.php" ?>
        </footer>
    </main>
</body>

<script src="<?= ASSETS ?>js/ajax.fetch.js"></script>
<script src="<?= ASSETS ?>js/switchTheme.js"></script>
<script src="<?= ASSETS ?>js/app.js"></script>
<script src="<?= ASSETS ?>js/lightbox-plus-jquery.min.js"></script>
<script>
    function editCover() {
        formUpdateCover.style.display = "flex";
    }
</script>


</html>