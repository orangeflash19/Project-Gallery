<?php 
if(isset($_POST['upload'])){
	$image = $_POST['image'];
	$title = $_POST['title'];
    $decription = $_POST['description'];

$connection = mysqli_connect('localhost', 'root', '', 'projectgallery');
 
/* $query = "INSERT INTO student_upload(id,image,title,description) ";
 $query .= "VALUES('','$image', '$title','$decription')";*/
 $query = "SELECT * FROM student_upload ";
 $result = mysqli_query($connection, $query);

 if(!$result){
	 die("query FAILED" . mysqli_error($connection));
 }
 
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
     while ($row = mysqli_fetch_assoc( $result)){
         print_r($row);
     /*   $img = $row['image']; 
      echo "<div id='img_div'>";
      	echo "<img src="$img" >";
      	echo "<p>".$row['title']."</p>";
      echo "</div>";*/
    }
  ?>
  <form method="POST" action="new_img_test.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>