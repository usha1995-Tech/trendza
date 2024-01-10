<?php
include_once 'dbcon.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

function generateRandomString($length = 8) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$email=$_POST["email"];

$code= generateRandomString(8);


$sql = "INSERT INTO passwordreset (`email`, `code`) VALUES ('$email','$code')";

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    
    // echo "Email message sent.";

	if ($conn->query($sql) === TRUE) {

		// Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
		$mail->isSMTP();
		$mail->Host = 'smtp-mail.outlook.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = 587;
	
		$mail->Username = 'project1web@outlook.com'; // YOUR gmail email
		$mail->Password = 'Project1#'; // YOUR gmail password
	
		// Sender and recipient settings
		$mail->setFrom('project1web@outlook.com', 'Trendza');
		$mail->addAddress($email, 'Trendza');
		$mail->addReplyTo('project1web@outlook.com', 'Trendza'); // to set the reply to
	
		// Setting the email content
		$mail->IsHTML(true);
		$mail->Subject = "Forgot Password";
		$mail->Body = 'Use this code for pass reset. <b>'.$code.'</b>';
		$mail->AltBody = '';
	
		$mail->send();


    echo '<script language="javascript">';
	echo 'alert("Please Check Email");';
	echo 'window.location.href="../newpassword.php?email='.$email.'";';
	echo '</script>';

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

$conn->close();

?>

