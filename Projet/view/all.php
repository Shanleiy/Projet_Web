<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../style/all.css">
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

if ($_GET) {
    $order = $_GET['order'];
    $articles = $manager->order($order);
}

?>

<div class="order">
    <form method=get style="margin-top: 50px;">
        <label for="order">Tier par :</label>
        <select name="order" id="order">
            <option value="">...</option>
            <option value="titre-croissant">Titre : croissant</option>
            <option value="date-croissant">Date : croissant</option>
            <option value="titre-decroissant">Titre : décroissant</option>
            <option value="date-decroissant">Date : décroissant</option>
        </select>
        <input type="submit" value="Valider" class="button">

    </form>
</div>
<div class="all" style="display: flex;flex-flow:row wrap ;justify-content:center; margin:auto">
    <?php foreach ($articles as $article) : ?>

        <div class="card mb-3" style="max-width: 700px;margin:20px; max-height:fit-content; min-height:fit-content">
            <div class="row g-0">
                <div class="col-md-4" id="image-card">
                    <img src="<?= $article->getImage() ?>" class="img-fluid rounded-start" alt="image de <?= $article->getTitle() ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                        <p class="card-text"><?= $article->getSynopsys() ?>.</p>
                        <p class="card-text"><small class="text-muted"><?= $article->getCreated_at() ?></small></p>
                        <div>
                            <a class="btn btn-primary" href="./read.php?id=<?= $article->getId() ?>">
                                <span class="material-icons-outlined">
                                    article
                                </span>
                            </a>
                            <a class="btn btn-warning" href="./update.php?id=<?= $article->getId() ?>">
                                <span class="material-icons-outlined">
                                    edit
                                </span>
                            </a>
                            <button type="button" class="btn btn-danger" onclick="if (confirm('Êtes vous sûr de supprimer cette Article ? Cette action est iréverssible !')) window.location.href='./delete.php?id=<?= $article->getId() ?>'">
                                <span class="material-icons-outlined">delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>



<?php require "footer.php"; ?>