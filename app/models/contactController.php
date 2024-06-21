<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/PHPMailer/src/SMTP.php';
require '../vendor/autoload.php';


     if($_POST){
        $nom=$_POST["name"];
        $email=$_POST["Email"];
        $adresse=$_POST["adress"];
        $phone=$_POST["phone"];
        $message=["message"];

        if(!empty($nom) && !empty($email) && !empty($adresse) && !empty($phone) && !empty($message)){
            sendEmail($nom,$adresse,$phone,$message,$email);
        }else{
            echo"<script>";
            echo"alert('message envoye avec succes');";
       echo" </script>";
        }

       
     }
  
function sendEmail($nom,$adresse,$phone,$message,$email) {
    $mail = new PHPMailer(true);
    try {
        // Configuration du serveur
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre hôte SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'ecoservicefrance33@gmail.com'; // Remplacez par votre email
        $mail->Password = 'dsyqastigkyghmpx'; // Remplacez par votre mot de passe
      
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom('ecoservicefrance33@gmail.com', 'Eco-services');
        $mail->addAddress('franckfone10@gmail.com'); // Remplacez par l'email de l'administrateur

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'un utilisateur vous a contacte';
        $mail->Body = "<p>Un utilisateur a rempli le formulaire de contact.</p>
       
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $phone</p>
        <p><strong>Adresse :</strong> $adresse</p>
        <p><strong>message :</strong> $message</p>";

        $mail->send();

        echo"<script>";
            echo"alert('message envoye avec succes');";
            echo" window.location.href = '/ecoservices/public/home';";
       echo" </script>";

       header('Location: /ecoservices/public/home');
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}";
    }
}

?>