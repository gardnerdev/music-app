<?php
   
    // connect to database
    $conn = mysqli_connect('localhost', 'user', 'aplikacjeinternetowe', 'songs_portal');


    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php')?>
    <?php include('templates/footer.php')?>
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music songs</title>
</head>
<body>
        <h1><?php echo 'hello, music songs portal'; ?></h1>
</body>
</html>