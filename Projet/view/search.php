<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../style/style.css">

<?php require "header.php";

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
$type = $_GET['search-data'];
$articles = $manager->search($type);

if (sizeof($articles)==0)
        {
            echo "<h1 Style='text-align:center; margin-top : 50px; margin-bottom : 560px'>Aucun article trouvés.</h1>";
        }
?>

<div class="all" style="display: flex;flex-flow:row wrap ;justify-content:space-around; margin:50px
">
    <?php foreach ($articles as $article) : ?>

        <div class="card mb-3" style="max-width: 700px;margin:20px; max-height:fit-content; min-height:fit-content">
            <div class="row g-0">
                <div class="col-md-4" id="image-card">
                    <img src="<?= $article->getImage() ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                        <p class="card-text"><?= $article->getSynopsys() ?>.</p>
                        <p class="card-text"><small class="text-muted"><?= $article->getCreated_at() ?></small></p>
                        <a class="btn btn-primary" href="./read.php?id=<?= $article->getId() ?>">
                            Voir plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>



<?php require "./footer.php"; ?>