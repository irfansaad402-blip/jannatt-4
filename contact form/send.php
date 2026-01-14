<?php
 //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
if(isset($_POST['Send'])){
  $Fullname = $_POST['Fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  //Load Composer's autoloader 
   require 'PHPMailer/Exception.php';
 require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'irfansaad402@gmail.com';                     //SMTP username
        $mail->Password   = 'djuv eijh pvcr vcpy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('irfansaad402@gmail.com', 'khawaja website');
        $mail->addAddress('janateirfjanate@gmail.com', 'HUMRI WEBSITE');

    


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email send';
        $mail->Body    = "Sender Fullname-$Fullname <br Sender email - $email <br> Sender phone-$phone<br> message-$message";
    

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  





}

   

    ?>
