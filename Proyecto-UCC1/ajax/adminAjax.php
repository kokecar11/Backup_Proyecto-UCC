<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['names-reg'])){
        require_once "../controladores/adminController.php";
        $insAdmn = new adminController();

        if(isset($_POST['names-reg'])&&isset($_POST['lastnames-reg'])&&isset($_POST['email-reg'])&&isset($_POST['password1-reg'])&&isset($_POST['password2-reg'])){
                echo $insAdmn->add_coord_controller();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }