<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= ASSETS ?>images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS ?>css/index.css">
    <link rel="stylesheet" href="<?= ASSETS ?>fonts/font-awesome-pro-master/css/all.css">
    <link rel="manifest" href="<?= RACINE ?>manifest.json">
    <link rel="stylesheet" href="<?= ASSETS ?>css/lightbox.min.css">
    <!-- PWA -->
    <meta name="theme-color" content="white">
    <title>Websignerr</title>
</head>

<body onload="ready();" class="body">
    <?php include VIEW . "components/_loader.php"; ?>
    <?php include VIEW . "components/_post.php"; ?>
    <?php include VIEW . "components/_addPost.php"; ?>
    <?php include VIEW . "components/_bulleMessage.php" ?>
    <main id="root">
        <header>
            <?php include VIEW . "components/_topBar.php" ?>
        </header>
        <div class="bannier">
            <div class="cover">
                <div class="box_etiquete">
                    <div class="etiquete">
                        <img src="<?= ASSETS ?>images/grand-logo-websignerr.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <section>
            <aside>
                <div class="aside">
                    <?php include VIEW . "components/_addPostForm.php" ?>
                    <?php include VIEW . "components/_listUsers.php" ?>
                </div>
            </aside>
            <article>
                <?php include VIEW . "components/_cards.php" ?>
            </article>
            <aside class="infos">
                <div class="info">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium modi ipsum non molestiae fuga. Cumque rerum similique accusantium, autem inventore nam aut odit, qui at soluta, dolor adipisci reprehenderit placeat.
                </div>
            </aside>
        </section>
        <footer>
            <?php include VIEW . "components/_footer.php" ?>
        </footer>
    </main>
</body>

<script src="<?= ASSETS ?>js/ajax.fetch.js"></script>
<script src="<?= ASSETS ?>js/switchTheme.js"></script>
<script src="<?= ASSETS ?>js/lightbox-plus-jquery.min.js"></script>
<script src="<?= ASSETS ?>js/app.js"></script>
<script>
    localStorage.setItem("id_user", "<?= $_SESSION["user"]["id_user"] ?>")
    localStorage.setItem("picture", "<?= $_SESSION["user"]["picture"] ?>")
</script>


</html>