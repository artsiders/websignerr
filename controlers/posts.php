<?php
session_start();
require_once "../Models/Posts.php";
$root = $_SERVER["DOCUMENT_ROOT"];
define("ASSETS_ROOT", "$root/websignerr/assets/");
$posts = new Posts;
// $datas = $posts->readAll();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'read':
            if (isset($_GET['id_post']) && !empty($_GET['id_post'])) {
                $id = (int) $_GET['id_post'];
                $post = $posts->read($id);
                echo json_encode($post);
            }
            break;
        case 'search':
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $post = $posts->readAllSearch($search);
                echo json_encode($post);
            }
            break;
        case 'delete':
            if (isset($_GET['id_post']) && !empty($_GET['id_post'])) {
                $id = (int) $_GET['id_post'];
                $post = $posts->delete($id);
                echo json_encode("supprimer");
            }
            break;
        case 'create':
            if (isset($_POST) && !empty($_POST)) {

                $resultArray = array(
                    "msg" => "",
                    "principal_item" => true,
                    "inputDescription" => true,
                    "isOk" => true,
                    "insertIsOk" => null
                );
                $descrition = htmlspecialchars($_POST['description']);


                if (empty($descrition)) {
                    $resultArray["inputDescription"] = false;
                    $resultArray["isOk"] = false;
                    $resultArray["msg"] = "renseignez une petite description sur la maison";
                }

                if (!empty($_FILES['principal_item']['name'])) {
                    $image_name = $_FILES['principal_item']['name'];
                    $file_tmp_name = $_FILES['principal_item']['tmp_name'];
                    move_uploaded_file($file_tmp_name, ASSETS_ROOT . "images/uploads/$image_name");

                    $resultArray["principal_item"] = true;
                } else {
                    $image_name = null;
                    $resultArray["principal_item"] = false;
                    $resultArray["isOk"] = false;
                    $resultArray["msg"] = "la premier image est obligatoire";
                }

                // auther images
                if (isset($_FILES['item1']['name']) and !empty($_FILES['item1']['name'])) {
                    $image_name1 = $_FILES['item1']['name'];
                    $file_tmp_name = $_FILES['item1']['tmp_name'];
                    move_uploaded_file($file_tmp_name, ASSETS_ROOT . "images/uploads/$image_name1");
                } else {
                    $image_name1 = "default.png";
                }
                if (isset($_FILES['item2']['name']) and !empty($_FILES['item2']['name'])) {
                    $image_name2 = $_FILES['item2']['name'];
                    $file_tmp_name = $_FILES['item2']['tmp_name'];
                    move_uploaded_file($file_tmp_name, ASSETS_ROOT . "images/uploads/$image_name2");
                } else {
                    $image_name2 = "default.png";
                }
                if (isset($_FILES['item3']['name']) and !empty($_FILES['item3']['name'])) {
                    $image_name3 = $_FILES['item3']['name'];
                    $file_tmp_name = $_FILES['item3']['tmp_name'];
                    move_uploaded_file($file_tmp_name, ASSETS_ROOT . "images/uploads/$image_name3");
                } else {
                    $image_name3 = "default.png";
                }
                // les donnees a passer en parametre de la methode create
                $data = array(
                    "post_description" => $descrition,
                    "principal_item" => $image_name,
                    "item1" => $image_name1,
                    "item2" => $image_name2,
                    "item3" => $image_name3
                );

                $idUser = $_SESSION['user']['id_user'];

                // si le formulair est bien rempli, j'envoie les information dans la base de donnée
                if ($resultArray['isOk']) {
                    try {
                        // ajout de la publication dans la base de donnee
                        $post = new Posts;
                        $post->create($idUser, $data);
                        $resultArray["insertIsOk"] = true;
                        $resultArray["msg"] = "votre chef d'oeuvre a été ajouter avec success :)";
                    } catch (Exception $e) {
                        $resultArray["insertIsOk"] = false;
                        $resultArray["msg"] = $e;
                    }
                }

                echo json_encode($resultArray);
            }
            break;

        case 'update':
            if (isset($_POST) && !empty($_POST)) {

                $resultArray = array(
                    "msg" => "",
                    "inputDescription" => true,
                    "isOk" => true,
                    "insertIsOk" => null
                );
                $descrition = htmlspecialchars($_POST['description']);
                $post = $posts->read($_GET['id_post']);


                if (empty($descrition)) {
                    $resultArray["inputDescription"] = false;
                    $resultArray["isOk"] = false;
                    $resultArray["msg"] = "renseignez une petite description sur la maison";
                }

                // les donnees a passer en parametre de la methode create
                $idPost = $_GET['id_post'];

                // si le formulair est bien rempli, j'envoie les information dans la base de donnée
                if ($resultArray['isOk']) {
                    try {
                        // ajout de la publication dans la base de donnee
                        $post = new Posts;
                        $post->update($idPost, $descrition);
                        $resultArray["insertIsOk"] = true;
                        $resultArray["msg"] = "votre chef d'oeuvre a été modifier avec success :)";
                    } catch (Exception $e) {
                        $resultArray["insertIsOk"] = false;
                        $resultArray["msg"] = $e;
                    }
                }

                echo json_encode($resultArray);
            }
            break;

        default:
            echo json_encode("nothing");
            break;
    }
}
