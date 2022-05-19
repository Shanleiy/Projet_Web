
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
    
    echo "<script>window.location.href='./main.php'</script>";
}
?>
<link rel="stylesheet" href="../style/create.css">

<div class="contact">
<H2>Contact</H2>
<p>Une remarque? Une suggestion? N'hésitez-pas à m'écrire. </p>
</div>
<form action="" method="post">
    <div class="input-block">
        <input type="text" name="name" id="name" required>
        <span class="placeholder">
            Votre nom
        </span>
    </div>
    <div class="input-block">
        <input type="email" name="mail" id="mail" required>
        <span class="placeholder">
        Email
        </span>
    </div>
    <div class="input-block">
        <input type="text" name="sujet" id="sujet" required>
        <span class="placeholder">
        Sujet
        </span>
    </div>
    
    <textarea name="content" id="content" cols="37" rows="10" placeholder="Votre message" required></textarea>
    <div id="btn">
        <input type="submit" value="Valider" class="button">
    </div>




</form>






<?php require "footer.php"; ?>