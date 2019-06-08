<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['AsuntoMail'])){
        require_once "../controladores/contactController.php";
        $inscontact = new contactController();

        if(isset($_POST['AsuntoMail'])&&isset($_POST['Email_receptor'])&&isset($_POST['BodyMail'])){
            echo $inscontact->send_Mail();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }