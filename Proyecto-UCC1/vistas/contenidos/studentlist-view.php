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
    $insAdmnn= new studentController();

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
                    echo $insAdmnn->pag_admin_controller($pag[1],10,$_SESSION['User_pucc'])
                
                
                ?>     

            <nav class="text-center">
                <ul class="pagination pagination-sm">
                    <li class="disabled"><a href="javascript:void(0)">«</a></li>
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)">4</a></li>
                    <li><a href="javascript:void(0)">5</a></li>
                    <li><a href="javascript:void(0)">»</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
