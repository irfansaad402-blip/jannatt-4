<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files
require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Fullname = htmlspecialchars(strip_tags($_POST['Fullname']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $message_content = htmlspecialchars(strip_tags($_POST['message']));

    // Create PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'irfansaad402@gmail.com'; // apna Gmail
        $mail->Password = 'djuv eijh pvcr vcpy';    // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('yourgmail@gmail.com', 'Website Contact');
        $mail->addAddress('janateirfjanate@gmail.com'); 

        // Email content
        $mail->isHTML(false);
        $mail->Subject = "New message from $Fullname";
        $mail->Body = "You have received a new message from your website contact form.\n\n".
                      "Name: $Fullname\nEmail: $email\nPhone: $phone\nMessage:\n$message_content\n";

        $mail->send();
        echo "Message has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
