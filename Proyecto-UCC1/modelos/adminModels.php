<?php

        if($petiAjax){
            require_once "../core/mainModel.php";
        }else{
            require_once "./core/mainModel.php";
        }   


        class adminModels extends mainModel{

            protected function add_coord_model($datos){

                $sql=mainModel::connection()->prepare("INSERT INTO profesor (Cuenta_Acc_cod) VALUES(:prof_cod)");
                $sql->bindParam(":prof_cod",$datos['prof_cod']);
                $sql->execute();
                return $sql;

            }



            protected function data_coord_model($tipo,$codigo_admn){
                if($tipo=="Unico"){
                    $query=mainModel::connection()->prepare("SELECT * FROM cuenta WHERE Acc_cod=:codigo_adm");
                    $query->bindParam(":codigo_adm",$codigo_admn);

                }elseif($tipo=="Count"){
                    $query=mainModel::connection()->prepare("SELECT idProfesor FROM profesor ");
                }
                $query->execute();
                return $query;
            }

        }