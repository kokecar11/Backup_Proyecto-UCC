<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['nombregp-reg'])){
        require_once "../controladores/groupController.php";
        $insgroup = new groupController();

        if(isset($_POST['nombregp-reg'])&&isset($_POST['Tipo_pross'])&&isset($_POST['Estudiante1-reg'])&&isset($_POST['Estudiante2-reg'])&&isset($_POST['Asesor-reg'])&&isset($_POST['Jurado1-reg'])&&isset($_POST['Jurado2-reg'])){
            echo $insgroup->add_group_controller();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }