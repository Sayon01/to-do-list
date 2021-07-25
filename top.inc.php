<?php
require("connection.inc.php");
require("function.inc.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <title>What To Do</title>
</head>
<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">What To Do</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                
                
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <h5>
                        <?php
                            if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']='yes') {
                                echo "<a class='nav-link' href='logout.php'>Log Out</a>";
                            }else{
                                echo "<a class='nav-link' href='login.php'>Log In</a>";
                            }
                        ?>
                    </h5>
                </div>
            </div>
        </nav>`
    </header>