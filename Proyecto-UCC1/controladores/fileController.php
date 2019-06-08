<?php

        if($petiAjax){
            require_once ("../core/mainModel.php");
        }else{
            require_once ("./core/mainModel.php");
        }   

        class fileController extends mainModel{

            public function add_file_controller(){
                $file_name=mainModel::clean_cadn($_POST['titulofile-reg']);
                $file_gp=mainModel::clean_cadn($_POST['archivosgp-reg']);
                session_start(['name'=>'PUCC']);
                $cod_stu=$_SESSION['Cod_pucc'];
                    
                $conexion=mainModel::connection();
                $consult="SELECT Grupos_Gp_cod FROM estudiante WHERE Cuenta_Acc_cod1='$cod_stu'";
                $datas=$conexion->query($consult);
                $data_eventgp=$datas->fetch();
                $cod_gp2 = $data_eventgp['Grupos_Gp_cod'];

                $ruta = '../files/'.$cod_gp2.'/';
                $file_gp = $ruta.$_FILES["archivosgp-reg"]["name"];
                if($cod_gp2==""){
                    $alert=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error Inesperado",
                        "Texto"=>"No tiene Grupo asignado.",
                        "Tipo"=>"error"
                    ];
                    return mainModel::sweet_alerts($alert);
                    exit();
                }
                if(!file_exists($ruta)){
                    mkdir($ruta);
                }
                if(!file_exists($file_gp)){
                    $upload_file= @move_uploaded_file($_FILES["archivosgp-reg"]["tmp_name"],$file_gp);
                    $data_filegp=[
                        "file_names"=>"$file_name",
                        "file_doc"=>"$file_gp",
                        "filegp_cod"=>"$cod_gp2"
                    ];
                    $add_filegp=mainModel::add_file_group($data_filegp);
                    
                    if($upload_file){
                        $alert=[
                            "Alerta"=>"clean",
                            "Titulo"=>"Archivo Guardado",
                            "Texto"=>"Se Guardo el Archivo.",
                            "Tipo"=>"success"
                        ];
                        return mainModel::sweet_alerts($alert);
                    }else{
                        $alert=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"No se pudo Guardar el Archivo",
                            "Tipo"=>"error"
                        ];
                        return mainModel::sweet_alerts($alert);
                    }
    
                }else{
                    $alert=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error Inesperado",
                        "Texto"=>"El Archivo ya existe.",
                        "Tipo"=>"error"
                    ];
                    
                }

                return mainModel::sweet_alerts($alert);
            }





            public function files_list(){

        }
    
    
    }
