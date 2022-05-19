<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films Reviews</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/car.css">
    


</head>

<body>
    <?php

if ($_POST){
    $type = $_POST['search-data'];
    echo "<script>window.location.href='./search.php?search-data=$type' </script>";
}

    ?>


    <nav>
        <div class="logo">
            <h4>Film Review</h4>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="./main.php">Acceuil</a></li>
                <li><a href="./all.php">Articles</a></li>
                <li><a href="./create.php">Créer </a></li>
                <li><a href="./contact.php">Contacts</a></li>
            </ul>
        </div>
        <form method="post" class="search">
            <input type="search" name="search-data" id="search-data" placeholder="recherche" required>
        </form>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>


        </div>


    </nav>


    
