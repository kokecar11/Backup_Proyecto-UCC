<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-email zmdi-hc-fw"></i> CONTACTO</small></h1>
    </div>
    <p class="lead">Podrá comunicarse via correo electrónico con su Asesor, Jurado o Compañeros.</p>
</div>

<!-- Panel de Contacto -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-email-open"></i> &nbsp; DATOS DE CONTACTO</h3>
        </div>
        <div class="panel-body">
            <form action = "<?php echo SERVERURLL;?>ajax/contactAjax.php" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                 <br>
                <fieldset>
                   <!-- <legend><i class="zmdi zmdi-lock"></i> &nbsp;Asunto </legend>-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Asunto*</label>
                                    <input class="form-control" type="text" name="AsuntoMail" required="on" maxlength="70">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Dirección de Correo Electrónico*</label>
                                    <input class="form-control" type="email" name="Email_receptor" required="on" maxlength="70">
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Mensaje*</label>
                                            <textarea name="BodyMail" class="form-control" rows="3" required="on"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>

                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-mail-send"></i> Enviar</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>