<?php
require_once "Connexion.php";
class Users
{

    public function __construct()
    {
        $this->connect = new Connexion;
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO `users` 
                (`username`, `user_phone`, `user_email`, `user_login`, `user_pass`, `user_description`, `picture`, `cover`, `join_date`) 
                VALUES 
                (:username, :user_phone, :user_email, :user_login, :user_pass, :user_description, :picture, :cover, NOW())";

        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("username", $data['username']);
        $query->bindParam("user_phone", $data['user_phone']);
        $query->bindParam("user_email", $data['user_email']);
        $query->bindParam("user_login", $data['user_login']);
        $query->bindParam("user_pass", $data['user_pass']);
        $query->bindParam("user_description", $data['user_description']);
        $query->bindParam("picture", $data['picture']);
        $query->bindParam("cover", $data['cover']);

        $query->execute();
    }
    public function createStart(array $data, string $passCrypt)
    {
        $sql = "INSERT INTO `users` (`username`, `user_email`, `user_login`, `user_pass`, `picture`, `cover`, `join_date`) 
        VALUES (:username, :user_email, :user_login, :user_pass, :picture, :cover, NOW())";

        $defaultPicture = "default.png";
        $defaultCover = "defaultCover.png";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("username", $data['username']);
        $query->bindParam("user_email", $data['user_email']);
        $query->bindParam("user_login", $data['user_login']);
        $query->bindParam("user_pass", $passCrypt);
        $query->bindParam("picture", $defaultPicture);
        $query->bindParam("cover", $defaultCover);

        $query->execute();
    }

    public function read(int $idUser)
    {
        $sql = "SELECT * FROM `users` WHERE `users`.`id_user` = :id_user";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("id_user", $idUser);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function readCount()
    {
        $sql = "SELECT COUNT(`id_user`) FROM `users`";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_NUM);
        return $result;
    }

    // reserver a l'administrateur
    public function readAll(int $limit = null)
    {
        if ($limit == null) {
            $query = $this->connect->getConnect()->prepare("SELECT * FROM users");
        } else {
            $query = $this->connect->getConnect()->prepare("SELECT * FROM users LIMIT $limit");
        }
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function update(int $idUser, array $data)
    {
        $sql = "UPDATE `users` SET 
                `username` = :username, 
                `user_phone` = :user_phone, 
                `user_email` = :user_email,
                `user_description` = :user_description
                WHERE `users`.`id_user` = :id_user";


        $query = $this->connect->getConnect()->prepare($sql);


        $query->bindParam("username", $data['username']);
        $query->bindParam("user_phone", $data['user_phone']);
        $query->bindParam("user_email", $data['user_email']);
        $query->bindParam("user_description", $data['user_description']);

        $query->bindParam("id_user", $idUser);

        $query->execute();
    }

    public function updatePicture(int $idUser, string $pictureName)
    {
        $sql = "UPDATE `users` SET 
                `picture` = :picture
                WHERE `users`.`id_user` = :id_user";

        $query = $this->connect->getConnect()->prepare($sql);

        $query->bindParam("picture", $pictureName);

        $query->bindParam("id_user", $idUser);

        $query->execute();
    }

    public function updateCover(int $idUser, string $coverName)
    {
        $sql = "UPDATE `users` SET 
                `cover` = :cover
                WHERE `users`.`id_user` = :id_user";

        $query = $this->connect->getConnect()->prepare($sql);

        $query->bindParam("cover", $coverName);

        $query->bindParam("id_user", $idUser);

        $query->execute();
    }

    public function delete($idUser)
    {
        $sql = "DELETE FROM `users` WHERE `users`.`id_user` = :id_user";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("id_user", $idUser);
        $query->execute();
    }

    public function checkUser($userLogin)
    {
        $sql = 'SELECT * FROM users WHERE user_login = :user_login';
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("user_login", $userLogin);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}


// $password = "root";
// $pass = password_hash($password, PASSWORD_DEFAULT);
// echo $pass;

// $test = new Users;

// $data = array(
//     `username` => "salim",
//     `user_phone` => "38378548",
//     `user_email` => "ragononez250@gmail.com",
//     `user_login` => "salim",
//     `user_pass` => $pass,
//     `user_description` => "jbkfjlkvnofr",
//     `picture` => "dnksj",
//     `cover` => "hjlvkfo"
// );

// $rest = $test->create($data);
