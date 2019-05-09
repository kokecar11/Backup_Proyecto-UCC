<?php

        if($petiAjax){
            include '../modelos/loginModels.php';
        }else{
            include './modelos/loginModels.php';
        }  

            class loginController extends loginModels{

                public function init_session_controller(){

                    $user=mainModel::clean_cadn($_POST['userins']);
                    $passuser=mainModel::clean_cadn($_POST['passins']);

                    $passuser=mainModel::encryption($passuser);

                    $datos_login=[
                        "User"=>$user,
                        "pass"=>$passuser
                    ];
                   
                    $datos_account=loginModels::init_session_model($datos_login);

                    if($datos_account->rowCount()==1){
                        $row=$datos_account->fetch();

                        session_start(['name'=>'PUCC']);
                        $_SESSION['User_pucc']=$row['Acc_account'];
                        $_SESSION['Type_pucc']=$row['Acc_type'];
                        $_SESSION['Privi_pucc']=$row['Acc_privi'];
                        //$_SESSION['Photo_pucc']=$row['Acc_photo']; aqui se pone lo de la foto.
                        $_SESSION['token_pucc']=md5(uniqid(mt_rand(),true));

                        if($row['Acc_type']=="Coordinador"){
                            $url=SERVERURLL."home/";

                        }elseif($row['Acc_type']=="Profesor"){
                            $url=SERVERURLL."home/";
                        }else{
                            $url=SERVERURLL."student/";
                        }
                        return $urlLocation='<script> window.location="'.$url.'"</script>';

                    }else{
                        $alertaa=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"El Usuario y/o Contraseña son Incorrectos o Su cuenta esta deshabilitada.",
                            "Tipo"=>"error"
                        ];
                        return mainModel::sweet_alerts($alertaa);
                    }
                  
                }
                
            }
