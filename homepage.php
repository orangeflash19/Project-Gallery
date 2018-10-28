<?php session_start(); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/homepage.js"></script>
</head>

<body>
    <header>

        <img src="img/pblogo.jpg" alt="logo" class="logo">
        <div id="menuicon">
            <div id="menuline"></div>
        </div>
        <div id="mainmenu">

            <img src="img/pblogo.jpg" alt="logo" class="logo">
            <ul class="menu">
                <li><a href="homepage.php" data-text="Home">Home</a></li>
                <li><a href="project1.php" data-text="Projects">Projects</a></li>
                <li><a href="about.html" data-text="about us">about us</a></li>
                <li><a href="contact.php" data-text="contact us">contact us</a></li>
            </ul>
            <div id="close"><img src="img/close.png" alt="close"></div>
            <br><br>
            <?php if(isset($_SESSION['username'])){?> 
            <h3 style="text-align: center; color: #fff;">
                <?php echo $name = $_SESSION['username']; ?>
            </h3>
            <?php } ?>
            <!--<button type="button"><a href="logout.php" style="color: #fff;">LOG OUT</a></button>-->
        </div>

    </header>

    <video autoplay loop id="video-background" muted plays-inline>
        <source src="img/cover.mp4" type="video/mp4">
    </video>
    <div class="msg">
        <h1>DON'T LEARN TO CODE LEARN TO CREATE!!</h1><br><br>

        <?php
        if(isset($_SESSION['username'])){
       echo ' <a href="logout.php" class="btnlog">LOGOUT</a>';
       echo '<a href="upload.php" class="btnup">UPLOAD</a>';        
        }else{
              echo ' <a href="loginj.php" class="btnlog">LOGIN</a>';
        }
            ?>

    </div>

    <!--<div id="box1">
        <h1>Some content</h1>
    </div>
    <div id="box2">
        <h1>Some content</h1>
    </div>
    <div id="box3">
        <h1>some content</h1>
    </div>-->
    <footer>
        <h1>&copy; PROJECT GALLERY</h1>
    </footer>
</body>

</html>