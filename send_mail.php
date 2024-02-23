<?php
// Include PHPMailer autoloader
include('SMTP/PHPMailerAutoload.php');

$to = 'naveenkr153@gmail.com';
$subject = $_REQUEST['subject'];
$message = $_REQUEST['text_area'];
$name = $_REQUEST['name'];
$from = strtolower($_REQUEST['email']);
// $headers = 'From: ' . $_REQUEST['email'] . "\r\n" . 'Name: ' . $_REQUEST['name'] . "\r\n";
$new_msg = 'From: ' . $from . "<br><br>" . $message;
// echo $new_msg. "<br>";
// echo $name. "<br>" . $from. "<br>" . $subject . "<br>" . $message . "<br>" . $to;

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Change this to your SMTP host
$mail->Port = 587; // Change this to your SMTP port
$mail->SMTPSecure = 'tls'; // Change to 'ssl' if required
$mail->SMTPAuth = true;
$mail->Username = $to; // Change this to your SMTP username
$mail->Password = 'yafm iykq eegc kede'; // Change this to your SMTP password

// Sender and recipient
$mail->setFrom($to, $name);
$mail->addAddress($to, $name);

// Email content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $new_msg;

// Send email
if ($mail->send()) {
    echo 'Email sent successfully!';
} else {
    echo 'Error: ' . $mail->ErrorInfo;
}

//send mail
// if(mail($to, $subject, $message, $headers)){
// 	echo "<script>alert('Mail sent sucessfully!');</script>";
// }else{
//     echo "<script>alert('Sending mail failer!');</script>";
// }

header("Location: index.html");
?>
