<?php       


        if($petiAjax){
            require_once "../core/mainModel.php";

        }else{

            require_once "./core/mainModel.php";
        }   


        class groupModels extends mainModel{

            protected function add_group_model_stu1($datos){

                $sql=mainModel::connection()->prepare("UPDATE estudiante SET Grupos_Gp_cod=:codigo_gp1 WHERE Cuenta_Acc_cod1=:codigo_student1");
                        $sql->bindParam(":codigo_gp1",$datos[':codigo_gp1']);
                        $sql->bindParam(":codigo_student1",$datos[':codigo_student1']);
                        $sql->execute();
                        return $sql;


            }

            
            protected function add_group_model_stu2($datos){

                $sql=mainModel::connection()->prepare("UPDATE estudiante SET Grupos_Gp_cod=:codigo_gp2 WHERE Cuenta_Acc_cod1=:codigo_student2");
                        $sql->bindParam(":codigo_gp2",$datos[':codigo_gp2']);
                        $sql->bindParam(":codigo_student2",$datos[':codigo_student2']);
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

            
            protected function add_group_model_jurado1($datos){

                $sql=mainModel::connection()->prepare("UPDATE jurado SET Grupos_Gp_cod=:codigo_gp1 WHERE Cuenta_Acc_cod=:codigo_jurado1");
                        $sql->bindParam(":codigo_gp1",$datos[':codigo_gp1']);
                        $sql->bindParam(":codigo_jurado1",$datos[':codigo_jurado1']);
                        $sql->execute();
                        return $sql;

            }
            protected function add_group_model_jurado2($datos){

                $sql=mainModel::connection()->prepare("UPDATE jurado SET Grupos_Gp_cod=:codigo_gp2 WHERE Cuenta_Acc_cod=:codigo_jurado2");
                        $sql->bindParam(":codigo_gp2",$datos[':codigo_gp2']);
                        $sql->bindParam(":codigo_jurado2",$datos[':codigo_jurado2']);
                        $sql->execute();
                        return $sql;

            }

        }