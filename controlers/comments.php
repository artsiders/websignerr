<?php
session_start();
require_once "../Models/Comments.php";
// $datas = $posts->readAll();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    isset($_GET["id_post"]) ? $idPost = $_GET["id_post"] : $idPost = null;
    $idUser = $_SESSION["user"]["id_user"];

    if ($action == "read") {
        $comment = new Comments;
        $comments = $comment->readAll($idPost);
        if (!empty($comments)) {
            echo json_encode($comments);
        } else {
            echo json_encode("empty");
        }
    } else if ($action == "create") {
        $resultArray = array(
            "msg" => "",
            "comment" => true,
            "insertIsOk" => null
        );
        if (isset($_POST["comment"]) && !empty($_POST["comment"])) {
            $resultArray["comment"] = true;
            try {
                $comment = new Comments;
                $comment->create($idUser, $idPost, $_POST);
                (int) $idComment = $comment->readLast($idPost);

                $resultArray["msg"] = "message ajouter";
                $resultArray["insertIsOk"] = true;
                $resultArray["comment"] = $_POST["comment"];
                $resultArray["id_comment"] = $idComment["id_comment"];

                echo json_encode($resultArray);
            } catch (Exception $e) {
                $resultArray["msg"] = $e;
                $resultArray["insertIsOk"] = false;
                echo json_encode($resultArray);
            }
        } else {
            $resultArray["msg"] = "le commentaire est vide";
            $resultArray["insertIsOk"] = false;
            $resultArray["comment"] = false;
            echo json_encode($resultArray);
        }
    } else if ($action == "delete") {
        if (isset($_GET['id_comment']) && !empty($_GET['id_comment'])) {
            $idComment = (int) $_GET['id_comment'];
            $comment = new Comments;
            $comment->delete($idComment);
            echo json_encode("supprimer");
        }
    }
}
