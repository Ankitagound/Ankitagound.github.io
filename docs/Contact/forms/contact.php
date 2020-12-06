<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/Ankita/Desktop/portfolio/portfolio/PHPMailer/src/Exception.php';
require 'C:/Users/Ankita/Desktop/portfolio/portfolio/PHPMailer/src/PHPMailer.php';
require 'C:/Users/Ankita/Desktop/portfolio/portfolio/PHPMailer/src/SMTP.php';

$name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

$_POST = 0;
// True because $a is set
if (isset($_POST['send-msg'])) 
{

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'ankitagound17@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  
  //--------------------------------------- php mailer ---------------------------------------

  // require 'vendor/autoload.php';

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'designingmind.ux@gmail.com';                     // SMTP username
      $mail->Password   = 'Ankita@123';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom('designingmind.ux@gmail.com', 'Query from USer');
      $mail->addAddress('ankitagound17@gmail.com', 'Ankita');     // Add a recipient
      // $mail->addAddress('ellen@example.com');               // Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');
  
      // Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Msg received from website';
      $mail->Body    = "This msg is received from website.<br> Name is - ".$name. "<br> email id - ".$email.
                        "<br> Subject is - ".$subject. "<br>Msg is - ".$message.;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      //echo 'Message has been sent';
  } catch (Exception $e) {
      //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  //-------------------------------------- php mailer end ------------------------------------
  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  // /*
  // $contact->smtp = array(
  //   'host' => 'https://ankitagound.github.io/portfolio/',
  //   'username' => 'example',
  //   'password' => 'pass',
  //   'port' => '587'
  // );
  // */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
}
?>
