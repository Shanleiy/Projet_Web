<link rel="stylesheet" href="../style/create.css">
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
$myArticleId = intval($_GET['id']);
$myArticle = $manager->get($myArticleId);


if ($_POST) {
    $myArticleId =intval($_GET['id']);
    $myArticle->hydrate($_POST);
    $manager->update($myArticle);
    var_dump($myArticleId);
    echo "<script>window.location.href='./read.php?id=$myArticleId'</script>";
}


?>


<form method="post" style="margin-top: 75px;">

    <div class="input-block">
        <input type="text" name="title" id="title" required value=" <?= $myArticle->getTitle() ?>">
        <span class="placeholder">
            Title
        </span>
    </div>
    <div class="input-block">
        <input type="text" name="synopsys" id="synopsys" required value=" <?= $myArticle->getSynopsys() ?>">
        <span class="placeholder">
            Synopsys
        </span>
    </div>

    <div>
        <textarea name="content" id="content" cols="40" rows="5" required>  <?= $myArticle->getContent() ?>
    </textarea>
    </div>

    <div class="input-block">
        <input type="text" name="author" id="author" required value=" <?= $myArticle->getAuthor() ?>">
        <span class="placeholder">
            Author
        </span>
    </div>

    <div class="input-block">
        <input type="url" name="image" id="image" value=" <?= $myArticle->getImage() ?>">
        <span class="placeholder">
            url image
        </span>
    </div>

<div id="btn">
    <input type="submit" value="Modifier" class="button">
</div>
</form>

</body>

</html>