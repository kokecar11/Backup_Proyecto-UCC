<?php


        if($petiAjax){
            require_once "../modelos/groupModels.php";
        }else{
            require_once "./modelos/groupModels.php";
        }   

        class groupController extends groupModels{

            public function add_group_controller(){
                    
                    $gp_title =mainModel::clean_cadn($_POST['nombregp-reg']);
                    $gp_type =mainModel::clean_cadn($_POST['Tipo_pross']);
                    $gp_stu1 =mainModel::clean_cadn($_POST['Estudiante1-reg']);
                    $gp_stu2 =mainModel::clean_cadn($_POST['Estudiante2-reg']);
                    $gp_asesor =mainModel::clean_cadn($_POST['Asesor-reg']);
                    $gp_jurado1 =mainModel::clean_cadn($_POST['Jurado1-reg']);
                    $gp_jurado2 =mainModel::clean_cadn($_POST['Jurado2-reg']);
                    
                                       
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
                            
                            $gp_codigo=mainModel::gen_cod_random(7);     
                            $data_grupo=[
                                "gp_cod"=>"$gp_codigo",
                                "gp_title"=>"$gp_title",
                                "gp_types"=>"$gp_type",
                                ];
                    
                            $save_grupo=mainModel::add_group($data_grupo);
                            if($save_grupo->rowCount()>=1){
                                //parte del modelo
                                $data_grupo_stu1=[
                                    "codigo_gp1"=>"$gp_codigo",
                                    "codigo_student1"=>"$gp_stu1",
                                ];
                                $data_grupo_stu2=[
                                    "codigo_gp2"=>"$gp_codigo",
                                    "codigo_student2"=>"$gp_stu2",
                                ];
                                $data_grupo_asesor=[
                                    "codigo_gp"=>"$gp_codigo",
                                    "codigo_teach"=>"$gp_asesor",
                                ];
                                $data_grupo_jurado1=[
                                    "codigo_gp1"=>"$gp_codigo",
                                    "codigo_jurado1"=>"$gp_jurado1",
                                ];
                                $data_grupo_jurado2=[
                                    "codigo_gp2"=>"$gp_codigo",
                                    "codigo_jurado2"=>"$gp_jurado2",
                                ];
                               
                               /* $save_gp_model=groupModels::add_group_model_stu1($data_grupo_stu1);
                                $save_gp_model=groupModels::add_group_model_stu2($data_grupo_stu2);
                                $save_gp_model=groupModels::add_group_model_teach($data_grupo_asesor);
                                $save_gp_model=groupModels::add_group_model_jurado1($data_grupo_jurado1);
                                $save_gp_model=groupModels::add_group_model_jurado2($data_grupo_jurado2);*/
                                if(mainModel::add_group_model_stu1($data_grupo_stu1)){
                                    $alertgp=[
                                        "Alerta"=>"clean",
                                        "Titulo"=>"Grupo Creado",
                                        "Texto"=>"El Grupo se registro con Exito!.",
                                        "Tipo"=>"success"
                                    ];
                                }else{
                                    mainModel::delete_group("$gp_codigo");
                                    $alertgp=[
                                        "Alerta"=>"simple",
                                        "Titulo"=>"Ocurrio un error Inesperado",
                                        "Texto"=>"Los datos de Grupo no se pudieron Registrar.",
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