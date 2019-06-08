<?php

        if($petiAjax){
            require_once ("../core/mainModel.php");
        }else{
            require_once ("./core/mainModel.php");
        }   

        class juradosController extends mainModel{

            public function add_jurados_controller(){

                $cd_gp=mainModel::clean_cadn($_POST['codgpjurado']);
                $jurado1=mainModel::clean_cadn($_POST['jurado1']);
                $jurado2=mainModel::clean_cadn($_POST['jurado2']);

                if($cd_gp!=""){
                    
                    $exist_gp1=mainModel::exe_query_simple("SELECT Gp_cod FROM grupos WHERE Gp_cod='$cd_gp'");
                    if($exist_gp1->rowCount()<=0){
                        $alert_jurado1=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"El Grupo no existe. Verifique nuevamente.",
                            "Tipo"=>"error"
                        ];
                        return mainModel::sweet_alerts($alert_jurado1); 
                    }

                }
        
                    $data_jurado1=[
                        "prof_cod"=>"$jurado1",
                        "prof_gpcod"=>"$cd_gp",
                        "prof_califica"=>"1"
                    ];

                    $data_jurado2=[
                        "prof_cod"=>"$jurado2",
                        "prof_gpcod"=>"$cd_gp",
                        "prof_califica"=>"1"
                    ];

                    $save_juradogp=mainModel::add_jurados_model($data_jurado1);
                    $save_juradogp=mainModel::add_jurados_model($data_jurado2);

                    if($save_juradogp){
                        $alert_jurado1=[
                            "Alerta"=>"clean",
                            "Titulo"=>"Jurados Asignados",
                            "Texto"=>"Los Jurados se Asignaron al grupo con Exito!.",
                            "Tipo"=>"success"
                        ];
                        return mainModel::sweet_alerts($alert_jurado1); 
                      
                    }else{

                        $alert_jurado1=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"No se pudo asignar Jurados al Grupo.",
                            "Tipo"=>"error"
                        ];
                        return mainModel::sweet_alerts($alert_jurado1); 
                    }
                     
                
               
            }
        }

        