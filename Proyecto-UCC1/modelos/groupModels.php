<?php       


        if($petiAjax){
            require_once "../core/mainModel.php";

        }else{

            require_once "./core/mainModel.php";
        }   


        class groupModels extends mainModel{

            protected function add_group_model_stu1($datos){
                        
                $sql=mainModel::connection()->prepare("UPDATE estudiante SET Grupos_Gp_cod=:codigo_gp1 WHERE Cuenta_Acc_cod1=:codigo_student1");
                $sql->bindParam(":codigo_gp1",$datos['Grupos_Gp_cod']);
                $sql->bindParam(":codigo_student1",$datos['Cuenta_Acc_cod1']);                       
                $sql->execute();
                return $sql;
            }

            
            protected function add_group_model_teach($datos){

                $sql=mainModel::connection()->prepare("UPDATE profesor SET Grupos_Gp_cod=:codigo_gp WHERE Cuenta_Acc_cod=:codigo_teach");
                $sql->bindParam(":codigo_gp",$datos['Grupos_Gp_cod']);
                $sql->bindParam(":codigo_teach",$datos['Cuenta_Acc_cod']);
                $sql->execute();
                return $sql;


            }

        }