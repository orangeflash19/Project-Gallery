<?php 
if(isset($_POST['login'])){
    
	$roll_number = $_POST['roll'];
	$password = $_POST['password'];

    $connection = mysqli_connect('localhost', 'root', '', 'projectgallery');
    
    if($connection){
        echo "connection established";
    }else{
        die('connection FAILED' . mysqli_error());
    }
 
    $query = "INSERT INTO student_login(id,rollno,password) ";
    $query .= "VALUES('','$roll_number', '$password')";
 
 $result = mysqli_query($connection, $query);

 if(!$result){
	 die("query FAILED" . mysqli_error($connection));
 }
}
?>