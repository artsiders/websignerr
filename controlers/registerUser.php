<?php
session_start();
require_once "../Models/Connexion.php";

$connect = new Connexion;
$connect = $connect->getConnect();


if(isset($_POST) && !empty($_POST))
{

    $resultArray = array(
        "msg" => "",
        "username" => true,
        "user_login" => true,
        "user_email" => true,
        "user_pass" => true,
        "user_login_already" => true,
        "isOk" => true,
    );

    $username = htmlspecialchars($_POST["username"]);
    $userLogin  = htmlspecialchars($_POST["user_login"]);
    $email     = htmlspecialchars($_POST["user_email"]);
    $pass      = htmlspecialchars($_POST["user_pass"]);

    if(strlen($pass) < 6){
        $resultArray['user_pass'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "le mot de pass doit contenir minimum 6 carractère";
        // echo "<br>error_pass";
    }
    if(empty($pass)){
        $resultArray['user_pass'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entre un mot de passe s'il vous plait";
        // echo "<br>error_pass";
    }
    if(empty($email)){
        $resultArray['user_email'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "l'adresse Email est obligatoire";
        // echo "<br>email";
    }
    if(empty($userLogin)){
        $resultArray['user_login'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entrer un login svp";
        // echo "<br>user_login";
    }
    if(empty($username)){
        $resultArray['username'] = false;
        $resultArray['isOk'] = false;
        $resultArray['msg'] = "entrer votre nom complet";
        // echo "<br>error_username";
    }

    //je verifie si l'email exite déjà dans la bose de donnée____________________
    if(!empty($userLogin)){
        require_once "../Models/Users.php";
        $result = new Users;
        $result = $result->checkUser($userLogin);

        if($result){
            $resultArray['user_login_already'] = false;
            $resultArray['user_login'] = false;
            $resultArray['isOk'] = false;
            $resultArray['msg'] = "soyer original ! ce login est déjà pris";
        } 
        else { //si tout est OK on crypte le mot de pass
            $passCrypt = password_hash($pass, PASSWORD_DEFAULT);
        }
    }
    // END ________________________________________________________________________________

	// si le formulair est bien rempli, j'envoie les information dans la base de donnée
	if($resultArray['isOk']){
        $result = new Users;
        $result->createStart($_POST, $passCrypt);
	}
    echo json_encode($resultArray);


}