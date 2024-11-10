<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuthTokenProvider.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function dathangmail($tieude, $noidung, $maildathang)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 2; // Enable verbose debug output
            $mail->isSMTP(); // gửi mail SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'hoang7620456@gmail.com'; // SMTP username
            $mail->Password = 'gjjl japf dbiz lbzo'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('hoang7620456@gmail.com', 'Mailer');
            $mail->addAddress($maildathang); // Add a recipient
            //$mail->addAddress('ellen@example.com'); // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('hoang7620456@gmail.com');
            $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
