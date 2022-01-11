<?php
require_once "Connexion.php";
class Posts
{

    public function __construct()
    {
        $this->connect = new Connexion;
    }

    public function create(int $idUser, array $data)
    {
        $sql = "INSERT INTO `posts` (`id_post`, `post_description`, `principal_item`, `item1`, `item2`, `item3`, `add_date`, `id_user`) 
                VALUES (NULL, :post_description, :principal_item, :item1, :item2, :item3, NOW(), :id_user)";

        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("post_description", $data['post_description']);
        $query->bindParam("principal_item", $data['principal_item']);
        $query->bindParam("item1", $data['item1']);
        $query->bindParam("item2", $data['item2']);
        $query->bindParam("item3", $data['item3']);
        $query->bindParam("id_user", $idUser);

        $query->execute();
    }

    public function read(int $idPost)
    {
        $sql = "SELECT * FROM `posts` WHERE id_post = :id_post";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("id_post", $idPost);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // reserver a l'administrateur
    public function readAll()
    {
        $query = $this->connect->getConnect()->prepare("SELECT * FROM `posts` P, `users` U WHERE P.id_user = U.id_user ORDER BY P.add_date DESC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function readCount()
    {
        $query = $this->connect->getConnect()->prepare("SELECT COUNT(`id_post`) FROM `posts`");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_NUM);
        return $result;
    }
    public function readAllSearch(string $search)
    {
        $query = $this->connect->getConnect()->prepare("SELECT * FROM `posts` P, `users` U 
            WHERE post_description 
            LIKE '%$search%' AND P.id_user = U.id_user 
            OR username LIKE '%$search%' 
            OR user_description LIKE '%$search%'
            LIMIT 6");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function readAllPostUser($idUser)
    {
        $query = $this->connect->getConnect()->prepare("SELECT * FROM `posts` WHERE `posts`.`id_user` = :id_user ORDER BY add_date DESC");
        $query->bindParam("id_user", $idUser);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function update(int $idPost, string $description)
    {

        $sql = "UPDATE `posts` 
                SET `post_description` = :post_description
                WHERE `posts`.`id_post` = :id_post";

        $query = $this->connect->getConnect()->prepare($sql);

        $query->bindParam("post_description", $description);
        $query->bindParam("id_post", $idPost);

        $query->execute();
    }

    public function delete($idPost)
    {
        $sql = "DELETE FROM `posts` WHERE `posts`.`id_post` = :id";
        $query = $this->connect->getConnect()->prepare($sql);
        $query->bindParam("id", $idPost);
        $query->execute();
    }
    // dev
    public function readLike($idPost)
    {
        $query = $this->connect->getConnect()->prepare("SELECT * FROM `posts` ORDER BY id_post DESC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
