<!--Nota: Quitar Comentarios-->

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i> Mi Grupo <small>GESTIÓN PROYECTO</small></h1>
    </div>
    <p class="lead">Archivos Nuevos de Proyecto</p>
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


<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-file-plus"></i> &nbsp; NUEVO ARCHIVO</h3>
        </div>
        <div class="panel-body">
        <form action = "<?php echo SERVERURLL;?>ajax/fileAjax.php" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica del proyecto</legend>
                   <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Título *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="titulofile-reg" required="" maxlength="30">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Archivos</legend>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <span class="control-label">Adjuntar Archivo</span>
                            <input type="file" name="archivosgp-reg" >
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija el Documento...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span><small></small></span>
                        </div>
                    </div>
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>
