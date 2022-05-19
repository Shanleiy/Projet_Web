
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

if ($_POST) {
    $manager = new CommentsManager();
    $myComment = new Comment($_POST);
    $manager->add($myComment);
}?>



    <form method="post" class="container">
        <textarea name="content" id="content" cols="37" rows="10" placeholder="Description" required></textarea>
        <div class="input-block">
            <input type="text" name="author" id="author" required>
            <span class="placeholder">
                Author
            </span>
        </div>
        <!-- <div class="input-block">
            <input type="url" name="image" id="image" required>
            <span class="placeholder">
                url image
            </span>
        </div> -->

        <div id="btn">
        <input type="submit" value="Valider" class="button">
    </div>
    </form>
    
</body>
</html>