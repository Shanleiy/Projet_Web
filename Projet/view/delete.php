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

    
    $articleId = $_GET['id'];
    $manager = new ArticlesManager();
    $manager->delete($articleId);
    


?>
<script>window.location.href='./main.php' </script>
</body>

</html>