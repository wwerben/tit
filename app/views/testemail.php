<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Konfiguracja serwera SMTP
$smtpHost = 'mail.werben.pl'; // Host SMTP
$smtpUsername = 'hotel@werben.pl'; // Twój email
$smtpPassword = 'hotelhotel128'; // Twoje hasło
$smtpPort = 587; // Port SMTP

// Informacje o odbiorcy i nadawcy
$fromEmail = 'hotel@werben.pl'; // Twój email (nadawca)
$fromName = 'Your Name'; // Twoje imię
$toEmail = 'wwwerbinski@gmail.com'; // Email odbiorcy

$mail = new PHPMailer(true);

try {
    // Konfiguracja serwera SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;

    // Odbiorca
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail);

    // Treść wiadomości
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent using PHPMailer.';
    $mail->AltBody = 'This is a test email sent using PHPMailer.';

    $mail->send();
    echo 'Test email has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}