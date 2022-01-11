<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= ASSETS ?>images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS ?>css/index.css">
    <link rel="stylesheet" href="<?= ASSETS ?>fonts/font-awesome-pro-master/css/all.css">
    <link rel="manifest" href="<?= RACINE ?>manifest.json">
    <!-- PWA -->
    <meta name="theme-color" content="white">
    <title>Websignerr/dashboard</title>
</head>

<body>
    <?php require_once "_config.php"; ?>
    <?php include VIEW . "admin/_navigation.php"; ?>
    <div id="dashboard">
        <?php include VIEW . "admin/dashboard.php"; ?>
    </div>

    <script src="<?= ASSETS ?>js/app.js"></script>
    <script src="<?= ASSETS ?>js/admin.js"></script>
    <script>
        if (window.matchMedia("(max-width: 700px)").matches) {
            alert("cette page n'est pas optimiser pour les appareils mobile !")
        }
        //test de function asynchrone
        // const cool = async =>alert('')
        // console.log("cool");
        // cool()
    </script>
</body>

</html>