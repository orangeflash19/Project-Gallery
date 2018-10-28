 <?php

$connection = mysqli_connect("localhost", "root", "", "projectgallery");
 
if(!$connection){
	
	die("connection FAILED" . mysqli_error());
}
?>