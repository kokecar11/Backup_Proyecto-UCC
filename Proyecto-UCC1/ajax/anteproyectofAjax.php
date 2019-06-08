<?php

    $petiAjax=true;
    require_once "../core/configGeneral.php";
    if(isset($_POST['gpanteproyectof'])){
        require_once "../controladores/anteproyectoController.php";
        $insanteproyecto = new anteproyectoController();

        if(isset($_POST['gpanteproyectof'])&&isset($_POST['Opcion_generalidades'])&&isset($_POST['recomendation-generalidades'])&&isset($_POST['Opcion_introduccion'])&&isset($_POST['recomendation-introduccion'])
        &&isset($_POST['Opcion_justificacion'])&&isset($_POST['recomendation-justificacion'])&&isset($_POST['Opcion_argumentacion'])&&isset($_POST['recomendation-argumentacion'])&&isset($_POST['Opcion_planteamiento'])
        &&isset($_POST['recomendation-planteamiento'])&&isset($_POST['Opcion_objetivog'])&&isset($_POST['recomendation-objetivog'])&&isset($_POST['Opcion_objetivoe'])&&isset($_POST['recomendation-objetivoe'])
        &&isset($_POST['Opcion_coherencia'])&&isset($_POST['recomendation-coherencia'])&&isset($_POST['Opcion_alcances'])&&isset($_POST['recomendation-alcances'])&&isset($_POST['Opcion_marcoc'])
        &&isset($_POST['recomendation-marcoc'])&&isset($_POST['Opcion_marcot'])&&isset($_POST['recomendation-marcot'])&&isset($_POST['Opcion_estadoarte'])&&isset($_POST['recomendation-estadoarte'])
        &&isset($_POST['Opcion_impacto'])&&isset($_POST['recomendation-impacto'])&&isset($_POST['Opcion_apparea'])&&isset($_POST['recomendation-apparea'])&&isset($_POST['Opcion_metodologia'])
        &&isset($_POST['recomendation-metodologia'])&&isset($_POST['Opcion_presupuesto'])&&isset($_POST['recomendation-presupuesto'])&&isset($_POST['Opcion_productose'])&&isset($_POST['recomendation-productose'])
        &&isset($_POST['Opcion_bibliografia'])&&isset($_POST['recomendation-bibliografia'])){
            echo $insanteproyecto->add_anteproyecto_C();
        }
        

    }else{
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURLL.'" </script>';

    }