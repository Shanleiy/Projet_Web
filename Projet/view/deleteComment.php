<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    function loadClass($class)
    {
        if (str_contains($class, "Manager")) {
            require "../controllers/$class.php";
        } else {
            require "../models/$class.php";
        }
    }
    spl_autoload_register("loadClass");

    
    $commentId = $_GET['id'];
    $manager = new CommentsManager();
    $comment= $manager->get($commentId);
    $articleId=$comment->getIdArticle();
    $manager->delete($commentId);
    


?>
<script>window.location.href='./read.php?id=<?=$articleId ?>' </script>
</body>

</html>