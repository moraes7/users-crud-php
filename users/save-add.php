<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "../connect_mysql.php";

if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $profile = $_POST["profile"];
    
    if(isset($_FILES["image"]) && !empty($_FILES["image"])) {
        $image = "../photos/".$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    } else {
        $image = "";
    }

    $sql = "INSERT INTO USERS (name, last_name, email, password, profile, created_at, updated_at, image) VALUES ('$name', '$last_name', '$email', '$password', '$profile', current_timestamp(), current_timestamp(), '$image')";

    if($conn->query($sql) === TRUE) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;              
            $mail->isSMTP();                                          
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     
            $mail->SMTPAuth   = true;                          
            $mail->Port       = 2525;                   
            $mail->Username   = 'b2e19c6213b7e7';                 
            $mail->Password   = 'd81c1c3abd5112';                           
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;       
 

            //Recipients
            $mail->setFrom('nicolasmoraes_7@outlook.com', 'Nicolas');
            $mail->addAddress($email, $name);     
           
            //Content
            $mail->isHTML(true);                                 
            $mail->Subject = 'E-mail registrado com sucesso!';
            $mail->Body    = "Ola $name,<br><br>Seja bem vindo!";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header("Location: index.php");

        die();
    }

    $conn->close();

}

?>