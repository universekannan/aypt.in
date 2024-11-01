<?php
$status = "";
$to = "universekannan@gmail.com";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$feedback = $_POST['feedback'];
	
	if(empty($name) || empty($phone) || empty($email) || empty($address) || empty($feedback))
	{
		$status = "Please Go Back and fill required fields.";
	}
	
	if(empty($status))
	{
	
		 $subject = "AYPT Feed Back: ";
         $message  = "\n Name: ".$name."\r\n";
         $message .= "\n Phone: ".$phone."\r\n";
		 $message .= "\n Email: ".$email."\r\n";
		 $message .= "\n Address: ".$address."\r\n";
		 $message .= "\n Feedback: ".$feedback."\r\n";
         
         $header = "From:kannamalpublication@gmail.com \r\n";
         $header .= "Cc:kannamalpublication@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            $status = "Message sent successfully...";
         }else {
            $status = "Message could not be sent...";
         }
		 
	}
}
?>

<!Doctype html>
<html>
<head>
	<title>Email</title>
</head>
<body>
<h1><?php echo $status; ?></h1>
</body>
</html>