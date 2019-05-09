<?php       


        if($petiAjax){
            require_once "../core/mainModel.php";

        }else{

            require_once "./core/mainModel.php";
        }   


        class groupModels extends mainModel{

            protected function add_group_model_stu($datos){

                $sql=mainModel::connection()->prepare("UPDATE estudiante SET Grupos_Gp_cod=:codigo_gp WHERE Cuenta_Acc_cod1=:codigo_student");
                        $sql->bindParam(":codigo_gp",$datos[':codigo_gp']);
                        $sql->bindParam(":codigo_student",$datos[':codigo_student']);
                        $sql->execute();
                        return $sql;


            }


            protected function add_group_model_teach($datos){

                $sql=mainModel::connection()->prepare("UPDATE profesor SET Grupos_Gp_cod=:codigo_gp WHERE Cuenta_Acc_cod=:codigo_teach");
                        $sql->bindParam(":codigo_gp",$datos[':codigo_gp']);
                        $sql->bindParam(":codigo_teach",$datos[':codigo_teach']);
                        $sql->execute();
                        return $sql;


            }

            
            protected function add_group_model_jurado($datos){

                $sql=mainModel::connection()->prepare("UPDATE jurado SET Grupos_Gp_cod=:codigo_gp WHERE Cuenta_Acc_cod=:codigo_jurado");
                        $sql->bindParam(":codigo_gp",$datos[':codigo_gp']);
                        $sql->bindParam(":codigo_jurado",$datos[':codigo_jurado']);
                        $sql->execute();
                        return $sql;

            }


        }