<?php
require "./header.php";
function loadClass($class)
{
    if (str_contains($class, "Manager")) {
        require "../controllers/$class.php";
    } else {
        require "../models/$class.php";
    }
}
spl_autoload_register("loadClass");


if ($_POST) {
    $articleId = $_GET['id'];
    $managerC = new CommentsManager();
    $myComment = new Comment($_POST);
    $managerC->add($myComment);
    echo "<script>window.location.href='./read.php?id='<?=$articleId ?></script>";
}
$articleId = $_GET['id'];
$managerArticle = new ArticlesManager;
$myArticle = $managerArticle->get($articleId);
$managerComment = new CommentsManager;
$comments = $managerComment->getAll();


?>

<title>Film reviews | <?= $myArticle->getTitle() ?></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="../style/read.css">




<div class="container">
    <div class="title">
        <h1 style="text-align: center;"><?= $myArticle->getTitle() ?></h1>
    </div>
    <div class="image">
        <img src="<?= $myArticle->getImage() ?>" alt="Photo de l'article">
    </div class="texte">
    <div class="texte">
        <div class="content">
            <p><?= $myArticle->getContent() ?></p>
        </div>
        <div class="author-date">
            <pre style="font-family: 'Poppins',sans serif; font-weight:normal"><p>Ecrit par <i ><u><?= $myArticle->getAuthor() ?></u></i>, le : <?= $myArticle->getCreated_at() ?></p></pre>

        </div>

    </div>

    <div class="comment-title">
        <Span>Commentaires </Span>
        <button>+</button>
    </div>

    <div class="toggle-bloc">
        <?php

        foreach ($comments as $comment) :
        ?>
            <div class="comment">
                <div class="comment-delete">
                    <p><?= $comment->getContent() ?> </p>
                    <div>
                        <button onclick="window.location.href='./updatecomment.php?id=<?= $comment->getId() ?>'">
                            <span style="vertical-align:text-top" class="material-symbols-outlined">
                                edit
                            </span>
                        </button>
                        <a href="./deleteComment.php?id=<?= $comment->getId() ?>">
                            <span style="vertical-align:text-top" class="material-symbols-outlined">
                                close
                            </span>
                        </a>
                    </div>

                </div>
                <pre><p>Par <?= $comment->getAuthor() ?>,       Fait le : <?= $comment->getCreated_at() ?></p></pre>
            </div>
        <?php endforeach;
        ?>



        <form method="post" class="form-container">
            <label for="content">Commentaire :</label>
            <textarea name="content" id="content" cols="37" rows="10" required></textarea>
            <label for="author">Author :</label>
            <input type="text" name="author" id="author" required><br>
            <div id="btn">
                <input type="submit" value="Valider" class="button-comment">
            </div>
        </form>
    </div>
</div>

<script src="../toggle.js"></script>



<?php require "./footer.php" ?>