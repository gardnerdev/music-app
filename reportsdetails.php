<?php
    include('db_connect.php');
    // check GET requet id param
    if (isset($_GET['reportId'])){    
        $reportId = mysqli_real_escape_string($conn, $_GET['reportId']);
        $sql = "SELECT DISTINCT title,author FROM songs  join songs_reports sr ON songs.id = sr.songsId join reports r on sr.reportsId = r.id WHERE r.id = $reportId";
        // get the query result
        $result = mysqli_query($conn, $sql);
        
        if ($result){
            // fetch result in array format
            $raportsongs = mysqli_fetch_all($result,MYSQLI_ASSOC);
            mysqli_free_result($result);
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
<h4 class="center gray-text">Songs
    </h4>
    <div class="container">
        <div class="row">
            <?php foreach($raportsongs as $item): ?>
                <div class="col s6 md3 ">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                        <div><?php echo htmlspecialchars($item['title']); ?></div>
                            <div><?php echo htmlspecialchars($item['author']); ?></div>
                            <div class="card-action right-align">
                                <a href="details.php?id=<?php echo $song['id']?>" class="brand-text">DELETE</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        
        </div>
    </div>
</html>