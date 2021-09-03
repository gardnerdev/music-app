<?php
    include_once 'templates/header.php';
?>

    <section class="signup-form">
    <link rel="stylesheet" type="text/css" href="templates/style.css">
    <section class="container grey-text"></section>
        <h4 class="center">Log In</h4>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <div class="center">
                <button type="submit" name="submit" value="submit" class="btn brand z-depth-0">Log in</button>
            </div>
        </form>
    </section>
    <?php
        if (isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login</p>";
            }
        }
        ?>
<?php 
    include_once 'templates/footer.php';
?>