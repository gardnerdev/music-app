<?php
    include_once 'templates/header.php';
?>


    <section class="signup-form">
    <section class="container grey-text"></section>
        <h4 class="center">Log In</h4>
        <form action="login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <div class="center">
                <button type="submit" name="submit" value="submit" class="btn brand z-depth-0">Log in</button>
            </div>
        </form>
    </section>


<?php 
    include_once 'templates/footer.php';
?>