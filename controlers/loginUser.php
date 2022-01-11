<?php
session_start();
require_once "../Models/Connexion.php";

$connect = new Connexion;
$connect = $connect->getConnect();


if (isset($_POST) and !empty($_POST)) {
    $resultArray = array(
        "msg" => "",
        "input_login" => "",
        "input_pass" => "",
        "isOk" => false
    );

    $userLogin = $_POST["user_login"];
    $userPass = $_POST["user_pass"];

    if (empty($userLogin)) {
        $resultArray['msg'] = "entrer votre login";
        $resultArray['input_login'] = false;
    } else if (empty($userPass)) {
        $resultArray['msg'] = "entrer votre mot de pass";
        $resultArray['input_pass'] = false;
    } else {
        require_once "../Models/Users.php";
        $result = new Users;
        $result = $result->checkUser($userLogin);

        if ($result) {
            // verification du mot de passe
            if (password_verify($userPass, $result["user_pass"])) {
                $_SESSION['user']  = $result;
                $resultArray['isOk'] = true;
            } else {
                $resultArray['msg'] = "mot de passe incorrect :(";
                $resultArray['input_pass'] = false;
            }
            $resultArray['input_login'] = true;
        } else {
            $resultArray['msg'] = "le compte n'exite pas :(";
            $resultArray['input_login'] = false;
        }
    }
    echo json_encode($resultArray);
}
