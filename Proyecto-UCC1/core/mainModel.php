<?php
    
    if($petiAjax){
        require_once "../core/configAPP.php";

    }else{

        require_once "./core/configAPP.php";
    }   

    class mainModel{
        
        protected function connection(){

            $link = new PDO(GEST_DB,USER,PASSWORD);
            return $link;

        }
        
        protected function exe_query_simple($query){

            $respuesta = self::connection()->prepare($query);
            $respuesta->execute();
            return $respuesta;

        }

        protected function request_email_pass($camp,$campwhe,$valor){

            $sql1 = self::connection()->prepare("SELECT $camp FROM cuenta WHERE $campwhe= ? LIMIT 1 ");
            $sql1->bindParam('s',$valor);
            $sql1->execute();
            return $sql;
        }

        protected function send_email_activate($emailacc,$nombreacc,$passacc){
            require '../PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //Modificar
            $mail->Host = 'smtp.hostinger.co'; //Modificar
            $mail->Port = '587'; //Modificar
            
            $mail->Username = 'coordinador@proyectos-ucc.tk'; //Modificar
            $mail->Password = 'admin123'; //Modificar
            
            $mail->setFrom('coordinador@proyectos-ucc.tk', 'Coordinador de Proyectos UCC'); //Modificar
            $mail->addAddress($emailacc, $nombreacc);
            
            $mail->Subject= 'Registro Completado en Proyectos UCC';
            $mail->Body= '<big><b>Bienvenido a Proyectos UCC de la Facultad de Ingenieria de Sistemas.</b></big><br><b>'.$nombreacc.'</b> Tu Contraseña es: <b>'.$passacc.'</b> <br> Porfavor Logea y Modifica la Contraseña.';
            $mail->IsHTML(true);
            
            $mail->send();        
        }
        protected function send_email_activate_gp($emailacc,$nombreacc,$nombregp,$codigogp){
            require '../PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //Modificar
            $mail->Host = 'smtp.hostinger.co'; //Modificar
            $mail->Port = '587'; //Modificar
            
            $mail->Username = 'coordinador@proyectos-ucc.tk'; //Modificar
            $mail->Password = 'admin123'; //Modificar
            
            $mail->setFrom('coordinador@proyectos-ucc.tk', 'Coordinador de Proyectos UCC'); //Modificar
            $mail->addAddress($emailacc, $nombreacc);
            
            $mail->Subject= 'Registro Completado de su Grupo de Proyectos UCC';
            $mail->Body= '<big><b>Bienvenido a Proyectos UCC de la Facultad de Ingenieria de Sistemas.</b></big><br>
                          <b>'.$nombreacc.'</b> Su Grupo fue Creado Satisfactoriamente. <br>Nombre del Proyecto: <b>'.$nombregp.'</b> 
                          <br>Codigo de Grupo: <b>'.$codigogp.'</b> .';
            $mail->IsHTML(true);
            
            $mail->send();        
        }

        protected function add_account($datos){
            
            $sql = self::connection()->prepare("INSERT INTO cuenta (Acc_cod,Acc_account,Acc_names,Acc_lastnames,Acc_email,Acc_pass,Acc_estado,Acc_type,Acc_photo) 
                        VALUES(:codigo,:acuenta,:names,:lastnames,:email,:pass,:estado,:types,:photo)");
            $sql-> bindParam(":codigo",$datos['codigo']); 
            $sql-> bindParam(":acuenta",$datos['acuenta']); 
            $sql-> bindParam(":names",$datos['names']); 
            $sql-> bindParam(":lastnames",$datos['lastnames']);   
            $sql-> bindParam(":email",$datos['email']);
            $sql-> bindParam(":pass",$datos['pass']);
            $sql-> bindParam(":estado",$datos['estado']);
            $sql-> bindParam(":types",$datos['types']);
            $sql-> bindParam(":photo",$datos['photo']);
            $sql->execute();
            return $sql;
        }

        protected function delete_account($account){
            $sql =self::connection()->prepare("DELETE FROM cuenta WHERE Acc_cod=:codigoo");
            $sql-> bindParam(":codigoo",$account);
            $sql->execute();
            return $sql;

        }

        protected function add_group($grupo){
            
            $sql = self::connection()->prepare("INSERT INTO  grupos (Gp_cod,Gp_title,Gp_type,Gp_estado) VALUES(:gp_cod,:gp_title,:gp_types,:gp_estado)");
            $sql-> bindParam(":gp_cod",$grupo['gp_cod']); 
            $sql-> bindParam(":gp_title",$grupo['gp_title']); 
            $sql-> bindParam(":gp_types",$grupo['gp_types']); 
            $sql-> bindParam(":gp_estado",$grupo['gp_estado']); 
            $sql->execute();
            return $sql;
        }

        protected function delete_group($idgroup){
            $sql =self::connection()->prepare("DELETE FROM grupos WHERE Gp_cod=:codi_gp");
            $sql-> bindParam(":codi_gp",$idgroup);
            $sql->execute();
            return $sql;

        }

        protected function add_event_group($bitacora_eventos){
            $sql =self::connection()->prepare("INSERT INTO bitacora_eventos (Bit_codigo,Bit_title,Bit_descripcion,Bit_horainit,Bit_horafinish,Grupos_Gp_cod) VALUES (:bit_codigo,:bit_title,:bit_descripcion,:bit_horainit,:bit_horafinish,:grupos_Gp_cod)");
            $sql-> bindParam(":bit_codigo",$bitacora_eventos['bit_codigo']); 
            $sql-> bindParam(":bit_title",$bitacora_eventos['bit_title']);  
            $sql-> bindParam(":bit_descripcion",$bitacora_eventos['bit_descripcion']); 
            $sql-> bindParam(":bit_horainit",$bitacora_eventos['bit_horainit']); 
            $sql-> bindParam(":bit_horafinish",$bitacora_eventos['bit_horafinish']); 
            //$sql-> bindParam(":bit_subido",$bitacora_eventos['bit_subido']); 
            $sql-> bindParam(":grupos_Gp_cod",$bitacora_eventos['grupos_Gp_cod']); 
            $sql->execute();
            return $sql;

        }

        public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		protected function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
        }
        
        protected function gen_cod_random($letra,$long){
            
            for($i = 1; $i<=$long; $i++){
                $numero=rand(0,9); 
                $letra.=$numero;            
            }
            return $letra;

        }
        protected function clean_cadn($cadena){
            $cadena= trim($cadena); //Quita los espacios en el texto
            $cadena= stripslashes($cadena); //Quita barras invertidas
            $cadena= str_ireplace("<script>","",$cadena);//Quita los espacios despues de una cadena
            $cadena= str_ireplace("</script>","",$cadena);
            $cadena= str_ireplace("<script src","",$cadena);
            $cadena= str_ireplace("SELECT * FROM","",$cadena);
            $cadena= str_ireplace("DELETE FROM","",$cadena);
            $cadena= str_ireplace("INSERT INTO","",$cadena);
            $cadena= str_ireplace("--","",$cadena);
            $cadena= str_ireplace("{","",$cadena);
            $cadena= str_ireplace("}","",$cadena);
            $cadena= str_ireplace("^","",$cadena);
            return $cadena;
        
        }
    
        protected function sweet_alerts($datos){
            if($datos['Alerta']=="simple"){
                $alert_ms="
                    <script>
                        swal(
                            '".$datos['Titulo']."',
                            '".$datos['Texto']."',
                            '".$datos['Tipo']."'
                        );
                    </script>
                ";
            }elseif($datos['Alerta']=="reload"){
                $alert_ms="
                <script>
                    swal({
                        title: '".$datos['Titulo']."',
                        text: '".$datos['Texto']."',
                        type: '".$datos['Tipo']."',
                        confirmButtonText: 'Aceptar'
                        }).then(function () {
                        location.reload();
                    });
                </script>
            ";
            }elseif($datos['Alerta']=="clean"){
                $alert_ms="
                <script>
                    swal({
                        title: '".$datos['Titulo']."',
                        text: '".$datos['Texto']."',
                        type: '".$datos['Tipo']."',
                        confirmButtonText: 'Aceptar'
                        }).then(function () {
                        $('.FormularioAjax')[0].reset();
                    });
                </script>
                ";
            }
            return $alert_ms;   
        }
        
    
    }