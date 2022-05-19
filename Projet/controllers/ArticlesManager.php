<?php
class ArticlesManager
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
    public function add(Article $article)
    {
        
        $req = $this->db->prepare("INSERT INTO `article` (title,synopsys, content, created_at,author,image) VALUES(:title,:synopsys, :content, :created_at, :author,:image)");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":synopsys", $article->getSynopsys(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":created_at", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":image",$article->getImage(),PDO::PARAM_STR);
      

        $req->execute();
    }

    public function update(Article $article)
    {
        
        $req = $this->db->prepare("UPDATE `article` SET title = :title,synopsys =:synopsys, content = :content, created_at = :created_at, author = :author, image=:image WHERE id = :id");

        $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);
        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":synopsys", $article->getSynopsys(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":created_at", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":image",$article->getImage(),PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch();
        $article = new Article($donnees);
        return $article;
    }

    public function getAll(): array
    {
        $articles = [];
        $req = $this->db->query("SELECT * FROM `article`");
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }
        return $articles;
    }

    public function delete(int $id): void
    {
        $req = $this->db->prepare("DELETE FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
    public function search(string $search): array
    {
        $articles = [];

        $req = $this->db->query("SELECT * FROM `article` WHERE title LIKE '%$search%' OR synopsys LIKE '%$search%' OR content LIKE '%$search%' ");
        $req->execute();

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }
        
        return $articles;
    
    }
    public function order(string $order): array
    {
        $articles = [];
    
switch($order){
    case 'titre-croissant' :
        $req = $this->db->query("SELECT * FROM `article` ORDER BY title");
        $req->execute();
        break;
    case 'titre-decroissant' :
        $req = $this->db->query("SELECT * FROM `article` ORDER BY title DESC ");
        $req->execute();
        break;
    case 'date-croissant' :
        $req = $this->db->query("SELECT * FROM `article` ORDER BY created_at ");
        $req->execute();
        break;
    case 'date-decroissant' :
        $req = $this->db->query("SELECT * FROM `article` ORDER BY created_at DESC");
        $req->execute();
        break;

}

        $donnees = $req->fetchAll();
        foreach ($donnees as $donnee) {
            $articles[] = new Article($donnee);
        }
        return $articles;
    }
}
