<?php 
    require_once "./core/configGeneral.php";
    require_once "./controladores/viewsController.php";

    $plantilla = new viewsController();
    $plantilla-> obt_plantilla_controller(); 
