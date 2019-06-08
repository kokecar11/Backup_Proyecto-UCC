<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo SERVERURLL?>/favicon.ico">
	<title><?php echo PROYECTO?> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURLL?>vistas/css/main.css"/>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<!--Calendar Scripts -->
       
	<script src="<?php echo SERVERURLL;?>vistas/js/sweetalert2.min.js"></script>
	<script src="<?php echo SERVERURLL;?>vistas/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo SERVERURLL;?>vistas/js/bootstrap.min.js"></script>
	<script src="<?php echo SERVERURLL;?>vistas/js/material.min.js"></script>
	<script src="<?php echo SERVERURLL;?>vistas/js/ripples.min.js"></script>
	<script src="<?php echo SERVERURLL;?>vistas/js/jquery.mCustomScrollbar.concat.min.js"></script>

	<script>
		$.material.init();
	</script>

</head>
<body>
	<?php 
		$petiAjax=false;
		require_once "./controladores/viewsController.php";
		

		$vw = new viewsController();
		$viewR = $vw-> obt_views_controller();
		if($viewR == "login"||$viewR == "404"):
			if($viewR == "login"){
				require_once "./vistas/contenidos/login-view.php";
			}else{
				require_once "./vistas/contenidos/404-view.php";
			}
			
		else:	
			session_start(['name'=>'PUCC']);
	?>
	<!-- SideBar -->
		<?php include "./vistas/modulos/navlateral.php"; ?>     
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<?php include "./vistas/modulos/navbar.php"; ?>  
		<!-- Content page -->
		<?php require_once $viewR; ?>

	</section>
	<?php endif; ?>
	<!--<?php include "./vistas/modulos/script.php"; ?>-->



	<script src="<?php echo SERVERURLL;?>vistas/js/sweetalert2.min.js"></script>
	<script src="<?php echo SERVERURLL;?>vistas/js/main.js"></script>

</body>
</html>