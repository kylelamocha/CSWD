<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="../css/contact.css">    
    <title>Contact Us</title>
   
    
</head>
<body>

<?php

 session_start();

 include("connection.php");
 
 if($_POST)
{	 
	 $name = $_POST['c_name'];
	 $email = $_POST['c_email'];
	 $message = $_POST['c_message'];
	 $sql = "INSERT INTO contact (c_name,c_email,c_message)
	 VALUES ('$name','$email','$message')";
	 if (mysqli_query($database, $sql)) {
        //echo '<script>alert("Thank you for writing to us!")</script>';
        echo '<script language="javascript">';
        echo 'alert("Thank you for writing to us!")';
        echo '</script>';    
        //$error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Thank you for writing to us!</label>';
	 }else {
		echo "Error: " . $sql . "
" . mysqli_error($database);
	 }
   header('location: contact.php');
   exit;
     
}
 
?>

<div class="container">
    <div class="content">
      <div class="left-side">
      <a href="index.html">Go Back to Main Page</a>
      
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Ground Floor, Legislative Building, City Hall, Capistrano-Hayes, Cagayan de Oro, Philippines</div>
          <!--<div class="text-two">Birendranagar 06</div>-->
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">0970 039 2709</div>
          <!--<div class="text-two">+0096 3434 5678</div>-->
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">cswdpsychosocial@gmail.com</div>
          <!--<div class="text-two">info.codinglab@gmail.com</div>-->
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <!--<p>If you have any work from me or any types of queries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>-->
      <form action="#" method="POST" >
        <div class="input-box">
          <input type="text" name="c_name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <input type="text" name="c_email" placeholder="Enter your email" required>
        </div>
        <div class="input-box message-box">
         <input type="text" name="c_message" placeholder="Enter your message" required>
        </div>
        <div class="button">
          <input type="submit" value="Submit" >
        </div>
      </form>
    </div>
    </div>
  </div>



</body>
</html>