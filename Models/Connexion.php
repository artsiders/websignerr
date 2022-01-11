<?php
class Connexion
{
    private $server = 'localhost';
    private $login  = 'root';
    private $pass   = '';
    private $dbName = 'websignerr';
    private $connect;

    public function getConnect()
    {
        try {
            $this->connect = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->login, $this->pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connect;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            return $error;
        }
    }

    public function close()
    {
        // je revient ...
        return $this->connect = null;
    }
}
