<?php

use phpmailer\PHPMailer\Exception;
use phpmailer\PHPMailer\PHPMailer;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

envioCorreo();

function envioCorreo()
{

    if (isset($_POST['asunto']) && isset($_POST['email']) && isset($_POST['descripcion'])) {
        $asunto = $_POST['asunto'];
        $email = $_POST['email'];
        $descripcion = $_POST['descripcion'];

        echo $asunto;
        echo $email;
        echo $descripcion;
    } else {
        return;
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.office365.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'jcarlosbonilla@ucompensar.edu.co'; //SMTP username
        $mail->Password = 'Aqui va la contraseña'; //SMTP password
        $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('jcarlosbonilla@ucompensar.edu.co', 'Juan Bonilla Universidad');
        $mail->addAddress('jcarlosbonilla.gonzalez@gmail.com', 'Juan Personal'); //Add a recipient
        $mail->addAddress('deiby.garzon@massygroup.com', 'Deiby Garzon'); //Name is optional
        $mail->addAddress('juan.bonilla@massygroup.com', 'Juan Trabajo'); //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Usando libreria PHPMailer';
        $mail->Body = '<br />Asunto:' . $asunto . '<br />Correo' . $email . '<br />Descripcion:' .$descripcion;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }   

}
