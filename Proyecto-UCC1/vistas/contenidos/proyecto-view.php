<!--Nota: Quitar Comentarios-->

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Mi Grupo <small>PROYECTO</small></h1>
    </div>
    <p class="lead">Gestión de Proyecto</p>
</div> 


<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO </h3>
        </div>
        <div class="panel-body">
            <form>
                <fieldset>
                    <legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica del proyecto</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Título *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="titulo-reg" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Autor *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="autor-reg" required="" maxlength="30">
                                </div>
                            </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Archivos</legend>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <span class="control-label">PDF</span>
                            <input type="file" name="pdf-reg" accept=".pdf">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span><small></small></span>
                        </div>
                    </div>
                    <!--<div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label class="control-label">¿El archivo PDF será descargable para los ?</label>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsPDF" id="optionsRadios1" value="Si" checked="">
                                    <i class="zmdi zmdi-cloud-download"></i> &nbsp; Si, PDF descargable
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsPDF" id="optionsRadios2" value="No">
                                    <i class="zmdi zmdi-cloud-off"></i> &nbsp; No, PDF no descargable
                                </label>
                            </div>
                        </div>
                    </div>-->
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                </p>
            </form>
        </div>
    </div>
</div>
