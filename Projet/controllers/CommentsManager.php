<?php
class CommentsManager
{
    private PDO $db;

    public function __construct()
    {
        $dbName = 'blog';
        $port = 8889;
        $username = 'root';
        $password = 'root';
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password));
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public function setDb($db)
    {
        $this->db = $db;
    }
    public function add(Comment $comment)
    {
        $req = $this->db->prepare("INSERT INTO `commentaire` (content, author, created_at,id_article) VALUES(:content, :author, :created_at,:id_article)");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":created_at", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $req->bindValue(":id_article",$_GET['id'],PDO::PARAM_INT);
        $req->execute();
    }

    public function update(Comment $comment)
    {
        $req = $this->db->prepare("UPDATE `commentaire` SET content = :content, author = :author, created_at = :created_at, id_article=:id_article WHERE id = :id");

        $req->bindValue(":id",$comment->getId(),PDO::PARAM_INT);
        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":created_at", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $req->bindValue(":id_article",$comment->getIdArticle(),PDO::PARAM_INT);
        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `commentaire` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch();
        $article = new Comment($donnees);
        return $article;
    }

    public function getAll(): array
    {
        $comments = [];
        
        $req = $this->db->prepare('SELECT * FROM `commentaire` WHERE id_article = :id_article');
        $req->bindValue(":id_article", $_GET['id'], PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $comments[] = new Comment($donnee);
        }
        return $comments;
    }

    public function delete(int $id): void
    {
        $req = $this->db->prepare("DELETE FROM `commentaire` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
