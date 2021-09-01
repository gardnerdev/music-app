<?php
   
    // connect to database
    $conn = mysqli_connect('localhost', 'user', 'aplikacjeinternetowe', 'songs_portal');


    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

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


<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php')?>

    <h4 class="center gray-text">Songs
    </h4>

    <div class="container">
        <div class="row">
            <?php foreach($songs as $song): ?>

                <div class="col s6 md3 ">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($song['title']); ?></h6>
                            <div><?php echo htmlspecialchars($song['author']); ?></div>
                            <div class="card-action right-align">
                                <a href="#" class="brand-text">more info</a>
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