<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php



require_once 'swiftmailer-5.x/lib/swift_required.php';

//post Data

$name= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message= filter_var($_POST['message'], FILTER_SANITIZE_STRING);


//Email body

$data = "Name: ". $name . "<br/>" . "<br/>" . "Email: " . $email .  '<br />' . "<br/>" . "Message: " . $message;


// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('deepakinnewway@gmail.com')
  ->setPassword('9042310450');

/*
You could alternatively use a different transport such as Sendmail or Mail:

// Sendmail
$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

// Mail
$transport = Swift_MailTransport::newInstance();
*/

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('deepakinnewway@gmail.com' => 'Job'))
  ->setTo(array('deepakraj.a@outlook.com' => 'A Personal'))
  ->setSubject('Recriter job')
  ->setBody($data, 'text/html');
  

// Send the message
$result = $mailer->send($message);
?>
<button type="button" id="close1"></button>
                                
                                  <script>
								  window.onload= function(){
									   
                                  $("#close1").click(function(){
									 
						  			 window.location.href='../index.php';
									})
									setTimeout( function(){$("#close1").trigger("click");},100)
								  }
                                  </script>
</body>
</html>