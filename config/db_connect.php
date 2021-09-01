<?php
    // connect to database
    $conn = mysqli_connect('localhost', 'user', 'aplikacjeinternetowe', 'songs_portal');


    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>