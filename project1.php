<?php session_start();
include "includes/db.php";
include "includes/functions.php";




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>project page</title>
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" href="css/project1.css" type="text/css">
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
    <!--
    <div class="catList">
        <ul class="category">
            <li>All Projects</li>
            <li>2nd Year</li>
            <li>3rd Year</li>
            <li>4th Year</li>
        </ul>
    </div>--><br><br><br><br><br>

    <?php 
$query = "SELECT * FROM screenshot";
$result = mysqli_query($connection, $query);
if(!$result){
    die("query failed" . mysqli_error($connection));
}
    
    $data = array();    
    while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;    
    $id = $row['id'];    
    $image = $row['image1'];
     ?>

    <a href="detail.php" ?id=<?php echo $id; ?>><img id="displayImage" src="images/<?php echo $image ?>" alt="<?php echo $id ?>" height="400px" width="400px" /></a>


    <?php
      }
    
    ?>

    <footer>
        <h1>&copy; PROJECT GALLERY</h1>

    </footer>
</body>

</html>