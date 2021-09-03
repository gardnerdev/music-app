<?php
 
// check GET requet id param
if (isset($_GET['id'])){    
    
    include "db_connect.php";

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM songs WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result)> 0){
        // fetch result in array format
        $song = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }else {
        header("Location: add.php");
    }

}else if(isset($_POST['update'])){

    include "db_connect.php";

    $fileName = $_POST['fileName'];
    $title = $_POST['title'];
    $isrcCode = $_POST['isrcCode'];
    $composer = $_POST['composer'];
    $author = $_POST['author'];
    $descriptionAuthor = $_POST['descriptionAuthor'];
    $duration = $_POST['duration'];
    $errors = array('fileName' => '', 'title' => '', 'isrcCode' => '','composer' => '', 'author' => '', 'descriptionAuthor' => '', 'duration' => '');

    # checking if submit is initialized 
    if(isset($_POST['update'])){
        // echo htmlspecialchars($_POST['fileName']); # preventing XSS attacks for rendering as html entities 
        // validation
        if (empty($_POST['fileName'])){
           $errors['fileName'] = 'An file name is required ';
        }
        else
            $fileName=$_POST['fileName'];
        if (empty($_POST['title'])){
            $errors['title']='An title is required <br />';
        }
        else{
            $title=$_POST['title'];
        }
        if (empty($_POST['isrcCode'])){
            $errors['isrcCode']='An isrc code is required <br />';
        }
        else{
            $isrcCode = $_POST['isrcCode'];
            if(strlen($isrcCode) < 20){
                $errors['isrcCode']='ISRC code needs to be at least 20 characters long <br />';
            }
        }
        if (empty($_POST['composer'])){
            $errors['composer']='An composer is required <br />';
        } else {
            $composer = $_POST['composer'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $composer)){
                $errors['composer']='Composer must be letters and spaces only <br />';
        }
        }
        if (empty($_POST['author'])){
            $errors['author']='An author is required <br />';
        }
        else {
            $author=$_POST['author'];
        }
        if (empty($_POST['descriptionAuthor'])){
            $errors['descriptionAuthor']='An author of description is required <br />';
        }
        else {
            $descriptionAuthor=$_POST['descriptionAuthor'];
        }
        if (empty($_POST['duration'])){
            $errors['duration']='A duration is required <br />';
        }
        else{
            $duration=$_POST['duration'];
        }

        if (array_filter($errors)){

        }else {
            // protecting from sql injection
            $fileName = mysqli_real_escape_string($conn, $_POST['fileName']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $isrcCode = mysqli_real_escape_string($conn, $_POST['isrcCode']);
            $composer = mysqli_real_escape_string($conn, $_POST['composer']);
            $author = mysqli_real_escape_string($conn, $_POST['author']);
            $descriptionAuthor = mysqli_real_escape_string($conn, $_POST['descriptionAuthor']);
            $duration  = intval(mysqli_real_escape_string($conn, $POST['duration']));

            $sql = "INSERT INTO songs(`file_name`,title,isrc_code,composer,author,description_author,duration) VALUES ('$fileName','$title','$isrcCode','$composer','$author','$descriptionAuthor', $duration)";
            
            // save in db and check
            if(mysqli_query($conn, $sql)){
                //success
                 // form is valid
                header('Location: index.php');
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }

        }
    }

}else {
    header("Location: add.php");
}
?>


<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <section class="container grey-text"></section>
        <h4 class="center">Update a song</h4>
        <form class="white" action="update.php" method="POST">
            <label>File name: </label>
            <input type="text" name="fileName" value="<?php echo htmlspecialchars($song['file_name']) ?>">
            <div class="red-text"><?php echo $errors['fileName']; ?></div>
            <label>Title: </label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($song['title']) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label>ISRC code: </label>
            <input type="text" name="isrcCode" value="<?php echo htmlspecialchars($song['isrc_code']) ?>">
            <div class="red-text"><?php echo $errors['isrcCode']; ?></div>
            <label>Composer: </label>
            <input type="text" name="composer" value="<?php echo htmlspecialchars($song['composer']) ?>">
            <div class="red-text"><?php echo $errors['composer']; ?></div>
            <label>Author: </label>
            <input type="text" name="author" value="<?php echo htmlspecialchars($song['author']) ?>">
            <div class="red-text"><?php echo $errors['author']; ?></div>
            <label>Description author: </label>
            <input type="text" name="descriptionAuthor" value="<?php echo htmlspecialchars($song['description_author']) ?>">
            <div class="red-text"><?php echo $errors['descriptionAuthor']; ?></div>
            <label>Duration (in seconds): </label>
            <input type="number" name="duration" value="<?php echo htmlspecialchars($song['duration']) ?>">
            <div class="red-text"><?php echo $errors['duration']; ?></div>
            <div class="center">
                <input type="submit" name="update" value="update" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php')?>

</html>