<?php

        if($petiAjax){
            require_once "../core/mainModel.php";
        }else{
            require_once "./core/mainModel.php";
        }   

        class juradosModels extends mainModel{

            protected function add_jurados_model($datos){
        
                $sql=mainModel::connection()->prepare("INSERT INTO profesor (Cuenta_Acc_cod,Grupos_Gp_cod,Profesor_califica) VALUES(:prof_cod,:prof_gpcod,:prof_califica)");
                $sql->bindParam(":prof_cod",$datos['prof_cod']);
                $sql->bindParam(":prof_gpcod",$datos['prof_gpcod']);
                $sql->bindParam(":prof_califica",$datos['prof_califica']);
                $sql->execute();
                return $sql;
            }
        }