<?php
   
    define('NAME', 'Uoshi');
    $fileName = "Tamagotchi";

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
        <h1><?php echo 'hello, music app'; ?></h1>
        <div>
            <?php
            echo $fileName;
            ?>
        </div>
        <div>
            <?php echo NAME ?>
        </div>
</body>
</html>