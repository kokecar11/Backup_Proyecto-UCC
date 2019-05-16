<?php

        if($petiAjax){
            require_once ("../modelos/adminModels.php");
        }else{
            require_once ("./modelos/adminModels.php");
        }   

        class reportController extends adminModels{
           
           
            public function reporte_admin_controller(){
            $table1="";

                $consult_t1="SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                WHERE Acc_type='Profesor' ORDER BY Acc_names";


                $connect1=mainModel::connection();

                /*$datas=$connect->query("SELECT SQL_CALC_FOUND_ROWS Acc_cod,Acc_names,Acc_lastnames,Acc_email FROM cuenta 
                                    WHERE Acc_cod!='$codd' ORDER BY Acc_names ASC LIMIT $initpg,$reg");*/
                $datas1=$connect1->query($consult_t1);
                $datas1=$datas1->fetchAll();

                $total1=$connect1->query("SELECT FOUND_ROWS()");
                $total1=(int)$total1->fetchColumn(); 

                $table1.=' <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">CODIGO</th>
                                            <th class="text-center">NOMBRES</th>
                                            <th class="text-center">APELLIDOS</th>
                                            <th class="text-center">CORREO</th>
                                        </tr>
                                    </thead>
                                <tbody>
                ';

                    foreach($datas1 as $rows1){
                        $table1.='
                            <tr>
                                <td>'.$rows1['Acc_cod'].'</td>
                                <td>'.$rows1['Acc_names'].'</td>
                                <td>'.$rows1['Acc_lastnames'].'</td>
                                <td>'.$rows1['Acc_email'].'</td>
                                </td>
                            </tr>
                        ';
                        $cont1++;
                    }            

                $table1.=' </tbody> </table> </div>';
                    
                return $table1;

                }

            }
  