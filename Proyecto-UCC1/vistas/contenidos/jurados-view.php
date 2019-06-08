<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <small>GRUPOS</small></h1>
    </div>
    <p class="lead">Asignación de Jurados a los Proyectos y Ante-Proyectos!</p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL?>group/" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO GRUPO
            </a>
        </li>
        <li>
            <a href="<?php echo SERVERURLL?>jurados/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; ASIGNAR JURADOS A GRUPOS
            </a>
        </li>
    </ul>
</div>

<!-- panel datos de los grupos -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL GRUPO</h3>
        </div>
        <div class="panel-body">
            <form action = "<?php echo SERVERURLL;?>ajax/juradosAjax.php" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos del Grupo</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Código de Grupo *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{1,10}" class="form-control" type="text" name="codgpjurado" required="" maxlength="10">
                                </div>
                            </div>
                        </div>
                    </div>   
                </fieldset>
                <fieldset>
                <legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos de los Jurados</legend>    
                <div class="container-fluid">
                        <div class="row">    
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Código de Jurado - 1*</label>
                                        <input pattern="[0-9-]{1,10}" class="form-control" type="text" name="jurado1" required="" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Código de Jurado - 2</label>
                                        <input pattern="[0-9-]{1,10}" class="form-control" type="text" name="jurado2" required="" maxlength="10">
                                    </div>
                                </div>
                            </div>                        
                        </div>
                </div>   
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Asignar</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>