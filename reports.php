<?php
    
    include('db_connect.php');
    $reportName = $title = $isrcCode = $composer = $author = $descriptionAuthor = $duration = '';
    $errors = array('reportsName' => '', 'reportsDate' => '');

    # checking if submit is initialized 
    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['fileName']); # preventing XSS attacks for rendering as html entities 
        // validation
        if (empty($_POST['reportsName'])){
           $errors['reportsName'] = 'An report name is required ';
        }
        else
            $reportsName=$_POST['reportsName'];
        if (empty($_POST['reportsDate'])){
            $errors['reportsDate']='An date is required <br />';
        }
        else{
            $reportsDate=$_POST['reportsDate'];
        }
        if (array_filter($errors)){
            
        } else {
            // protecting from sql injection
            $reportsName = mysqli_real_escape_string($conn, $_POST['reportsName']);
            $reportsDate = mysqli_real_escape_string($conn, $_POST['reportsDate']);
            $sql = "INSERT INTO reports(reportsName, reportsDate) VALUES ('$reportsName',str_to_date('$reportsDate','%Y-%m'))";
            
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
?>


<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <section class="container grey-text"></section>
        <h4 class="center">Add a report</h4>
        <form class="white" action="reports.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $reportsId?>">
            <label>Report name: </label>
            <input type="text" name="reportsName" value="<?php echo htmlspecialchars($reportsName) ?>">
            <div class="red-text"><?php echo $errors['reportsName']; ?></div>
            <label>Report date: </label><br><br>
            <input type="month" name="reportsDate" value="<?php echo htmlspecialchars($reportsDate) ?>">
            <div class="red-text"><?php echo $errors['reportsDate']; ?></div>
            <br>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php')?>

</html>