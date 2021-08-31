<?php
    # checking if submit is initialized 
    if(isset($_POST['submit'])){
        echo htmlspecialchars($_POST['file-name']); # preventing XSS attacks for rendering as html entities
        echo htmlspecialchars($_POST['title']);
        echo htmlspecialchars($_POST['isrc-cide']);
        echo htmlspecialchars($_POST['composer']);
        echo htmlspecialchars($_POST['author']);
        echo htmlspecialchars($_POST['description-author']);
        echo htmlspecialchars($_POST['duration']);
    }
?>


<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <section class="container grey-text"></section>
        <h4 class="center">Add a song</h4>
        <form class="white" action="add.php" method="POST">
            <label>File name: </label>
            <input type="text" name="file-name">
            <label>Title: </label>
            <input type="text" name="title">
            <label>ISRC code: </label>
            <input type="text" name="isrc-cide">
            <label>Composer: </label>
            <input type="text" name="composer">
            <label>Author: </label>
            <input type="text" name="author">
            <label>Description author: </label>
            <input type="text" name="description-author">
            <label>Duration: </label>
            <input type="text" name="duration">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    <?php include('templates/footer.php')?>
</html>