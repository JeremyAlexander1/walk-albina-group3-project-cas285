

<?php
 
require 'connection.php';
$conn    = Connect();
$name    = $conn->real_escape_string($_POST['name']);
$email    = $conn->real_escape_string($_POST['email']);
$comment = $conn->real_escape_string($_POST['comment']);
$query   = "INSERT into albina_form (name,email,comment) VALUES('" . $name . "','" . $email . "','" . $comment . "')";
$success = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}
 
 
$conn->close();

date_default_timezone_set('America/Los_Angeles');

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.thealexandradesigns.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "questions@thealexandradesigns.com";
//Password to use for SMTP authentication
$mail->Password = "D4ydream2018";
//Set who the message is to be sent from
$mail->setFrom('questions@thealexandradesigns.com', 'Alexandra Nitsche');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('alexandra.nitsche@pcc.edu', 'Alexandra Nitsche');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->IsHTML(true);
$mail->Body = 'Email:' . $_POST['email'] . '<br>';
$mail->Body .= 'Name:' . $_POST['name'] . '<br>';
$mail->Body .= 'Message:' . $_POST['comment'] . '<br>';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Thank you for your message. We will get back to you as soon as we can!";
}



