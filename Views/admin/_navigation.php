<?php
if (isset($_GET['action_admin']) && !empty($_GET['action_admin'])) {
    if ($_GET['action_admin'] == "stat") {
        $active1 = "";
        $active2 = "";
        $active3 = "active";
    } else if ($_GET['action_admin'] == "list_post") {
        $active1 = "";
        $active2 = "active";
        $active3 = "";
    } else if ($_GET['action_admin'] == "list_user") {
        $active1 = "active";
        $active2 = "";
        $active3 = "";
    } else {
        $active1 = "";
        $active2 = "";
        $active3 = "";
    }
} else {
    $active1 = "active";
    $active2 = "";
    $active3 = "";
}
?>

<div class="navigation_board">
    <button data-href="list_user" class="<?= $active1; ?>">utitilisateur <i class="fas fa-user"></i></button>
    <button data-href="list_post" class="<?= $active2; ?>">publications <i class="fas fa-file"></i></button>
    <button data-href="stat" class="<?= $active3; ?>">statistique <i class="fas fa-chart-bar"></i></button>
    <div class="espace"></div>
    <div class="home" onclick="link('home')">
        <img src=" <?= ASSETS . "images/logo-websignerr.svg" ?> " alt="W">
    </div>
</div>
<script>
    let btn = document.querySelectorAll(".navigation_board button");

    btn.forEach(element => {
        element.addEventListener("click", e => {
            let href = e.target.dataset.href;
            location.assign(`dashboard&action_admin=${href}`)
        })
    });
</script>