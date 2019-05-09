<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>GRUPOS</small></h1>
    </div>
    <p class="lead">Creacion de Grupos de Proyecto y Ante-Proyecto!</p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL?>group/" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO GRUPO
            </a>
        </li>
        <!--<li>
            <a href="<?php echo SERVERURLL?>grouplist" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE GRUPOS
            </a>
        </li>-->
    </ul>
</div>

<!-- panel datos de los grupos -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL GRUPO</h3>
        </div>
        <div class="panel-body">
        <form action = "<?php echo SERVERURLL;?>ajax/groupAjax.php" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos del Grupo</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del Grupo *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombregp-reg" required="" maxlength="40">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tipo de Grupo *</label>
                                        <select class="form-control" id="Tipo_pross" name="Tipo_pross">
                                            <option value="Ante-Proyecto">Ante-Proyecto</option>
                                            <option value="Proyecto">Proyecto</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Integrantes del Grupo</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Codigo de Integrante - 1*</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" class="form-control" type="text" name="Estudiante1-reg" required="" maxlength="50">
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo de Integrante - 2</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" class="form-control" type="text" name="Estudiante2-reg" required="" maxlength="50">
                                         </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Codigo de Asesor*</label>
                                        <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" class="form-control" type="text" name="Asesor-reg" required="" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Codigo de Jurado - 1*</label>
                                        <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" class="form-control" type="text" name="Jurado1-reg" required="" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Codigo de Jurado - 2</label>
                                        <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" class="form-control" type="text" name="Jurado2-reg" required="" maxlength="50">
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </fieldset>
                <br>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Crear Grupo</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>