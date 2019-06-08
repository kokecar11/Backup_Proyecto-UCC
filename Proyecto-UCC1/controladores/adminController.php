<?php

        if($petiAjax){
            require_once ("../modelos/adminModels.php");
        }else{
            require_once ("./modelos/adminModels.php");
        }   

        class adminController extends adminModels{
                //Controlador para Registrar un Profesor
            public function add_coord_controller(){
                    
                $names=mainModel::clean_cadn($_POST['names-reg']);
                $lastnames=mainModel::clean_cadn($_POST['lastnames-reg']);
                $codigo=mainModel::clean_cadn($_POST['cod-reg']);
                $email=mainModel::clean_cadn($_POST['email-reg']);
                $pass1=mainModel::clean_cadn($_POST['password1-reg']);
                $pass2=mainModel::clean_cadn($_POST['password2-reg']);
                $cuentat=$email;

                    if($pass1!=$pass2){
                        $alert=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error Inesperado",
                            "Texto"=>"Las contraseñas no Coinciden, intente nuevamente.",
                            "Tipo"=>"error"
                        ];
                    }else{
                        $email.="@ucatolica.edu.co";
                        
                        if($email!=""){
                            $consult=mainModel::exe_query_simple("SELECT Acc_email FROM cuenta WHERE Acc_email='$email'");
                            $ec = $consult->rowCount();
                        }else{
                            $ec=0;
                        }
                        if($ec>=1){
                            $alert=[
                                "Alerta"=>"simple",
                                "Titulo"=>"Ocurrio un error Inesperado",
                                "Texto"=>"El Correo Institucional ya esta Registrado.",
                                "Tipo"=>"error"
                            ];
                        }else{

                            //$pass1 = substr( md5(microtime()), 1, 8);
                            $clave=mainModel::encryption($pass1);
                            
                            
                            $data_acc=[
                                "codigo"=>"$codigo",
                                "acuenta"=>"$cuentat",
                                "names"=>"$names",
                                "lastnames"=>"$lastnames",
                                "email"=>"$email",
                                "pass"=>"$clave",
                                "estado"=>1,
                                "types"=>"Profesor",
                                "photo"=>""
                            ];
                           
                            $save_acc=mainModel::add_account($data_acc);
                            if($save_acc->rowCount()>=1){
                                $data_adm=[
                                    "prof_cod"=>"$codigo",
                                ];
                               
                                $save_adm=adminModels::add_coord_model($data_adm);
                                if($save_adm->rowCount()>=1){
                                    $alert=[
                                        "Alerta"=>"clean",
                                        "Titulo"=>"Profesor Registrado",
                                        "Texto"=>"El Profesor se registro con Exito!. Verifique su Correo Institucional.",
                                        "Tipo"=>"success"
                                    ];
                                    $mail=mainModel::send_email_activate($email,$names,$pass1);
                                    
                                }else{
                                    mainModel::delete_account("$codigo");
                                    $alert=[
                                        "Alerta"=>"simple",
                                        "Titulo"=>"Ocurrio un error Inesperado",
                                        "Texto"=>"Los datos de Profesor no se pudieron registrar.",
                                        "Tipo"=>"error"
                                    ];
                                }
                            }else{
                                $alert=[
                                    "Alerta"=>"simple",
                                    "Titulo"=>"Ocurrio un error Inesperado",
                                    "Texto"=>"La cuenta no se pudo registrar, Verifique nuevamente.",
                                    "Tipo"=>"error"
                                ];
                            }
                        }
                    }
                     return mainModel::sweet_alerts($alert);
                
        }



        //Controlador para Paginar 

        public function pag_admin_controller($pag,$reg,$codd,$search){

            $pag=mainModel::clean_cadn($pag);
            $reg=mainModel::clean_cadn($reg);
        
            $codd=mainModel::clean_cadn($codd);
            $search=mainModel::clean_cadn($search);
            $table="";

            $pag= (isset($pag)&& $pag>0) ? (int)$pag:1;
            $initpg=($pag>0) ? (($pag*$reg)-$reg): 0;

            if(isset($search)&& $search!=""){
                $consult_t="SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                WHERE ((Acc_type='Profesor') AND (Acc_cod LIKE '%$search%')) ORDER BY Acc_names ASC LIMIT $initpg,$reg";

                $pagurlt = "adminsearch";
            }else{
                $consult_t="SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                WHERE Acc_type='Profesor' ORDER BY Acc_names ASC LIMIT $initpg,$reg";
                $pagurlt = "adminlist";
            }

            $connect=mainModel::connection();

            /*$datas=$connect->query("SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                                WHERE Acc_cod!='$codd' ORDER BY Acc_names ASC LIMIT $initpg,$reg");*/
            $datas=$connect->query($consult_t);
            $datas=$datas->fetchAll();

            $total=$connect->query("SELECT FOUND_ROWS()");
            $total=(int)$total->fetchColumn(); 
            
            $Npag=ceil($total/$reg);

            $table.=' <div class="table-responsive">
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

            if($total>=1&&$pag<=$Npag){
                $cont=$initpg+1;
                foreach($datas as $rows){

                    $table.='
                        <tr>
                            <td>'.$rows['Acc_cod'].'</td>
                            <td>'.$rows['Acc_names'].'</td>
                            <td>'.$rows['Acc_lastnames'].'</td>
                            <td>'.$rows['Acc_email'].'</td>
                        
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
                    $cont++;
                }

            }else{
                $table.='
                    <tr>
                        <td colspan="4">No hay registros de Profesores en la Base de Datos.</td>
                    </tr>
                ';
            }

            $table.=' </tbody> </table> </div>';
            //Paginacion antes
            if($total>=1&&$pag<=$Npag){

                $table.=' <nav class="text-center">
                            <ul class="pagination pagination-sm">
                        ';
                if($pag==1){

                    $table.='<li class="disabled">
                             <a><i class="zmdi zmdi-arrow-left"></i>
                             </a></li>';
                }else{
                    $table.='<li>
                             <a href="'.SERVERURLL.$pagurlt.'/'.($pag-1).'/">
                                <i class="zmdi zmdi-arrow-left"></i>
                             </a></li>';

                }

                for($i=1; $i<=$Npag; $i++){

                    if($pag==$i){
                        $table.='<li class="active">
                             <a href="'.SERVERURLL.$pagurlt.'/'.$i.'/">'.$i.'</a></li>';

                    }else{
                        $table.='<li>
                             <a href="'.SERVERURLL.$pagurlt.'/'.$i.'/">'.$i.'</a></li>';

                    }
                }

                //Paginacion despues
                if($pag==$Npag){

                    $table.='<li class="disabled">
                             <a><i class="zmdi zmdi-arrow-right"></i>
                             </a></li>';
                }else{
                    $table.='<li>
                    <a href="'.SERVERURLL.$pagurlt.'/'.($pag+1).'/">
                        <i class="zmdi zmdi-arrow-right"></i>
                    </a></li>';

                }

                $table.='</ul></nav>';

            }

            return $table;


        }



        


        public function data_admin_controller($tipo,$codigo_admn){
            $codigo_admn=mainModel::decryption($codigo_admn);
            $tipo=mainModel::clean_cadn($codigo_admn);
            
            return adminModels::data_coord_model("Count",$codigo_admn);

        }



}