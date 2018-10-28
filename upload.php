<?php 
include "includes/db.php";
include "includes/functions.php";
/*echo "<script>alert('its working')</script>";*/
projectUpload();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UPLOAD</title>
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" href="css/upload.css" type="text/css">
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
        </div>

    </header>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Project Title:<input id="title" type="text" placeholder="Project Title" name="title"></label><br>
        <label for="roll">Roll no:<input id="roll" type="number" placeholder="enter your roll number" name="roll" required></label><br>
        <label for="year">Project year:<input id="year" type="number" placeholder="4th" name="year" max="4" min="1" required></label><br>
        <label for="description">Project Abstract: <textarea id="description" cols="40" rows="3" placeholder="Abstract of your Project" name="abstract"></textarea></label><br><br><br>
        <h5>Project group members</h5>
        <label for="gmember">Member1:<input id="gmember" type="text" placeholder="Member1" name="mem1" required></label><br>
        <label for="gmember">Member2:<input id="gmember" type="text" placeholder="Member2" name="mem2"></label><br>
        <label for="gmember">Member3:<input id="gmember" type="text" placeholder="Member3" name="mem3"></label><br>
        <label for="gmember">Member4:<input id="gmember" type="text" placeholder="Member4" name="mem4"></label><br>

        <label for="upload">Upload screenshots:<input id="upload" type="file" placeholder="Upload screenshots of your project" name="file[]" multiple></label><br>
        <input type="submit" value="SUBMIT" name="submit">
    </form>
    <footer>
        <h1>&copy; PROJECT GALLERY</h1>

    </footer>
</body>

</html>