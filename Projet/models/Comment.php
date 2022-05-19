<?php 

class Comment{
    private int $id;
    private string $content;
    private string $author;
    private string $created_at;
    private int $idArticle;
    
  

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
   
    public function hydrate(array $donnees){
        foreach ($donnees as $cle => $valeur){
            $method = 'set'.ucfirst($cle);
            if (method_exists($this,$method)){
                $this->$method($valeur);
            }
        }
    }
    

    public function getId(){
        return $this->id;
    }

    public function setId(int $id):Comment{
        $this->id = $id;
        return $this;
    }
    public function getContent():string{
        return $this->content;
    }

    public function setContent(string $content):Comment{
        $this->content = $content;
        return $this;
    }

    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at):Comment{
        $this->created_at = $created_at;
        return $this;
    }
    public function getAuthor():string{
        return $this->author;
    }

    public function setAuthor($author):Comment{
        $this->author = $author;
        return $this;
    }
    public function getIdArticle()
    {
        return $this->idArticle;
    }
    public function setId_article($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }
}
?>