<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './vendor/autoload.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

$mail->IsSMTP(); // active SMTP

$mail->SMTPOptions = [
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
  ]
];

$mail->SMTPDebug = SMTP::DEBUG_SERVER; // debogage: 1 = Erreurs et messages, 2 = messages seulement
$mail->Host = "SMTP.office365.com";
$mail->SMTPAuth = true;  // Authentification SMTP active
//$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
$mail->SMTPSecure = "TLS";
$mail->Port = 587;
$mail->Username = "jerrinald95190@live.fr";
$mail->Password = "HarryPotter00";
$mail->SetFrom('jerrinald95190@live.fr', 'Mail APP');
//$mail->addReplyTo('k.jerrinald@gmail.com', 'First Last');
$mail->Subject = 'PHPMailer Test Message';
$mail->Body = 'PHPMailer Test Message body';
//$mail->msgHTML("Hello, look at this mail");
//$mail->AltBody = 'Hello, look at this mail';
$mail->AddAddress('k.jerrinald@gmail.com', 'Kanikainathan Jerrinald');
$mail->addAttachment('C:\wamp64\www\service_plus_diamant\bijoux_S3\bijoux_S3\images\products\diamant1.jpg');
if(!$mail->Send()) {
	echo "Mail error: ".$mail->ErrorInfo;
} else {
	echo "Message envoyé";
}




?>