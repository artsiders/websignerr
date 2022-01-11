<?php
require_once "Connexion.php";
class Comments
{
    public function __construct()
    {
        $this->connect = new Connexion;
    }
    public function read(int $idPost)
    {
        $sql = "SELECT id_comment, comment, C.id_post, U.id_user, C.id_user, C.add_date, U.picture
        FROM `comments` C, `users` U 
        WHERE C.`id_post` = :id_post
        AND C.`id_user` = U.`id_user`
        ORDER BY C.`add_date`
        LIMIT 1";

        $query = $this->connect->getConnect()->prepare($sql);

        $query->bindParam("id_post", $idPost);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function readAll(int $idPost)
    {
        $sql = "SELECT id_comment, comment, C.id_post, U.id_user, C.id_user, C.add_date, U.picture
        FROM `comments` C, `users` U 
        WHERE C.`id_post` = :id_post 
        AND C.`id_user` = U.`id_user` 
        ORDER BY C.`add_date` DESC";

        $query = $this->connect->getConnect()->prepare($sql);

        $query->bindParam("id_post", $idPost);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function readCount()
    {
        $query = $this->connect->getConnect()->prepare("SELECT COUNT(id_comment) FROM `comments`");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_NUM);
        return $result;
    }
    public function readCountForOnePost($idPost)
    {
        $query = $this->connect->getConnect()->prepare("SELECT COUNT(id_comment) FROM `comments` WHERE `comments`.`id_post` = :id_post");
        $query->bindParam("id_post", $idPost);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_NUM);
        return $result;
    }
    public function readLast($idPost)
    {
        $query = $this->connect->getConnect()->prepare("SELECT * FROM `comments`, `users` 
            WHERE `comments`.`id_post` = :id_post 
            AND `comments`.`id_user` = `users`.`id_user` 
            ORDER BY `comments`.`id_comment` DESC");

        $query->bindParam("id_post", $idPost);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function create(int $idUser, int $idPost, array $data)
    {
        $sql = "INSERT INTO `comments` (`id_comment`, `comment`, `id_post`, `id_user`) 
        VALUES (NULL, :comment, :id_post, :id_user)";

        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("comment", $data['comment']);
        $query->bindParam("id_post", $idPost);
        $query->bindParam("id_user", $idUser);

        $query->execute();
    }

    public function update(int $idComment, array $data)
    {

        $sql = "UPDATE `comments` 
                SET `comment` = :comment, 
                WHERE id_comment = :id_comment
            ";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("comment", $data['comment']);
        $query->bindParam("id_comment", $idComment);

        $query->execute();
    }

    public function delete($idComment)
    {
        $sql = "DELETE FROM `comments` WHERE `comments`.`id_comment` = :id_comment";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("id_comment", $idComment);
        $query->execute();
    }
}
