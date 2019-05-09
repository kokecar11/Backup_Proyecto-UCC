<?php

        if($petiAjax){
            require_once "../modelos/studentModels.php";
        }else{
            require_once "./modelos/studentModels.php";
        }   

        class studentController extends studentModels{

            public function add_student_controller(){
                    
                    $stunames=mainModel::clean_cadn($_POST['stu-names-reg']);
                    $stulastnames=mainModel::clean_cadn($_POST['stu-lastnames-reg']);
                    $stucodigo=mainModel::clean_cadn($_POST['stu-cod-reg']);
                    $semestre=mainModel::clean_cadn($_POST['stu-six-reg']);
                    $stuemail=mainModel::clean_cadn($_POST['stu-email-reg']);
                    $stupass1=mainModel::clean_cadn($_POST['stu-password1-reg']);
                    $stupass2=mainModel::clean_cadn($_POST['stu-password2-reg']);
                    if($stupass1!=$stupass2){
                        $stualert=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"Las contraseñas no Coinciden, intente nuevamente.",
                            "Tipo"=>"error"
                        ];
                    }else{
                        
                        if($stuemail!=""){
                            $stuconsult=mainModel::exe_query_simple("SELECT Acc_email FROM cuenta WHERE Acc_email='$stuemail@ucatolica.edu.co'");
                            $stuec = $stuconsult->rowCount();
                        }else{
                            $stuec=0;
                        }
                        if($stuec>=1){
                            $stualert=[
                                "Alerta"=>"simple",
                                "Titulo"=>"Ocurrio un error Inesperado",
                                "Texto"=>"El Correo Institucional ya esta Registrado.",
                                "Tipo"=>"error"
                            ];
                        }else{

                            
                            $stuclave=mainModel::encryption($stupass1);
                            
                            $studata_acc=[
                                "codigo"=>"$stucodigo",
                                "acuenta"=>"$stuemail",
                                "names"=>"$stunames",
                                "lastnames"=>"$stulastnames",
                                "email"=>"$stuemail@ucatolica.edu.co",
                                "pass"=>"$stuclave",
                                "estado"=>1,
                                "types"=>"Estudiante",
                                "photo"=>""
                            ];
                           
                            $stusave_acc=mainModel::add_account($studata_acc);
                            if($stusave_acc->rowCount()>=1){
                                $studata_model=[
                                    "semestre"=>"$semestre",
                                    "stu_cod"=>"$stucodigo",
                                    "grupo_cod"=>""
                                ];
                               
                                $stusave_model=studentModels::add_student_model($studata_model);
                                if($stusave_model->rowCount()>=1){
                                    $stualert=[
                                        "Alerta"=>"clean",
                                        "Titulo"=>"Estudiante Registrado",
                                        "Texto"=>"El Estudiante se registro con Exito!.",
                                        "Tipo"=>"success"
                                    ];
                                }else{
                                    mainModel::delete_account("$stucodigo");
                                    $stualert=[
                                        "Alerta"=>"simple",
                                        "Titulo"=>"Ocurrio un error Inesperado",
                                        "Texto"=>"Los datos del Estudiante no se pudieron Registrar.",
                                        "Tipo"=>"error"
                                    ];
                                }
                            }else{
                                $stualert=[
                                    "Alerta"=>"simple",
                                    "Titulo"=>"Ocurrio un error Inesperado",
                                    "Texto"=>"La cuenta no se pudo registrar, Verifique nuevamente.",
                                    "Tipo"=>"error"
                                ];
                            }
                        }
                    }
                     return mainModel::sweet_alerts($stualert);
                
        }


        public function pag_admin_controller($pagstu,$regstu,$coddstu){

            $pagstu=mainModel::clean_cadn($pagstu);
            $regstu=mainModel::clean_cadn($regstu);
        
            $coddstu=mainModel::clean_cadn($coddstu);
            $tablestu="";

            $pagstu= (isset($pagstu)&& $pagstu>0) ? (int)$pagstu:1;
            $initpgstu=($pagstu>0) ? (($pagstu*$regstu)-$regstu): 0;

            $connectstu=mainModel::connection();

            /*$datas=$connect->query("SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                                WHERE Acc_cod!='$codd' ORDER BY Acc_names ASC LIMIT $initpg,$reg");*/
            $datastu=$connectstu->query("SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                                WHERE Acc_type='Estudiante' ORDER BY Acc_names ASC LIMIT $initpgstu,$regstu");

            $datastu=$datastu->fetchAll();

            $totalstu=$connectstu->query("SELECT FOUND_ROWS()");
            $totalstu=(int)$totalstu->fetchColumn(); 
            
            $Npagstu=ceil($totalstu/$regstu);

            $tablestu.=' <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">CODIGO</th>
                                        <th class="text-center">NOMBRES</th>
                                        <th class="text-center">APELLIDOS</th>
                                        <th class="text-center">CORREO</th>
                                        <th class="text-center">A. CUENTA</th>
                                        <th class="text-center">A. DATOS</th>
                                        <th class="text-center">ELIMINAR</th>
                                    </tr>
                                </thead>
                            <tbody>
            ';

            if($totalstu>=1&&$pagstu<=$Npagstu){
                $contstu=$initpgstu+1;
                foreach($datastu as $rowstu){

                    $tablestu.='
                        <tr>
                            <td>'.$rowstu['Acc_cod'].'</td>
                            <td>'.$rowstu['Acc_names'].'</td>
                            <td>'.$rowstu['Acc_lastnames'].'</td>
                            <td>'.$rowstu['Acc_email'].'</td>
                        
                            <td>
                                <a href="#!" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#!" class="btn btn-success btn-raised btn-xs">
                                    <i class="zmdi zmdi-refresh"></i>
                                </a>
                            </td>
                            <td>
                                <form>
                                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    ';
                    $contstu++;
                }

            }else{
                $tablestu.='
                    <tr>
                        <td colspan="4">No hay registros en la Base de Datos.</td>
                    </tr>
                ';
            }


            $tablestu.=' </tbody> </table> </div>';

            return $tablestu;


        }

        public function data_student_controller($tipostu,$codigo_stu){
            $codigo_admn=mainModel::decryption($codigo_stu);
            $tipo=mainModel::clean_cadn($codigo_stu);
            
            return studentModels::data_student_model("Conteo",$codigo_stu);

        }


    }   