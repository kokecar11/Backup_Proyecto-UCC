<?php
    require "./core/configGeneral.php";
    require "./core/mainModel.php";
	
	session_start();
		
	$errors = array();
	
	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email_res']);
		
		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}
		
		if(emailExiste($email))
		{			
			$user_id = getValor('id', 'correo', $email);
			$nombre = getValor('nombre', 'correo', $email);
			
			$token = generaTokenPass($user_id);
			
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;
			
			$asunto = 'Recuperar Password - Sistema de Usuarios';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";
			
			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
				echo "<a href='index.php' >Iniciar Sesion</a>";
				exit;
			}
			} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}


?>

<!DOCTYPE html>
<html lang="es">  
<head>
	<title>Recuperar Contraseña</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURLL;?>vistas/css/main.css">
</head>
<body>
    <div class="full-box login-container cover">
        <form action="<?php echo SERVERURLL;?>" method="" autocomplete="off" class="logInForm">        
                <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
                <p class="text-center text-muted text-uppercase">Recuperar Contraseña.</p>
                <div class="form-group label-floating">
                    <label class="control-label" for="UserName">Correo Institucional*</label>
                    <input class="form-control" id="UserName" name="email_res" type="email">
                    <p class="help-block">Escribe tú Correo Institucional</p>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Recuperar" class="btn btn-info" style="color: #FFF;">
                </div>
        </form> 
    </div>
    <?php include "./vistas/modulos/script.php"; ?>
</body>
</html>