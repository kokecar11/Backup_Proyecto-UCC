<?php

        if($petiAjax){
            require_once ("../core/mainModel.php");
        }else{
            require_once ("./core/mainModel.php");
        }   


        class contactController extends mainModel{

        public function send_Mail(){
            session_start(['name'=>'PUCC']);

            $asuntomail=mainModel::clean_cadn($_POST['AsuntoMail']);
            $bodymail=mainModel::clean_cadn($_POST['BodyMail']);
            $email_r=mainModel::clean_cadn($_POST['Email_receptor']);

           
            $email_e=$_SESSION['Email_pucc'];
            $name=$_SESSION['NameUser_pucc'];
            $lastname=$_SESSION['LastNameUser_pucc'];
            $names_e=$name.' '.$lastname;

            $conexion=mainModel::connection();
            $consult="SELECT Acc_names,Acc_lastnames FROM cuenta WHERE Acc_email='$email_r'";
            $datas=$conexion->query($consult);
            $data_r=$datas->fetch();

            $name_r=$data_r['Acc_names'];
            $lastnames_r=$data_r['Acc_lastnames'];
            $names_r=$name_r.' '.$lastnames_r;

            $mailsend=mainModel::send_email($email_e,$names_e,$email_r,$names_r,$asuntomail,$bodymail);

            if($mailsend==false){
                $alertmail=[
                    "Alerta"=>"clean",
                    "Titulo"=>"Mensaje Enviado",
                    "Texto"=>"El Correo Electrónico fue enviado con Exito!",
                    "Tipo"=>"success"
                ];

            }else{
                $alertmail=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error Inesperado",
                    "Texto"=>"No se pudo enviar el Correo Electrónico, Verifique nuevamente.",
                    "Tipo"=>"error"
                ];
            }

            return mainModel::sweet_alerts($alertmail);




        }
    
    }
