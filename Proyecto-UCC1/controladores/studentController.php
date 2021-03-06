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

                    $cuentastu=$stuemail;
                    if($stupass1!=$stupass2){
                        $stualert=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"Las contraseñas no Coinciden, intente nuevamente.",
                            "Tipo"=>"error"
                        ];
                    }else{
                        $stuemail.='@ucatolica.edu.co';
                        if($stuemail!=""){
                            $stuconsult=mainModel::exe_query_simple("SELECT Acc_email FROM cuenta WHERE Acc_email='$stuemail'");
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
                                "acuenta"=>"$cuentastu",
                                "names"=>"$stunames",
                                "lastnames"=>"$stulastnames",
                                "email"=>"$stuemail",
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
                                        "Texto"=>"El Estudiante se registro con Exito!. Verifique su Correo Institucional.",
                                        "Tipo"=>"success"
                                    ];

                                    $mailstu=mainModel::send_email_activate($stuemail,$stunames,$stupass1);
                                }else{
                                    mainModel::delete_account("$stucodigo");
                                    $stualert=[
                                        "Alerta"=>"simple",
                                        "Titulo"=>"Ocurrio un error Inesperado",
                                        "Texto"=>"Los datos del Estudiante no se pudieron registrar.",
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


        public function pag_student_controller($pagstu,$regstu,$coddstu,$searchstu){

            $pagstu=mainModel::clean_cadn($pagstu);
            $regstu=mainModel::clean_cadn($regstu);
        
            $coddstu=mainModel::clean_cadn($coddstu);
            $searchstu=mainModel::clean_cadn($searchstu);
            $tablestu="";

            $pagstu= (isset($pagstu)&& $pagstu>0) ? (int)$pagstu:1;
            $initpgstu=($pagstu>0) ? (($pagstu*$regstu)-$regstu): 0;


            if(isset($searchstu)&& $searchstu!=""){
                $consult_stu="SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                WHERE ((Acc_type='Estudiante') AND (Acc_cod LIKE '%$searchstu%')) ORDER BY Acc_names ASC LIMIT $initpgstu,$regstu";

                $pagurlstu = "studentsearch";
            }else{
                $consult_stu="SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                WHERE Acc_type='Estudiante' ORDER BY Acc_names ASC LIMIT $initpgstu,$regstu";
                $pagurlstu = "studentlist";
            }


            $connectstu=mainModel::connection();

            /*$datas=$connect->query("SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                                WHERE Acc_cod!='$codd' ORDER BY Acc_names ASC LIMIT $initpg,$reg");
            $datastu=$connectstu->query("SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                                WHERE Acc_type='Estudiante' ORDER BY Acc_names ASC LIMIT $initpgstu,$regstu");*/
            $datastu=$connectstu->query($consult_stu);
            $datastu=$datastu->fetchAll();

            $totalstu=$connectstu->query("SELECT FOUND_ROWS()");
            $totalstu=(int)$totalstu->fetchColumn(); 
            
            $Npagstu=ceil($totalstu/$regstu);

            $tablestu.=' <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">CÓDIGO</th>
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
                        <td colspan="4">No hay registros de Estudiantes en la Base de Datos.</td>
                    </tr>
                ';
            }


            $tablestu.=' </tbody> </table> </div>';

             //Paginacion antes
             if($totalstu>=1&&$pagstu<=$Npagstu){

                $tablestu.=' <nav class="text-center">
                            <ul class="pagination pagination-sm">
                        ';
                if($pagstu==1){

                    $tablestu.='<li class="disabled">
                             <a><i class="zmdi zmdi-arrow-left"></i>
                             </a></li>';
                }else{
                    $tablestu.='<li>
                             <a href="'.SERVERURLL.$pagurlstu.'/'.($pagstu-1).'/">
                                <i class="zmdi zmdi-arrow-left"></i>
                             </a></li>';

                }

                for($i=1; $i<=$Npagstu; $i++){

                    if($pagstu==$i){
                        $tablestu.='<li class="active">
                             <a href="'.SERVERURLL.$pagurlstu.'/'.$i.'/">'.$i.'</a></li>';

                    }else{
                        $tablestu.='<li>
                             <a href="'.SERVERURLL.$pagurlstu.'/'.$i.'/">'.$i.'</a></li>';

                    }
                }

                //Paginacion despues
                if($pagstu==$Npagstu){

                    $tablestu.='<li class="disabled">
                             <a><i class="zmdi zmdi-arrow-right"></i>
                             </a></li>';
                }else{
                    $tablestu.='<li>
                    <a href="'.SERVERURLL.$pagurlstu.'/'.($pagstu+1).'/">
                        <i class="zmdi zmdi-arrow-right"></i>
                    </a></li>';

                }

                $tablestu.='</ul></nav>';

            }


            return $tablestu;


        }

        public function data_student_controller($tipostu,$codigo_stu){
            $codigo_admn=mainModel::decryption($codigo_stu);
            $tipo=mainModel::clean_cadn($codigo_stu);
            
            return studentModels::data_student_model("Conteo",$codigo_stu);

        }


    }   