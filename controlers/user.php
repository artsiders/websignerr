<?php
session_start();
require_once "../Models/Users.php";
$root = $_SERVER["DOCUMENT_ROOT"];
define("ASSETS_ROOT", "$root/websignerr/assets/");

@$action = $_GET["action"];

if ($action == "user_info") {
    if (isset($_POST) && !empty($_POST)) {

        $resultArray = array(
            "msg" => "",
            "username" => true,
            "isOk" => true,
            "insertIsOk" => null
        );
        $username = htmlspecialchars($_POST['username']);
        $descrition = htmlspecialchars($_POST['user_description']);
        $email = htmlspecialchars($_POST['user_email']);
        $phone = htmlspecialchars($_POST['user_phone']);


        if (empty($username)) {
            $resultArray["username"] = false;
            $resultArray["isOk"] = false;
            $resultArray["msg"] = "le nom d'utillisateur ne peut pas être vide";
        }

        // les donnees a passer en parametre de la methode create
        $data = array(
            "username" => $username,
            "user_email" => $email,
            "user_phone" => $phone,
            "user_description" => $descrition
        );

        $idUser = $_SESSION['user']['id_user'];

        // si le formulair est bien rempli, j'envoie les information dans la base de donnée
        if ($resultArray['isOk']) {
            try {
                // ajout de la publication dans la base de donnee
                $user = new Users;
                $user->update($idUser, $data);

                $_SESSION["user"] = $user->read($idUser);

                $resultArray["insertIsOk"] = true;
                $resultArray["msg"] = "vos information ont été modifier avec success :)";
            } catch (Exception $e) {
                $resultArray["insertIsOk"] = false;
                $resultArray["msg"] = $e;
            }
        }

        echo json_encode($resultArray);
    }
} else if ($action == "updatePic") {
    if (isset($_FILES) && !empty($_FILES)) {

        $resultArray = array(
            "msg" => "",
            "picture" => true,
            "isOk" => true,
            "insertIsOk" => null
        );

        if (!empty($_FILES['picture']['name'])) {
            $image_name = $_FILES['picture']['name'];
            $file_tmp_name = $_FILES['picture']['tmp_name'];
            move_uploaded_file($file_tmp_name, ASSETS_ROOT . "images/profil/$image_name");

            $resultArray["picture"] = true;
        } else {
            $image_name = null;
            $resultArray["picture"] = false;
            $resultArray["isOk"] = false;
            $resultArray["msg"] = "vous n'avez pas selectionner d'image";
        }

        $idUser = $_SESSION['user']['id_user'];

        // si le formulair est bien rempli, j'envoie les information dans la base de donnée
        if ($resultArray['isOk']) {
            try {
                // ajout de la publication dans la base de donnee
                $user = new Users;
                $user->updatePicture($idUser, $image_name);
                $resultArray["insertIsOk"] = true;
                $resultArray["msg"] = "votre chef d'oeuvre a été ajouter avec success :)";

                $_SESSION["user"] = $user->read($idUser);
            } catch (Exception $e) {
                $resultArray["insertIsOk"] = false;
                $resultArray["msg"] = $e;
            }
        }
    }
    echo json_encode($resultArray);
} else if ($action == "updateCover") {
    if (isset($_FILES) && !empty($_FILES)) {

        $resultArray = array(
            "msg" => "",
            "cover" => true,
            "isOk" => true,
            "insertIsOk" => null
        );

        if (!empty($_FILES['cover']['name'])) {
            $image_name = $_FILES['cover']['name'];
            $file_tmp_name = $_FILES['cover']['tmp_name'];
            move_uploaded_file($file_tmp_name, ASSETS_ROOT . "images/profil/$image_name");

            $resultArray["cover"] = true;
        } else {
            $image_name = null;
            $resultArray["cover"] = false;
            $resultArray["isOk"] = false;
            $resultArray["msg"] = "vous n'avez pas selectionner d'image";
        }

        $idUser = $_SESSION['user']['id_user'];

        // si le formulair est bien rempli, j'envoie les information dans la base de donnée
        if ($resultArray['isOk']) {
            try {
                // ajout de la publication dans la base de donnee
                $user = new Users;
                $user->updateCover($idUser, $image_name);
                $resultArray["insertIsOk"] = true;
                $resultArray["msg"] = "votre bannier a été mise à jour";

                $_SESSION["user"] = $user->read($idUser);
            } catch (Exception $e) {
                $resultArray["insertIsOk"] = false;
                $resultArray["msg"] = $e;
            }
        }
    }
    echo json_encode($resultArray);
}
