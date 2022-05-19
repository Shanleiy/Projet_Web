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

$manager = new CommentsManager();
$myCommentId = intval($_GET['id']);
$myComment = $manager->get($myCommentId);


if ($_POST) {
    $myComment->hydrate($_POST);
    $manager->update($myComment);
    /* echo "<script>window.location.href='./main.php'</script>"; */
}


?>  


<form method="get" style="margin-top: 75px;">


    <div>
        <textarea name="content" id="content" cols="40" rows="5" required>  <?= $myComment->getContent() ?>
    </textarea>
    </div>

    <div class="input-block">
        <input type="text" name="author" id="author" required value=" <?= $myComment->getAuthor() ?>">
        <span class="placeholder">
            Author
        </span>
    </div>



<div id="btn">
    <input type="submit" value="Modifier" class="button">
</div>
</form>

</body>

</html>