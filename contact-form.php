
<?php 
  if(isset($_POST['newsletterEmail'])){
	  
	$to =$_POST["newsletterEmail"];

	$from = "thejobemuhammed@gmail.com";
	// Email Receiver Address
	$receiver= $to;
	$subject="Contact us form details";
	$comment = "Hey we've signed you up to the newsletter!";
	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>


	<p style='font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#000;'>Message: ".nl2br($comment)."</p><br/>

	</body>
	</html>
	";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <'.$from.'>' . "\r\n";
   if(mail($receiver,$subject,$message,$headers))  
   {
	   // Alert Message
      echo "Thankyou for your message! We will contact you back from";
   }
   else
   {	
   	 // Fail Message
      echo "Sorry... ! The message could not been sent!";
   }

}
?>
