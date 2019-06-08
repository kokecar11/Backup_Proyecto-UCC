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
                $sql=mainModel::connection()->prepare("INSERT INTO profesor (Cuenta_Acc_cod,Grupos_Gp_cod,Profesor_califica) VALUES(:prof_cod,:prof_gpcod,:prof_califica)");
                $sql->bindParam(":prof_cod",$datos['prof_cod']);
                $sql->bindParam(":prof_gpcod",$datos['prof_gpcod']);
                $sql->bindParam(":prof_califica",$datos['prof_califica']);
                $sql->execute();
                return $sql;
            }
        



            protected function add_group_model_aformato($datos){
                $sql=mainModel::connection()->prepare("INSERT INTO formatos (idFormatos,Grupos_Gp_cod,Recomendacion_formato) VALUES (:idformatos,:gp_codf,:recom_f)");
                $sql->bindParam(":idformatos",$datos['idformatos']);
                $sql->bindParam(":gp_codf",$datos['gp_codf']);
                $sql->bindParam(":recom_f",$datos['recom_f']);
                $sql->execute();
                return $sql;
            }

            protected function add_group_model_formato_eva($datos){
                $sql=mainModel::connection()->prepare("INSERT INTO formato_evaluacion (idFormato_Anteproyecto,idFormatos,cumple_formato,recomendacion_formato) VALUES (:idFormatoA,:id_formato,:cumple_f,:recom_fe)");
                $sql->bindParam(":idFormatoA",$datos['idFormatoA']);
                $sql->bindParam(":id_formato",$datos['id_formato']);
                $sql->bindParam(":cumple_f",$datos['cumple_f']);
                $sql->bindParam(":recom_fe",$datos['recom_fe']);
                $sql->execute();
                return $sql;
            }



        }