<?php


        if($petiAjax){
            require_once "../modelos/groupModels.php";
        }else{
            require_once "./modelos/groupModels.php";
        }   

        class groupController extends groupModels{

            public function add_group_controller(){
                    
                    $gp_title=mainModel::clean_cadn($_POST['nombregp-reg']);
                    $gp_type=mainModel::clean_cadn($_POST['Tipo_pross']);
                    $gp_stu1=mainModel::clean_cadn($_POST['Estudiante1-reg']);
                    $gp_stu2=mainModel::clean_cadn($_POST['Estudiante2-reg']);
                    $gp_asesor=mainModel::clean_cadn($_POST['Asesor-reg']);

                    //Query sacar todo de la tabla estudiante
                    $querystu1=mainModel::exe_query_simple("SELECT * FROM estudiante WHERE Cuenta_Acc_cod1='$gp_stu1'");
                    $data_stuacc1=$querystu1->fetch();
                    $querystu2=mainModel::exe_query_simple("SELECT * FROM estudiante WHERE Cuenta_Acc_cod1='$gp_stu2'");
                    $data_stuacc2=$querystu2->fetch();

                    //Query sacar Email y Nombre de la cuenta
                    $q_accstu1=mainModel::exe_query_simple("SELECT Acc_names,Acc_email FROM cuenta WHERE Acc_cod='$gp_stu1'");
                    $d_stuacc1=$q_accstu1->fetch();
                    $emailstu1=$d_stuacc1['Acc_email'];
                    $namestu1=$d_stuacc1['Acc_names'];
                    

                    
                                       
                    if($gp_title!=""){
                            $consultgp=mainModel::exe_query_simple("SELECT Gp_title FROM grupos WHERE Gp_title='$gp_title'");
                            $ecgp = $consultgp->rowCount();
                    }else{
                            $ecgp=0;
                    }if($ecgp>=1){
                            $alertgp=[
                                "Alerta"=>"simple",
                                "Titulo"=>"Ocurrio un error Inesperado",
                                "Texto"=>"El Grupo ya esta Creado.",
                                "Tipo"=>"error"
                            ];
                        }else{
                            
                            $gp_codigo=mainModel::gen_cod_random("GP",7);     
                            $data_grupo=[
                                "gp_cod"=>"$gp_codigo",
                                "gp_title"=>"$gp_title",
                                "gp_types"=>"$gp_type",
                                "gp_estado"=>"1",
                                ];
                    
                            $save_grupo=mainModel::add_group($data_grupo);
                            if($save_grupo->rowCount()>=1){

                                   if($data_stuacc1['Grupos_Gp_cod']!=NULL&&$data_stuacc2['Grupos_Gp_cod']!=NULL||$data_stuacc1['Grupos_Gp_cod']!=NULL||$data_stuacc2['Grupos_Gp_cod']!=NULL){
                                        $alertgp=[
                                            "Alerta"=>"simple",
                                            "Titulo"=>"Ocurrio un error Inesperado",
                                            "Texto"=>"El Grupo no se pudo registrar. Los Estudiantes ya pertenecen a un Grupo.",
                                            "Tipo"=>"error"
                                        ];
                                        mainModel::delete_group($gp_codigo);
                                        return mainModel::sweet_alerts($alertgp);  
                                        exit();
                                   }
                                   
                                    $data_gp_stu1=[
                                        "Cuenta_Acc_cod1"=>$gp_stu1,
                                        "Grupos_Gp_cod"=>$gp_codigo
                                    ];
                                    $data_gp_stu2=[
                                        "Cuenta_Acc_cod1"=>$gp_stu2,
                                        "Grupos_Gp_cod"=>$gp_codigo
                                    ];


                                    $data_gp_asesor=[
                                            "prof_cod"=>$gp_asesor,
                                            "prof_gpcod"=>$gp_codigo,
                                            "prof_califica"=>"0"
                                    ];
                                    $idformato=rand(1,10000);
                                    $data_gp_af=[
                                        "idformatos"=>$idformato,
                                        "gp_codf"=>$gp_codigo,
                                        "recom_f"=>NULL
                                    ];

                                    $save_gp_stu=groupModels::add_group_model_stu1($data_gp_stu1);
                                    $save_gp_stu=groupModels::add_group_model_stu1($data_gp_stu2);
                                    $save_gpasesor=groupModels::add_group_model_teach($data_gp_asesor);
                                    $save_gpaf=groupModels::add_group_model_aformato($data_gp_af);
                                    
                                    for($idtopico=1;$idtopico<=18;$idtopico++){

                                        $data_gp_fore=[
                                            "idFormatoA"=>$idtopico,
                                            "id_formato"=>$idformato,
                                            "cumple_f"=>NULL,
                                            "recom_fe"=>NULL
                                        ];
                                        $save_gp_fore=groupModels::add_group_model_formato_eva($data_gp_fore);
                                    }
                                                  
                                if($save_gp_stu&&$save_gpasesor&&$save_gpaf){
                                    $alertgp=[
                                        "Alerta"=>"clean",
                                        "Titulo"=>"Grupo Creado",
                                        "Texto"=>"El Grupo se registro con Exito!.".$emailstu1." Verifique el Correo institucional.",
                                        "Tipo"=>"success"
                                    ];
                                    
                                    $gpmail=mainModel::send_email_activate_gp($emailstu1,$namestu1,$gp_title,$gp_codigo);
                                }else{
                                    mainModel::delete_group($gp_codigo);
                                    $alertgp=[
                                        "Alerta"=>"simple",
                                        "Titulo"=>"Ocurrio un error Inesperado",
                                        "Texto"=>"Los datos del Grupo no se pudieron registrar.",
                                        "Tipo"=>"error"
                                    ];
                                }
                            }else{
                                $alertgp=[
                                    "Alerta"=>"simple",
                                    "Titulo"=>"Ocurrio un error Inesperado",
                                    "Texto"=>"El Grupo no se pudo registrar, Verifique nuevamente.",
                                    "Tipo"=>"error"
                                ];
                            }
                        }
                        
                        return mainModel::sweet_alerts($alertgp);    
                    
                    }
        }