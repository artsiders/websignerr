<?php
$posts = new Posts;
$datas = $posts->readAll();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Image Gallery</title>
    <meta name="description" content="Responsive Image Gallery">
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">
    <meta name="author" content="Tim Wells">

    <style type="text/css"> </style>
</head>

<body>
    <div id="gallery">
        <?php foreach ($datas as $key => $data) : ?>
            <!-- <img src="images/image-001.jpg"> -->
            <img src=" <?= ASSETS . "images/uploads/" . $data['principal_item'] ?>">

        <?php endforeach; ?>
    </div>

</body>

</html>