<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['titulofile-reg'])){
        require_once "../controladores/fileController.php";
        $insfile = new fileController();

        if(isset($_POST['titulofile-reg'])){
            echo $insfile->add_file_controller();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }