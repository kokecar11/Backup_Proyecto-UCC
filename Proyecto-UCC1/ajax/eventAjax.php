<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['cod-gpevent'])){
        require_once "../controladores/eventController.php";
        $insEvent = new eventController();

        if(isset($_POST['cod-gpevent'])&&isset($_POST['title_event'])&&isset($_POST['descrip_event'])&&isset($_POST['añof'])&&isset($_POST['mesf'])&&isset($_POST['diaf'])&&isset($_POST['horaf'])&&isset($_POST['minutosf'])){
            echo $insEvent->init_event_controller();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }