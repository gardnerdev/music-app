<?php
    include_once 'templates/header.php';
?>


    <section class="signup-form">
    <section class="container grey-text"></section>
        <h4 class="center">Sign up</h4>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <div class="center">
                <button type="submit" name="submit" value="submit" class="btn brand z-depth-0">Sign Up</button>
            </div>
        </form>
        <?php
        if (isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fil lin all fields!</p>";
            }
            else if ($_GET["error"] == "invaliduid") {
                echo "<p>Choose a proper username!</p>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo "<p>Choose a proper email!</p>";
            }
            else if($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords doesn't match!</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<p>Username already taken!</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, try again!</p>";
                
            }else if ($_GET["error"] == "none") {
                echo "<p>You have signed up!</p>";
            }
        }
    ?>
    </section>


<?php 
    include_once 'templates/footer.php';
?>