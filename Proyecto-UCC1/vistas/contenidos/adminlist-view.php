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
    require_once "./controladores/adminController.php";
    $insAdmnn= new adminController();

?> 
<!-- Panel listado de profesores -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROFESORES</h3>       
        </div>
        <div class="panel-body">
        <form action = "<?php echo SERVERURLL;?>" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
          
                 <?php
                    $pag= explode("/",$_GET['views']);
                    echo $insAdmnn->pag_admin_controller($pag[1],10,$_SESSION['User_pucc'],"");                 
                 ?>                  
        </div>
        <br>
                <p class="text-center" style="margin-top: 20px;">
                <a href="#!" class="btn btn-success btn-raised btn-xs"> Imprimir Listado
                                    <i class="zmdi zmdi-download"></i>
                                </a>
                </p>
                <div class="RespuestaAjax"></div>
        </form>
    </div>
</div>


