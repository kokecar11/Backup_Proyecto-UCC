<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['codgpjurado'])){
        require_once "../controladores/juradosController.php";
        $insjurados = new juradosController();
        
        if(isset($_POST['codgpjurado'])&&isset($_POST['jurado1'])&&isset($_POST['jurado2'])){
            echo $insjurados->add_jurados_controller();
        }
       
    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }