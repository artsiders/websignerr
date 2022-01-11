<?php
session_start();
/**
 * les cofiguration de l'appication
 */

class AutoLoad
{
    static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoloader'));
        // creation des chemins absolu_________________________

        $root = $_SERVER["DOCUMENT_ROOT"];
        $host = $_SERVER["HTTP_HOST"];


        define("ROOT", "$root/websignerr/");
        define("HOST", "http://" . "$host/");

        define("MODEL", "$root/websignerr/models/");
        define("VIEW", "$root/websignerr/views/");
        define("CONTROLER", "$root/websignerr/controlers/");
        define("CLASSE", "$root/websignerr/Class/");

        define("ASSETS", "http://$host/websignerr/assets/");
        define("RACINE", "http://$host/websignerr/");
        define("ASSETS_ROOT", "http://$root/websignerr/assets/");

        // END chemins absolu__________________________________
    }
    static function autoloader($class)
    {

        if (file_exists(MODEL . $class . '.php')) {
            include_once MODEL . $class . '.php';
        } else if (file_exists(VIEW . $class . '.php')) {
            include_once VIEW . $class . '.php';
        } else if (file_exists(CONTROLER . $class . '.php')) {
            include_once CONTROLER . $class . '.php';
        } else if (file_exists(CLASSE . $class . '.php')) {
            include_once CLASSE . $class . '.php';
        }
    }
}
