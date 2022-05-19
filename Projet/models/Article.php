<?php 

class Article{
    private int $id;
    private string $title;
    private string $synopsys;
    private string $content;
    private string $created_at;
    private string $author;
    private string $image;
  

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

    public function setId(int $id):Article{
        $this->id = $id;
        return $this;
    }
    public function getTitle():string{
        return $this->title;
    }
    public function setTitle(string $title):Article{
        $this->title = $title;
        return $this;
    }
    public function getContent():string{
        return $this->content;
    }

    public function setContent(string $content):Article{
        $this->content = $content;
        return $this;
    }

    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at):Article{
        $this->created_at = $created_at;
        return $this;
    }
    public function getAuthor():string{
        return $this->author;
    }

    public function setAuthor(string $author):Article{
        $this->author = $author;
        return $this;
    }

    public function getImage():string
    {
        return $this->image;
    }

    public function setImage(string $image):Article
    {
        $this->image = $image;
        return $this;
    }

    public function getSynopsys():string
    {
        return $this->synopsys;
    }

    public function setSynopsys(string $synopsys)
    {
        $this->synopsys = $synopsys;

        return $this;
    }
}
?>