<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $name = $_POST['name'];
  $to = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['message'];

  try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output (for development only)
    $mail->isSMTP();                   // Send using SMTP
    $mail->Host = 'smtp.gmail.com';       // Set the SMTP server to send through
    $mail->SMTPAuth = true;               // Enable SMTP authentication
    $mail->Username = 'ahmedsiddiqui3277@gmail.com'; // SMTP username
    $mail->Password = 'nlwx uhmd aave dsxb';  // Replace with your actual password (avoid storing it in plain text)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
    $mail->Port = 465;                   // TCP port to connect to

    // Recipients
    $mail->setFrom('ahmedsiddiqui3277@gmail.com', $name . ' from allaboutahmed.site');
    $mail->addAddress('ahmedsiddiqui3277@gmail.com', $name . ' - allaboutahmed.site');  // Add a recipient

    // Content
    $mail->isHTML(true);                    // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = 'This is sender email ->'.$to.'<br>'.$msg;

    $mail->send();

  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  // Redirect to success page (assuming success.html exists)
  if (!$e) {
    header('Location: success.html');
    exit;
  }
} else {
  // Redirect to about.html if not a POST request
  header("location: about.html");
}
?>