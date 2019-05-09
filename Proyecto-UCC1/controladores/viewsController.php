<?php

    require_once "./modelos/viewsModels.php";
    class viewsController extends viewsModels{

        public function obt_plantilla_controller(){
            return require_once "./vistas/plantilla.php";
        }

        //funcion donde Obtenemos la vista que queremos mostrar donde le envia al modelo la vista que queremos
        public function obt_views_controller(){
        
            if(isset($_GET['views'])){
                $route = explode("/", $_GET['views']);
                $answer = viewsModels::obt_views_models($route[0]);
            }else{
                $answer="login";
            }
            return $answer;
        }


    }