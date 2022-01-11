<?php
class Routeur
{
    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function renderController()
    {

        if ($this->request == "home" || $this->request == "") {
            if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
                include VIEW . "home.php";
            } else {
                include VIEW . "formulaire.php";
            }
        } else if ($this->request == "profil") {
            if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
                include VIEW . "profil.php";
            } else {
                include VIEW . "formulaire.php";
            }
        } else if ($this->request == "login") {
            if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
                include VIEW . "home.php";
            } else {
                include VIEW . "formulaire.php";
            }
        } else if ($this->request == "profils") {
            if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
                if ($_GET["id_user"] == $_SESSION["user"]["id_user"]) {
                    include VIEW . "profil.php";
                } else {
                    include VIEW . "profilAutherUsers.php";
                }
            } else {
                include VIEW . "formulaire.php";
            }
        } else if ($this->request == "dashboard") {
            if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {

                if ($_SESSION['user']['statut'] == "Admin") {
                    include VIEW . "admin/index.php";
                } else {
                    echo "vous n'aver pas le droit de voir cette page :(";
                }
            } else {
                include VIEW . "formulaire.php";
            }
        } else if ($this->request == "about") {
            if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
                include VIEW . "about.php";
            } else {
                include VIEW . "formulaire.php";
            }
        } else if ($this->request == "test") {
            include VIEW . "index.php";
        } else {
            include VIEW . "notFound.php";
        }
    }
}
