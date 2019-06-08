<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Mi Grupo <small>GESTIÓN PROYECTO</small></h1>
    </div>
    <p class="lead">Gestión de Mis Archivos</p>
</div> 

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL;?>proyecto/" class="btn btn-info">
                <i class="zmdi zmdi-file-plus"></i> &nbsp; NUEVO ARCHIVO
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL;?>proyectoconfig/" class="btn btn-success">
                <i class="zmdi zmdi-folder-person"></i> &nbsp; GESTIONAR ARCHIVOS
            </a>
        </li>
    </ul>
</div>

<!-- Tabla de adjuntos -->
<div class="container-fluid">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-folder-person"></i> &nbsp; GESTIONAR ARCHIVOS</h3>
        </div>
        <div class="panel-body">
        
             <?php
                    //session_start(['name'=>'PUCC']);
                    $cod_stu=$_SESSION['Cod_pucc'];

                    require_once "../core/mainModel.php";

                    $conexion=mainModel::connection();
                    $consult="SELECT Grupos_Gp_cod FROM estudiante WHERE Cuenta_Acc_cod1='$cod_stu'";
                    $datas=$conexion->query($consult);
                    $data_eventgp=$datas->fetch();
                    $id = $data_eventgp['Grupos_Gp_cod'];
                    echo $id;
                    $path = "../assets/".$id;
                    if(file_exists($path)){
                        $directorio = opendir($path);
                        while ($archivo = readdir($directorio))
                        {
                            if (!is_dir($archivo)){
                                echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
                                echo "$archivo <a href='#' class='delete' title='Ver Archivo Adjunto' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
                                echo "<img src='files/$id/$archivo' width='300' />";
                            }
                        }
                    }
                 ?>   
        
        </div>  
    </div>
</div>