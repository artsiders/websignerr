<?php

if (isset($_GET["action_admin"]) && !empty($_GET["action_admin"])) {
    $actionAdmin = $_GET["action_admin"];

    if ($actionAdmin == "list_user") {
        include VIEW . "admin/user.php";
    } else if ($actionAdmin == "list_post") {
        include VIEW . "admin/post.php";
    } else if ($actionAdmin == "stat") {
        include VIEW . "admin/statistique.php";
    } else if ($actionAdmin == "deleteUser") {
        try {
            $id = (int) $_GET['id'];
            $user = new Users;
            $user->delete($id);
            header("location: dashboard");
        } catch (EXCEPTION $e) {
            echo "<script>alert('erreur avec la base de donnee ou le model')</script>";
            include VIEW . "admin/user.php";
        }
    } else if ($actionAdmin == "deletePost") {
        try {
            $id = (int) $_GET['id'];
            $post = new Posts;
            $post->delete($id);
            header("location: dashboard&action_admin=list_post");
        } catch (EXCEPTION $e) {
            echo "<script>alert('erreur avec la base de donnee ou le model')</script>";
            include VIEW . "admin/user.php";
        }
    }
} else {
    include VIEW . "admin/user.php";
}
