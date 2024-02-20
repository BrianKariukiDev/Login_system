<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    require 'PHPMailer/PHPMailer-master/src/Exception.php';
    require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer/PHPMailer-master/src/SMTP.php';

    if(isset($_SESSION['email'])){
        $mail=new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth= true;
        $mail->Username='brianke100@gmail.com';
        $mail->Password='bcmbzpcftdduszfr';
        $mail->SMTPSecure='ssl';
        $mail->Port=465;

        $mail->setFrom('brianke100@gmail.com');

        $mail->addAddress($_SESSION['email']['email']);

        $mail->isHTML(true);

        $mail->Subject="Successful account creation";
        $mail->Body="Hello ".$_SESSION['email']['username']." .This is to notify you that your account was successfully created with password: ".$_SESSION['email']['password'];

        // try {
        //     // Email sending code here
        //     $mail->send();
        //     echo 'Email sent successfully!';
        // } catch (Exception $e) {
        //     echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
        // }

        $mail->send();
        
        header('location:'.'login.php');
        die();

    }