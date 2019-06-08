<?php

        if($petiAjax){
            require_once "../core/mainModel.php";
        }else{
            require_once "./core/mainModel.php";
        }

        class anteproyectoModels extends mainModel{


            protected function add_antreproyecto_M($insertar){
                $sql=mainModel::connection()->prepare("UPDATE formato_evaluacion SET cumple_formato=:cumple_f,recomendacion_formato=:recom_formato WHERE idFormato_Anteproyecto=:idf_anteproyecto AND idFormatos=:idformatoss");
                $sql->bindParam(":cumple_f",$insertar['cumple_formato']);
                $sql->bindParam(":recom_formato",$insertar['recomendacion_formato']);
                $sql->bindParam(":idf_anteproyecto",$insertar['idFormato_Anteproyecto']);
                $sql->bindParam(":idformatoss",$insertar['idFormatos']);
                $sql->execute();
                return $sql;
            }


            protected function addnota_anteproyecto_M($datos){

                $sql=mainModel::connection()->prepare("INSERT INTO nota (Nota,Nota_letra,Formatos_idFormatos,Formato_nota) VALUES(:nota,:nota_letra,:idformatos,:formato_nota)");
                $sql->bindParam(":nota",$datos['nota']);
                $sql->bindParam(":nota_letra",$datos['nota_letra']);
                $sql->bindParam(":idformatos",$datos['idformatos']);
                $sql->bindParam(":formato_nota",$datos['formato_nota']);
                $sql->execute();
                return $sql;
            }  
            
            protected function update_estadoGp_M($insertar){
                $sql=mainModel::connection()->prepare("UPDATE grupos SET Gp_estado=:gp_estado WHERE Gp_cod=:gp_codigo");
                $sql->bindParam(":gp_estado",$insertar['Gp_estado']);
                $sql->bindParam(":gp_codigo",$insertar['Gp_cod']);
                $sql->execute();
                return $sql;
            }



            protected function data_estado_model($tipo,$codigo_admn){
                if($tipo=="Unico"){
                    $query=mainModel::connection()->prepare("SELECT * FROM cuenta WHERE Acc_cod=:codigo_adm");
                    $query->bindParam(":codigo_adm",$codigo_admn);

                }elseif($tipo=="Count"){
                    $query=mainModel::connection()->prepare("SELECT cumple_formato FROM formato_evaluacion INNER JOIN estudiante INNER JOIN grupos ON grupos.Gp_cod=estudiante.Grupos_Gp_cod INNER JOIN formatos on formato_evaluacion.idFormatos=formatos.idFormatos INNER JOIN Fotmato_Anteproyecto on  Fotmato_Anteproyecto.idFormato_Anteproyecto=formato_evaluacion.idFormato_Anteproyecto
                    WHERE formatos.idFormatos=formato_evaluacion.idFormatos AND cumple_formato=1 AND estudiante.Cuenta_Acc_cod1='$codigo_admn' AND formatos.Grupos_Gp_cod=grupos.Gp_cod");
                }
                $query->execute();
                return $query;
            }

        }