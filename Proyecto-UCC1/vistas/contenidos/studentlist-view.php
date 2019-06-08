<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Usuarios <small>ESTUDIANTES</small></h1>
    </div>
    <p class="lead"></p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL?>student/" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ESTUDIANTE
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL?>studentlist/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ESTUDIANTES
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL?>studentsearch/" class="btn btn-primary">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ESTUDIANTES
            </a>
        </li>
    </ul>
</div>
<?php 
    require_once "./controladores/studentController.php";
    $insstudent= new studentController();

?> 

<!-- Panel listado de ESTUDIANTES -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ESTUDIANTES</h3>
        </div>
            <div class="panel-body">
                
                <?php
                    $pag= explode("/",$_GET['views']);
                    echo $insstudent->pag_student_controller($pag[1],10,$_SESSION['User_pucc'],"")
                
                
                ?>     
        </div>
    </div>
</div>
