<?php session_start();
include "includes/db.php";
include "includes/functions.php";

    
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Project Detail</title>
    
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" href="css/detail.css" type="text/css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/homepage.js"></script>
    <script type="text/javascript">
    //call ajax
    $(document).ready(function(){
       
        $("#displayImage").click(function{
            var image1 = $("#displayImage")       $.post("detail.php", {
            detail: image1
        }, function(data, status){
           var imng = data;
        });              
                                 });
        
    });
    </script>
</head>

<body id="random-bg">
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
<?php 
        
    
        $query = "SELECT * FROM projects, screenshot WHERE projects.id = screenshot.id";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("query failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($result)){    
        $id = $row['id'];   
        $title = $row['project_title'];
        $abstract = $row['project_abstract'];
        $mem1 = $row['mem1'];
        $mem2 = $row['mem2'];
        $mem3 = $row['mem3'];
        $mem4 = $row['mem4'];
        
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $image4 = $row['image4'];
        $image5 = $row['image5'];
        $image6 = $row['image6'];
        
        ?>
    <h1 id="title"><?php echo $title; ?></h1><br><br>
    <img id="test" style="display: none;" src="" height="100px" width="100px">
    <section><?php echo $abstract; ?></section>
    <h3>Group members</h3>
    <table class="group">
        <th></th>
        <tr>
            <td><?php echo $mem1; ?></td>
        </tr>
        <tr>
            <td><?php echo $mem2; ?></td>
        </tr>
        <tr>
            <td><?php echo $mem3; ?></td>
        </tr>
        <tr>
            <td><?php echo $mem4; ?></td>
        </tr>
    </table>

    <table class="screenshot">
        <tr>
            <td><div class="shot"><img src="images/<?php echo $image1 ?>" alt="<?php echo $id ?>" height="400px" width="400px"/></div></td>
            <td><div class="shot"><img src="images/<?php echo $image2 ?>" alt="<?php echo $id ?>" height="400px" width="400px"/></div></td>
        </tr>
        <tr>
            <td><div class="shot"><img src="images/<?php echo $image3 ?>" alt="<?php echo $id ?>" height="400px" width="400px"/></div></td>
            <td><div class="shot"><img src="images/<?php echo $image4 ?>" alt="<?php echo $id ?>" height="400px" width="400px"/></div></td>
        </tr>
        <tr>
            <td><div class="shot"><img src="images/<?php echo $image5 ?>" alt="<?php echo $id ?>" height="400px" width="400px"/></div></td>
            <td><div class="shot"><img src="images/<?php echo $image6 ?>" alt="<?php echo $id ?>" height="400px" width="400px"/></div></td>
        </tr>
        
    </table>
 <?php } ?>
    
    
    
    <footer>
        <h1>&copy; PROJECT GALLERY</h1>

    </footer>
</body>

</html>