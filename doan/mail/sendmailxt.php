<meta charset="UTF-8">

<?php
include "../mail/PHPMailer/src/PHPMailer.php";
include "../mail/PHPMailer/src/Exception.php";
include "../mail/PHPMailer/src/OAuth.php";
include "../mail/PHPMailer/src/POP3.php";
include "../mail/PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;    
$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 0;                              // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'vienvienvien11233@gmail.com';                 // SMTP username
    $mail->Password = 'ozisorbjdexihcds';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('vienvienvien11233@gmail.com', 'Tuyen sinh nganh Giao duc Mam non 2022');
    $mail->addAddress($_SESSION['eml'],$rows['Ho_Ten']);     // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Tuyen sinh ngang Giao duc Man non 2022';
    $mail->Body    = 'Thong tin ca nhan da duoc xac thuc,ho so cua ban là:'.$rows['Id'].'';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    unset($_SESSION['eml']);
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
