<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
require "header.php";
function loadClass($class)
{
    if (str_contains($class, "Manager")) {
        require "../controllers/$class.php";
    } else {
        require "../models/$class.php";
    }
}
spl_autoload_register("loadClass");



$manager = new ArticlesManager();
$articles = $manager->getAll();



?>
<div class="d-flex justify-content-center">
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php
            $i = 1;
            foreach ($articles as $article) : ?>
                <div class="carousel-item <?php if ($i <= 1) echo ' active' ?> data-interval='2000'">
                    <div class="card">
                        <img alt="image de <?= $article->getTitle() ?>" src="<?= $article->getImage() ?>">
                        </a>
                        <div class="card-body">
                            <div class="card-title">
                                <h3><?= $article->getTitle() ?></h3>
                            </div>
                            <p><?= $article->getSynopsys() ?></p>
                            <p>Rédigé par : <?= $article->getAuthor() ?></p>
                            <div>

                                <a class="btn btn-primary" href="./read.php?id=<?= $article->getId() ?>">
                                    Voir plus
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
                $i++;
            endforeach;
            ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


</div>


<H1 style="text-align: center;">Qu'est ce que "Film Review ?"</H1>
<p style="width: 50%;font-size:20px; margin:auto; line-height:30px">Film Revu est un site de Revu de Film permettant de répertorier les films et d'avoir un -plus ou moins- court résumé de ce Film.
    Les différents utilisateurs peuvent par la suite commenter la revue de leur choix afin d'exprimer leur avis et de prendre contacte avec les autres utilisateurs.
</p>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    var myModal = document.getElementById('myModal');
    var myInput = document.getElementById('MyInput');
</script>







<?php require "footer.php"; ?>