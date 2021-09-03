<?php
    $serverName = "localhost";
    $dBUsername = "user";
    $dBPassword = "aplikacjeinternetowe";
    $dBName = "songs_portal";

      
    // connect to database
    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


    // check connection
    if(!$conn){
        die('Connection error: ' . mysqli_connect_error());
    }