<?php
    
    include('db_connect.php');

    // write query for all songs
    $sql = 'SELECT * FROM songs';
    // make query and get result
    $result = mysqli_query($conn, $sql);
    // fetch the resulting rows as an array
    $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);   
  
    // free result from memory
    mysqli_free_result($result);
    // close connection
    mysqli_close($conn); 
?>



<?php
    // check GET requet id param
    if (isset($_GET['reportId'])){    

        include "db_connect.php";    
        $id = mysqli_real_escape_string($conn, $_GET['reportId']);  
        // make sql
        $sql = "SELECT * FROM reports WHERE id = $id";
    
        // get the query result
        $result = mysqli_query($conn, $sql);
    
    
        if (mysqli_num_rows($result)> 0){
            // fetch result in array format
            $reports = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($conn);
        }else {
            mysqli_error($conn);
            }
        }
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
            }
        }
?>

<?php
    include('db_connect.php');
    $played = '';
    $errors = array('played' => '');

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
        }else {
            mysqli_error($conn);
        }
    }


    if(isset($_POST['submit'])){
        $reportId = intval(mysqli_real_escape_string($conn,$_POST['reportId']));
        $songId = intval($_POST['songId']);



        $sql = "INSERT INTO songs_reports(songsId,reportsId) VALUES ($songId, $reportId)";
            // save in db and check
        if(mysqli_query($conn, $sql)){
            //success
            header('Location: index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        mysqli_close($conn);
    }    
?>




<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="templates/style.css">
    <?php include('templates/header.php')?>
    <?php
        if (isset($_SESSION["useruid"])){
            echo "<br>";
            echo "<p>Hello there, " . $_SESSION["useruid"] . "</p>";
            echo "<br>";
        }
    ?>
    <h4 class="center gray-text">All songs
    </h4>
    <div class="container">
        <div class="row">
            <?php foreach($songs as $song): ?>
                <div class="col s6 md3 ">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <form action="reportssongs.php?id=<?php echo $song['id']. "&reportId=" . $reports['id']?>" method="POST">
                            <h6><?php echo htmlspecialchars($song['title']); ?></h6>
                            <div><?php echo htmlspecialchars($song['author']); ?></div>
                            song id: <input  name="id" value="<?php echo $song['id'] ?>">
                            raport id<input  name="reportId" value="<?php echo $reports['id'] ?>">
                            <div class="card-action right-align">            
                                <input type='submit' name='submit' value='Add' class='btn brand z-depth-0'>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include('templates/footer.php')?>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music portal</title>
</head>
<body>
        
</body>
</html>