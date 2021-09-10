<?php
    session_start();
?>

<head>
    <title>
        Music portal
    </title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        .brand-text{
            color: #14a85c !important;
        }
        form{
            max-width: 660px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text center">Music portal</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li>
                    <?php
                        if (isset($_SESSION["useruid"])) {
                            echo "<a href='add.php' class='btn brand z-depth-0'>Add a song</a>";
                            echo "<a href='reports.php' class='btn brand z-depth-0'>Add a report</a>";
                            echo "<a href='includes/logout.inc.php' class='btn brand z-depth-0'>Log out</a>";

                        }else{
                            echo "<a href='login.php' class='btn brand z-depth-0'>Log in</a>";
                        }
                    ?>
                    <a href="signup.php" class="btn brand z-depth-0">Sign up</a>
                </li>
            </ul>
        </div>
    </nav>