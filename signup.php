<?php
    include_once 'templates/header.php';
?>


    <section class="signup-form">
    <section class="container grey-text"></section>
        <h4 class="center">Sign up</h4>
        <form action="signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholer="Repeat password...">
            <div class="center">
                <button type="submit" name="submit" value="submit" class="btn brand z-depth-0">Sign Up</button>
            </div>
        </form>
    </section>


<?php 
    include_once 'templates/footer.php';
?>