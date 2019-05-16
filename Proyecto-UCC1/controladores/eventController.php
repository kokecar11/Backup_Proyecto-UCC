<?php


        if($petiAjax){
            require_once "../core/mainModel.php";
        }else{
            require_once "./core/mainModel.php";
        }  

        class eventController extends mainModel{




            public function init_event_controller(){

                $event_title=mainModel::clean_cadn($_POST['title_event']);
                $event_descrip=mainModel::clean_cadn($_POST['descrip_event']);
                $event_codgp=mainModel::clean_cadn($_POST['cod-gpevent']);
                $event_año=mainModel::clean_cadn($_POST['añof']);
                $event_mes=mainModel::clean_cadn($_POST['mesf']);
                $event_dia=mainModel::clean_cadn($_POST['diaf']);
                $event_hora=mainModel::clean_cadn($_POST['horaf']);
                $event_minuto=mainModel::clean_cadn($_POST['minutosf']);
                $event_init=(date('Y-m-d H:i:s'));
                $event_segundos='00';
                $event_finish=$event_año.'-'.$event_mes.'-'.$event_dia.' '.$event_hora.':'.$event_minuto.':'.$event_segundos;


                $datos_event=[
                    "bit_title"=>"$event_title",
                    "bit_descripcion"=>"$event_descrip",
                    "bit_horainit"=>"$event_init",
                    "bit_horafinish"=>"$event_finish",
                    "grupos_Gp_cod"=>"$event_codgp"  
                ];

                $data_event=mainModel::add_event_group($datos_event);
                if($data_event){

                    $alert_event=[
                        "Alerta"=>"clean",
                        "Titulo"=>"Profesor Registrado",
                        "Texto"=>"El Evento se registro con Exito!. Verifique su Correo Institucional.",
                        "Tipo"=>"success"
                    ];

                }else{
                    $alert_event=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error Inesperado",
                        "Texto"=>"El Evento no se pudo registrar, Verifique nuevamente.",
                        "Tipo"=>"error"
                    ];
                }
                return mainModel::sweet_alerts($alert_event);
                     
            }

            public function search_event_gp(){

                $event_codgp=mainModel::clean_cadn($_POST['cod-gpevent']);
                $consult=mainModel::exe_query_simple("SELECT Acc_names,Acc_lastnames FROM cuenta WHERE Acc_email='$event_codgp'");

            }



            
                    
        }




