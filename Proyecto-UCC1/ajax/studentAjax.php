<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['stu-names-reg'])){
        require_once "../controladores/studentController.php";
        $insStudent = new studentController();

        if(isset($_POST['stu-names-reg'])&&isset($_POST['stu-lastnames-reg'])&&isset($_POST['stu-cod-reg'])&&isset($_POST['stu-six-reg'])&&isset($_POST['stu-email-reg'])&&isset($_POST['stu-password1-reg'])&&isset($_POST['stu-password2-reg'])){
                echo $insStudent->add_student_controller();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }