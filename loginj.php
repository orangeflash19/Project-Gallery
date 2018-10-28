<?php session_start();
include "includes/db.php";
include "includes/functions.php";

if(isset($_POST['submit'])){
signup();
}

if(isset($_POST['login'])){
userlogin();
}

if(isset($_POST['reset'])){
changePassword();
}
?>



<html>

<head>
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link href="css/newlogin.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/homepage.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/newlogin.js"></script>
    <script>
        $(document).ready(function(){
  $(".call_modal").click(function(){
	$(".modal").fadeIn();
	$(".modal_main").show();
	  });
});
$(document).ready(function(){
  $(".close").click(function(){
	$(".modal").fadeOut();
	$(".modal_main").fadeOut();
	  });
});
        
function ValidateEmail(email)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.loginform.email.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.loginform.email.focus();
return false;
}
}        
</script>
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
    <form name="loginform" action="loginj.php" method="post">
        <div id="main">
            <table border="0" cellspacing="10">
                <tr>
                    <td>
                        <div id="title">LOGIN</div>
                        <hr size="1px" width="100px" color="black" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="category" name="category" required>
                            <option value="student" selected>STUDENT</option>
                            <option value="teacher">TEACHER</option>
                            <option value="HOD">HOD</option>
                            <option value="admin">ADMIN</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" placeholder="email" name="username" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" placeholder="PASSWORD" name="password" required />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <div id="frt" class="call_modal" style="cursor:pointer;">FORGOT PASSWORD</div>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="login" value="LOGIN" id="signInBtn" onclick="ValidateEmail(document.loginform.email);" />
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <div id="signUpMsg">DON'T HAVE AN ACCOUNT <a href="#" id="flipToSignUp">SIGN UP</a></div>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <form name="signupform" action="loginj.php" method="post">
        <div id="signUpForm">
            <table border="0" cellspacing="10">
                <tr>
                    <td>
                        <div id="title">SIGN UP</div>
                        <hr size="1px" width="100px" color="black" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="category" name="category" required>
                            <option value="student" selected>STUDENT</option>
                            <option value="teacher">TEACHER</option>
                            <option value="HOD">HOD</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="FULL NAME" name="fname" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" placeholder="EMAIL ID" name="email" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" placeholder="PASSWORD" name="password" required />
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="submit" value="SIGN UP" id="signUpBtn" />
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <div id="signInMsg">HAVE AN ACCOUNT <a href="#" id="flipToSignIn">LOGIN</a></div>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <div class="modal">
        <div class="modal_close close"></div>
        <div class="modal_main">
            <img src="close2.png" class="close" style="margin-top:13px;left:96%;position:fixed;">
            <h1 id="cpt">FORGOT PASSWORD</h1>
            <br><br>
            <form action="loginj.php" method="post" name="form1">
                <div class="forgot">
                    <input type="email" name="email" placeholder="Enter your email.."><br><br>
                    <input type="password" name="password" placeholder="new password..."><br><br>
                    <input id="cp" type="submit" name="reset" value="Change password">
                </div>
            </form>

        </div>
    </div>
    <footer>
        <h1>&copy; PROJECT GALLERY</h1>

    </footer>

</body>

</html>