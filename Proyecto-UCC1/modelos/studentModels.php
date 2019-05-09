<?php

        if($petiAjax){
            require_once "../core/mainModel.php";

        }else{

            require_once "./core/mainModel.php";
        }   


        class studentModels extends mainModel{

            protected function add_student_model($datos){

                $sql=mainModel::connection()->prepare("INSERT INTO estudiante (Semestre,Cuenta_Acc_cod1,Grupos_Gp_cod) VALUES(:semestre,:stu_cod,:grupo_cod)");
                $sql->bindParam(":semestre",$datos['semestre']);        
                $sql->bindParam(":stu_cod",$datos['stu_cod']);
                $sql->bindParam(":grupo_cod",$datos[':grupo_cod']);
                $sql->execute();
                return $sql;


            }


            protected function data_student_model($tipostu,$codigo_stu){
                if($tipostu=="Unico"){
                    $query=mainModel::connection()->prepare("SELECT * FROM cuenta WHERE Acc_cod=:codigo_adm");
                    $query->bindParam(":codigo_adm",$codigo_stu);

                }elseif($tipostu=="Conteo"){
                    $query=mainModel::connection()->prepare("SELECT idEstudiante FROM estudiante ");
                }
                $query->execute();
                return $query;
            }

        }