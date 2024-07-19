<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$emailData = json_decode(file_get_contents('php://input'), true);

$smtpServer = $emailData['server'];
$html = $emailData['html'];
$subject = $emailData['subject'];
$recipient = $emailData['recipient'];


include "config.php";

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = $server[$smtpServer]["host"];
$mail->SMTPAuth = true;
$mail->Username = $server[$smtpServer]["username"];
$mail->Password = $server[$smtpServer]["password"];
$mail->SMTPSecure = $server[$smtpServer]["encryption"];
$mail->Port = $server[$smtpServer]["port"];

//From email address and name
$mail->setFrom($server[$smtpServer]["username"], $server[$smtpServer]["name"]);

//To address and name
$mail->addAddress($recipient); //Recipient name is optional

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $html;

$mail->smtpConnect([
    'tls' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);

try {
    $mail->send();
    $_SESSION['successMessage'] = "Email Sent Successfully";
    header('Location: sendmail.php');
    exit();
} catch (Exception $e) {
    error_log("Mailer Error: $mail->ErrorInfo ");
    $_SESSION['errorMessage'] = "Failed to send Email";
    header('Location: sendmail.php');
    exit();
}