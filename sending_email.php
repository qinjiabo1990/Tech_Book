<!--Send email
      Author: PHPMailer
      Source: PHPMailer api
      Last accessed date: 24-5-2018
      Function: Sending email-->
<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = "mailhub.eait.uq.edu.au";              // Specify main and backup SMTP servers
$mail->Port = 25;                                    // TCP port to connect to

//Recipients
$mail->setFrom('yingluo.peng@uqconnect.edu.au', $_REQUEST['name']);
$mail->addAddress('yingluo.peng@uqconnect.edu.au', 'Sherry');     // Add a recipient
$mail->addAddress('yingluo.peng@uqconnect.edu.au');               // Name is optional

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $_REQUEST['email'];
$mail->Body    = $_REQUEST['message'];

if(!$mail->send()) {
    echo "<script language=\"JavaScript\">alert(\"Message could not be sent.\");</script>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo "<script>location.href='contact_us.php'</script>";
} else {
    echo "<script language=\"JavaScript\">alert(\"Message has been sent.\");</script>";
    echo "<script>location.href='index.php'</script>";
}
?>
