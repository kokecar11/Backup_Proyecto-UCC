		<!-- Content page -->
        <div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>PROFESORES</small></h1>
    </div>
    <p class="lead"></p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL?>admin/" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROFESOR
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL?>adminlist/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROFESORES
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL?>adminsearch/" class="btn btn-primary">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROFESOR
            </a>
        </li>
    </ul>
</div>
<?php 
    require_once "./controladores/reportController.php";
    $insAdmnn1= new reportController();

?> 
<!-- Panel listado de profesores -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROFESORES</h3>       
        </div>
        <div class="panel-body">
             
                 <?php
                    $pag= explode("/",$_GET['views']);
                    echo $insAdmnn1->reporte_admin_controller();                 
                 ?>                  
        </div>
        <br>
                <p class="text-center" style="margin-top: 20px;">
                <a href="<?php echo SERVERURLL;?>creaPdf.php" class="btn btn-success btn-raised btn-xs"> Imprimir Listado
                                    <i class="zmdi zmdi-download"></i>
                </a>
                </p>
                
        
    </div>
</div>