<?php 
include "includes/db.php";
include "includes/functions.php";

if(isset($_POST['csubmit'])){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mesg = $_POST['mesg'];
    
    $fname = mysqli_real_escape_string($connection, $fname);
    $email = mysqli_real_escape_string($connection, $email);
    $mesg = mysqli_real_escape_string($connection, $mesg);
    
    $query = "INSERT INTO contact (id, full_name, email, message) VALUES('','$fname','$email','$mesg')";
    $result = mysqli_query($connection, $query);
    if($result){
        echo '<script>alert("Thank you for your feedback");</script>';
    }else{
        die("query Failed" . mysqli_error($connection));
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PROJECT GALLERY|Contact us page</title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/homepage.js"></script>
    <script type="text/javascript">
        function validate_contact() {
            var fname = document.forms["contact_form"]["fname"].value;
            var lname = document.forms["contact_form"]["lname"].value;
            var mail = document.forms["contact_form"]["mail"].value;

            //condition to check if fname and lname contain any number
            var alphaexp = /^[a-zA-Z]+$/;
            if (fname.value.match(alphaexp)) {
                return false;
            } else {
                alert("first name cannot contain numbers");
            }

        }
    </script>
</head>

<body>
    <header>
        <div class="logo"><img src="img/pblogo.jpg" alt="logo" class="logo">
        </div>
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
    <h1>LET'S WORK TOGETHER</h1>
    <div class="contact-form">
        <form name="contact_form" action="" method="post" onsubmit="return validate_contact();">
            <br><br>
            <input type="text" name="fname" id="fname" placeholder="Full name" required><br><br>

            <!--<input type="text" name="lname" id="lname" placeholder="last name" required><br><br>-->

            <input type="email" name="email" id="mail" placeholder="your email" required><br><br>


            <!--<input type="text" name="bugs" id="bugs" placeholder="Let us know if you have found any errors...">--><br><br>

            <input type="text" name="mesg" id="mesg" placeholder="Let us know if you have any particular suggestions..." required><br><br>
            <input type="submit" name="csubmit" id="csubmit" value="send">
        </form>
    </div>
    <div class="mapwrapper">
     <div class="MAP">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1333.1547546856166!2d72.992872017905!3d19.07555815426853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6cae0d8c5ab%3A0xbbf4481d662ca2d8!2sFr.+C.+Rodrigues+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1535193529007" width="800px" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        </div>
        
    <footer>
        <h1>&copy; PROJECT GALLERY</h1>
    </footer>
</body>

</html>