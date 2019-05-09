<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> MIS DATOS</small></h1>
    </div>
    <p class="lead"></p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
        </div>
        <div class="panel-body">
            <form>
                <fieldset>
                    <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombres *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-up" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Apellidos *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-up" required="" maxlength="30">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
                </p>
            </form>
        </div>
    </div>
</div>