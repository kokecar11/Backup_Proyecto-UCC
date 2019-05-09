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

        protected function send_email($email, $nombre, $asunto, $cuerpo){
            require_once '../PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //Modificar
            $mail->Host = 'smtp.gmail.com'; //Modificar
            $mail->Port = '587'; //Modificar
            
            $mail->Username = 'muddapp11@gmail.com'; //Modificar
            $mail->Password = 'c4rp1nt3r0'; //Modificar
            
            $mail->setFrom('correo emisor', 'nombre de correo emisor'); //Modificar
            $mail->addAddress($email, $nombre);
            
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->IsHTML(true);
            
            if($mail->send()){
                return true;
            }else{
                return false;
            }            
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
            
            $sql = self::connection()->prepare("INSERT INTO  grupos (Gp_cod,Gp_title,Gp_type) VALUES(:gp_cod,:gp_title,:gp_types)");
            $sql-> bindParam(":gp_cod",$grupo['gp_cod']); 
            $sql-> bindParam(":gp_title",$grupo['gp_title']); 
            $sql-> bindParam(":gp_types",$grupo['gp_types']); 
            $sql->execute();
            return $sql;
        }

        protected function delete_group($idgroup){
            $sql =self::connection()->prepare("DELETE FROM grupos WHERE Gp_cod=:codi_gp");
            $sql-> bindParam(":codi_gp",$idgroup);
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
        
        protected function gen_cod_random($letras,$long){
            
            for($i = 1; $i<=$long; $i++){
                $numero=rand(0,9);             
                $letras.=$numero;
            }
            return $letras;

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