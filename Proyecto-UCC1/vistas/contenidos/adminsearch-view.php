<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>PROFESORES</small></h1>
    </div>
    <p class="lead"></p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL;?>admin/" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROFESOR
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL;?>adminlist/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROFESORES
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL;?>adminsearch/" class="btn btn-primary">
                <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROFESOR
            </a>
        </li>
    </ul>
</div>

<?php 
    require_once "./controladores/adminController.php";
    $insAdmnn= new adminController();

    if(isset($_POST['search_teacher'])){
        $_SESSION['search_t']=$_POST['search_teacher'];
    }

    if(isset($_POST['search_destroy_teacher'])){
        unset($_SESSION['search_t']);

    }

    if(!isset( $_SESSION['search_t']) && empty( $_SESSION['search_t'])):
?> 

<div class="container-fluid">
    <form class="well" method="POST" action="">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="form-group label-floating">
                    <span class="control-label">¿A quién estas buscando?, Digita el Codigo.</span>
                    <input class="form-control" type="text" name="search_teacher" required="">
                </div>
            </div>
            <div class="col-xs-12">
                <p class="text-center">
                    <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
                </p>
            </div>
        </div>
    </form>
</div>
    <?php else:?>

<div class="container-fluid">
    <form class="well" method="POST" action="">
        <p class="lead text-center">Su último Codigo buscado fue <strong>"<?php echo $_POST['search_teacher'];?>"</strong></p>
        <div class="row">
            <input class="form-control" type="hidden" name="search_destroy_teacher" value="1">
            <div class="col-xs-12">
                <p class="text-center">
                    <button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda</button>
                </p>
            </div>
        </div>
    </form>
</div>

<!-- Panel listado de busqueda de administradores -->
<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROFESOR</h3>
        </div>
        <div class="panel-body">
            <?php
                    $pag= explode("/",$_GET['views']);
                    echo $insAdmnn->pag_admin_controller($pag[1],10,$_SESSION['User_pucc'],$_SESSION['search_t']);
                 
                 
                 ?>  
        </div>
    </div>
</div>
    <?php endif;?>