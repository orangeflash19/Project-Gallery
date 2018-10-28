<?php 
include "includes/db.php";

//function to upload the project 
function projectUpload(){
    global $connection;
    
    if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $count = count($_FILES['file']['name']);
    if($count > "6"){
        echo "<script>alert('Please do not upload more than 6 screenshots');</script>";
        header("Location: upload.php");
        die();
    }
        
        
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $roll = mysqli_real_escape_string($connection, $_POST['roll']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);    
    $abstract = mysqli_real_escape_string($connection,$_POST['abstract']);
    $mem1 = mysqli_real_escape_string($connection, $_POST['mem1']);
    $mem2 = mysqli_real_escape_string($connection, $_POST['mem2']);
    $mem3 = mysqli_real_escape_string($connection, $_POST['mem3']);
    $mem4 = mysqli_real_escape_string($connection, $_POST['mem4']);
   
    $query = "INSERT INTO projects (id, project_title, project_abstract, year, mem1, mem2, mem3, mem4) VALUES ('$roll', '$title', '$abstract', '$year', '$mem1', '$mem2', '$mem3', '$mem4')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("error query" . mysqli_error($connection));
    }


    
    for($x=0; $x < $count; $x++){
    $fileName = $_FILES['file']['name'][$x];
    $fileTmpName = $_FILES['file']['tmp_name'][$x];
    $fileSize = $_FILES['file']['size'][$x];
    $fileError = $_FILES['file']['error'][$x];
    $fileType = $_FILES['file']['type'][$x];
    
    //storing the extension of a file in a variable
    $fileExt = explode('.', $fileName);
    
    //converting all the letters in extension to lowercase if there are any uppercase letters
    $fileActualExt = strtolower(end($fileExt));
    
    //array to store types of file allowed to upload
    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
    
    //checking to see if extension of uploaded file is in the array
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 716800){
                $fileNameNew[$x] = $fileName . uniqid('', true) . "." . "$fileActualExt";
    

                
                
                $fileDestination = 'images/' . $fileNameNew[$x];
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: upload.php?uploadSuccess");
            }else{
                echo "Your file size is too big!";
            }
        }else{
            echo "There was an error uploading your file!";
        }
    }else{
        echo "You cannot upload files os this type!!";
    }
   }
    
    $fil1 = $fileNameNew[0];
    $fil2 = $fileNameNew[1];
    $fil3 = $fileNameNew[2];
    $fil4 = $fileNameNew[3];
    $fil5 = $fileNameNew[4];
    $fil6 = $fileNameNew[5];
    
     $query = "INSERT INTO screenshot(id, image1, image2, image3, image4, image5, image6) VALUES ('$roll', '$fil1', '$fil2', '$fil3', '$fil4', '$fil5', '$fil6')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("query Failed" . mysqli_error($connection));
    }else{
        echo "<script>alert('project uploaded successfully');</script>";
    }
}
}
//function for new user signup
function signup(){
    global $connection;
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['category'];
    

    
    $fname = mysqli_real_escape_string($connection, $fname);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "INSERT INTO users (id, full_name, email, password, type) VALUES('','$fname','$email','$password','$type')";
    $result = mysqli_query($connection, $query);
}

function userlogin(){
    global $connection;
    $type = $_POST['category'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $type = mysqli_real_escape_string($connection, $type);
    
    $query = "SELECT * FROM users where email = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("query failed" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($select_user_query)){
        $email = $row['email'];
        $pass = $row['password'];
        $type = $row['type'];
        $name = $row['full_name'];
    }
    if($username !== $email && $password !== $pass){
        header("Location: loginj.php");
    }else if($username == $email && $password == $pass){
        
        $_SESSION['username'] = $name;
        header("Location: homepage.php");
    }else{
        header("Location: loginj.php");
    }
}

function changePassword(){
    global $connection;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    
    require "PHPMailer/PHPMailerAutoload.php";
    $mail = new PHPMailer();
    /*$mail->SMTPDebug = 4;*/
    $mail->isSMTP();
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    
    $mail->Username = "rentaros80@gmail.com";
    $mail->Password = "satomiren";
    
    $mail->setFrom($email);
    $mail->addAddress("bhosaleranveer99@gmail.com");
    $mail->addReplyTo($email);
    
    $mail->isHTML(true);
    $mail->Subject = "Password Change";
    $mail->Body = 'Your Password has been updated.';
    
    if(!$mail->send()) {
    echo '<script>alert("Message could not be sent.");</script>';
    /*echo 'Mailer Error: ' . $mail->ErrorInfo;*/
    } else {
    echo '<script>alert("Message has been sent");</script>';
    }
    
    $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "<script>alert('Password has been changed successfully.');</script>";
    }else{
        die("query failed" . mysqli_error($connection));
    }   
    
/*//SMTP 
ini_set("SMTP","smtp.gmail.com" ); 
ini_set('sendmail_from', 'bhosaleranveer99@gmail.com');     
    // the message
$msg = "Your password has been changed.";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
//header
$headers = "From: pgallery@gamil.com";    
// send email
mail($email,"Confirmation Email from Project Gallery!",$msg,$headers);*/
}

function contactForm(){
    global $connection;
        
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mesg = $_POST['mesg'];
    
    $fname = mysqli_real_escape_string($connection, $fname);
    $email = mysqli_real_escape_string($connection, $email);
    $mesg = mysqli_real_escape_string($connection, $mesg);
    
    require "PHPMailer/PHPMailerAutoload.php";
    $mail = new PHPMailer();
    /*$mail->SMTPDebug = 4;*/
    $mail->isSMTP();
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    
    $mail->Username = "rentaros80@gmail.com";
    $mail->Password = "satomiren";
    
    $mail->setFrom($email, $fname);
    $mail->addAddress("bhosaleranveer99@gmail.com");
    $mail->addReplyTo($email, $fname);
    
    $mail->isHTML(true);
    $mail->Subject = "Contact Form feed";
    $mail->Body = "Form Submission:" . "<br><br>" . $mesg . "<br><br>" . $fname . "<br><br>" . $email;
    
    if(!$mail->send()) {
    echo '<script>alert("Message could not be sent.");</script>';
    /*echo 'Mailer Error: ' . $mail->ErrorInfo;*/
    } else {
    echo '<script>alert("Message has been sent");</script>';
    }
    
    
    $query = "INSERT INTO contact (id, full_name, email, message) VALUES('','$fname','$email','$mesg')";
    $result = mysqli_query($connection, $query);
    if($result){
        echo '<script>alert("Thank you for your feedback");</script>';
    }else{
        die("query Failed" . mysqli_error($connection));
    }
}
?>