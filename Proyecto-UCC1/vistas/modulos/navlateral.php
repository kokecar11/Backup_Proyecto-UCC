<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
						<figure class="full-box">
						<a title="Pagina Universidad Catolica de Colombia" href="https://www.ucatolica.edu.co/portal/"><img src="<?php echo SERVERURLL?>vistas/assets/img/logo-ucatolica.png"  width="250" height="70"></a>
						</figure>
			</div> 
			<br>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="<?php echo SERVERURLL?>vistas/assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
					<figcaption class="text-center text-titles"><?php echo $_SESSION['NameUser_pucc'].' '.
                        $_SESSION['LastNameUser_pucc'];?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="<?php echo SERVERURLL?>mydata/" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURLL?>myacc/" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURLL?>login/" title="Salir del sistema" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="<?php echo SERVERURLL?>home/">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURLL?>group/"><i class="zmdi zmdi-group zmdi-hc-fw"></i> Grupos</a>
						</li>
						<li>
							<a href="<?php echo SERVERURLL?>events/"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i> Eventos</a>
						</li>
						<!--<li>
							<a href="http://localhost/Proyecto-UCC/Calendario/indexcalendario.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i> Proveedores</a>
						</li>
						<li>
							<a href="<?php echo SERVERURLL?>proyecto/"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Nuevo libro</a>
						</li>-->
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURLL?>admin/"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Profesores</a>
						</li>
						<li>
							<a href="<?php echo SERVERURLL?>student/"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>Estudiantes</a>
						</li>
					</ul>
					<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-book-image zmdi-hc-fw"></i> Mi Grupo <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURLL?>proyecto/"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Proyecto</a>
						</li>
						<li>
							<a href="<?php echo SERVERURLL?>proyectoconfig/"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>Gestion Proyecto</a>
						</li>
					</ul>
				</li>
			<br>
			<br>
			<br>
		<figcaption class="text-center text-titles">Programa de Ingeniería de Sistemas y Computación</figcaption>		
		</div>
	</section>
