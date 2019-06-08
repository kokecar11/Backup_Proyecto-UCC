<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Usuarios <small>ESTUDIANTES</small></h1>
    </div>
    <p class="lead">Aqui puede registrar un nuevo Estudiante</p>
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

<!-- Panel nuevo estudiantes -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ESTUDIANTE</h3>
        </div>
        <div class="panel-body">
            <form action = "<?php echo SERVERURLL;?>ajax/studentAjax.php" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <fieldset>
                    <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombres *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="stu-names-reg" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Apellidos *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="stu-lastnames-reg" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Código *</label>
                                    <input pattern="[0-9-]{1,10}" class="form-control" type="text" name="stu-cod-reg" required="" maxlength="9">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Semestre *</label>
                                    <input class="form-control" type="number" name="stu-six-reg" min="1" max="10" required="" maxlength="2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                
                <fieldset>
                    <legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                            
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de Usuario institucional*</label>
                                    <input class="form-control" type="text" name="stu-email-reg" required="" maxlength="50">
                                    <label>@ucatolica.edu.co</label>
                                </div> 
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Contraseña *</label>
                                    <input class="form-control" type="password" name="stu-password1-reg" required="" maxlength="70">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Repita la contraseña *</label>
                                    <input class="form-control" type="password" name="stu-password2-reg" required="" maxlength="70">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>