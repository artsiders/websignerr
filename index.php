<?php
require_once "_config.php";
// require_once "app/class/Routeur.php";

AutoLoad::start();

// la demande de la page via "action" passer dans l'url
$request = isset($_GET['action']) ? $request = $_GET['action'] : $request =  "";

$routeur = new Routeur($request);
$routeur->renderController();
