<?php 


    require 'PHPMailer/PHPMailerAutoload.php';

    $mail= new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host ='smtp.gmail.com';
    $mail->Port ='587';
    $mail->Username='muddapp11@gmail.com';
    $mail->Password='c4rp1nt3r0';

    $mail->setFrom('muddapp11@gmail.com','Proyecto-UCC');

    $mail->addAddress('jacarpintero19@ucatolica.edu.co','Jorge Carpintero');

    $mail->Subject='Bienvenido a Proyectos-UCC';
    $mail->Body = 'Bienvenido a nuestra plataforma.';

    if($mail->send()){
        echo'Correo Enviado';
    }else{
        echo 'Correo no Enviado';
    }


?>