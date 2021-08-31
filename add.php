<?php
    # checking if submit is initialized 
    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['file-name']); # preventing XSS attacks for rendering as html entities 
        // validation
        if (empty($_POST["file-name"])){
            echo 'An file name is required ';
        } else {
            echo htmlspecialchars($_POST['file-name']);
        }

        if (empty($_POST["title"])){
            echo 'An title is required <br />';
        } else {
            echo htmlspecialchars($_POST['title']);
        }

        if (empty($_POST["isrc-code"])){
            echo 'An isrc code is required <br />';
        } else {
            echo htmlspecialchars($_POST['isrc-code']);
        }

        if (empty($_POST["composer"])){
            echo 'An composer is required <br />';
        } else {
            echo htmlspecialchars($_POST['composer']);
        }

        if (empty($_POST["author"])){
            echo 'An title is required <br />';
        } else {
            echo htmlspecialchars($_POST['author']);
        }

        if (empty($_POST["description-author"])){
            echo 'An author of description is required <br />';
        } else {
            echo htmlspecialchars($_POST['description-author']);
        }

        if (empty($_POST["duration"])){
            echo 'A duration is required <br />';
        } else {
            echo htmlspecialchars($_POST['duration']);
        }

    }       # end of post check

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
            <input type="text" name="isrc-code">
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