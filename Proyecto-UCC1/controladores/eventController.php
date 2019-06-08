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


                
                $conexion=mainModel::connection();
                $consult="SELECT cuenta.Acc_names,cuenta.Acc_lastnames, cuenta.Acc_email, grupos.Gp_title FROM estudiante INNER JOIN grupos INNER JOIN cuenta ON cuenta.Acc_cod = Cuenta_Acc_cod1 WHERE grupos.Gp_cod='$event_codgp' AND estudiante.Grupos_Gp_cod='$event_codgp'";
                $datas=$conexion->query($consult);
                $data_eventgp=$datas->fetch();

                $nombre1 = $data_eventgp['Acc_names'];
                $apellido = $data_eventgp['Acc_lastnames'];
                $email = $data_eventgp['Acc_email'];
                $nombregp= $data_eventgp['Gp_title']; 

                if($event_codgp!=""){
                    
                    $exist_gp=mainModel::exe_query_simple("SELECT Gp_cod FROM grupos WHERE Gp_cod='$event_codgp'");
                    if($exist_gp->rowCount()<=0){
                        
                        $alert_event=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"El Grupo no existe. Verifique nuevamente.",
                            "Tipo"=>"error"
                        ];
                        return mainModel::sweet_alerts($alert_event);
                        exit();
                    }

                   
                }

                if($event_init>=$event_finish){
                    mainModel::delete_event_group($event_codgp);
                    $alert_event=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error Inesperado",
                        "Texto"=>"El Evento no se pudo registrar, la fecha de evento es antigua.",
                        "Tipo"=>"error"
                    ];
                    return mainModel::sweet_alerts($alert_event);
                    exit();
                }
                
                $datos_event=[
                    "bit_title"=>"$event_title",
                    "bit_descripcion"=>"$event_descrip",
                    "bit_horainit"=>"$event_init",
                    "bit_horafinish"=>"$event_finish",
                    "grupos_Gp_cod"=>"$event_codgp"  
                ];

                $data_event=mainModel::add_event_group($datos_event);
                if($data_event){
                    mainModel::send_email_event_gp($email,$nombre1,$nombregp,$event_codgp,$event_init,$event_finish,$event_descrip);
                    $alert_event=[
                        "Alerta"=>"clean",
                        "Titulo"=>"Evento Registrado!",
                        "Texto"=>"Evento registrado con Exito. ".$nombre1.' '.$apellido." Verifique su Correo Institucional.",
                        "Tipo"=>"success"
                    ];

                }else{
                    mainModel::delete_event_group($event_codgp);
                    $alert_event=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error Inesperado",
                        "Texto"=>"El Evento no se pudo registrar, Verifique nuevamente.",
                        "Tipo"=>"error"
                    ];
                }
                return mainModel::sweet_alerts($alert_event);
                     
            }
            
                    
        }




