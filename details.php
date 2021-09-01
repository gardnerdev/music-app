<?php 

    include('config/db_connect.php');

    if (isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

        $sql = "DELETE FROM songs WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //success
            header('Location: index.php');
        } {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // check GET requet id param
    if (isset($_GET['id'])){    
        
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM songs WHERE id = $id";

        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $song = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <div class="container center">
        <?php if($song): ?>
            <h4>Title: <?php echo htmlspecialchars($song['title']); ?></hr4>
            <p>Author: <?php echo htmlspecialchars($song['author']); ?></p>
            <p>File name: <?php echo htmlspecialchars($song['file_name']); ?></p>
            <p>Isrc code: <?php echo htmlspecialchars($song['isrc_code']); ?></p>
            <p>Composer: <?php echo htmlspecialchars($song['composer']); ?></p>
            <p>Description author: <?php echo htmlspecialchars($song['description_author']); ?></p>
            <p>Duration (in seconds): <?php echo htmlspecialchars($song['duration']); ?></p>


            <!-- DELETE FORM -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $song['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>


        <?php else: ?>
            <h5>No such song exists!</h5>
        <?php endif; ?>
    </div>
    <?php include('templates/footer.php'); ?>
</html>