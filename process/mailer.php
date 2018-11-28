<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libs/PHPMailer/src/Exception.php';
require '../libs/PHPMailer/src/PHPMailer.php';
require '../libs/PHPMailer/src/SMTP.php';

function mail_it($to, $subject, $body){

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bcdunofficial@gmail.com';
    $mail->Password = 'notgoingtoshowthisitem';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('bcdunofficial@gmail.com', 'UCK DSC');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;
    if($mail->send()){
        return true;
    }
    else{
        return false;
    }



}//end of function
?>
