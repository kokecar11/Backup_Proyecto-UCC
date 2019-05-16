
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>EVENTOS</small></h1>
    </div>
    <p class="lead">Registrar los nuevos Eventos para los Grupos.</p>
</div>

<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EVENTO</h3>
        </div>
        <div class="panel-body">
        <form action = "<?php echo SERVERURLL;?>ajax/eventAjax.php" method = "POST" data-form = "save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <fieldset>
                <legend><i class="zmdi zmdi-calendar"></i> &nbsp;Buscar Grupo </legend>
                </fieldset>
                  <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Codigo de Grupo *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{1,15}" class="form-control" type="text" name="cod-gpevent" required="" maxlength="10">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <figcaption class="text-center text-titles"><?php ?></figcaption> 
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <figcaption class="text-center text-titles"><?php ?></figcaption> 
                            </div>
                        </div>   
                  </div>
                  
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Buscar Grupo</button>
                </p>
                <div class="RespuestaAjax"></div>
                
                  
                    <br>
            
            <fieldset>
                <legend><i class="zmdi zmdi-calendar"></i> &nbsp;Datos de Evento </legend>
                </fieldset>
                  <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Titulo de Evento *</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="title_event" required="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Descripcion del evento *</label>
                                        <textarea name="descrip_event" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                        </div>                               
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <legend><i class="zmdi zmdi-calendar"></i> &nbsp; Fecha de Entrega</legend>
                                        <?php
                                                            //combobox dia 
                                            echo "<select name='añof' class='cboForm' id='año'>";  
                                            echo '<option selected value="" selected="selected" >Año</option>';   
                                            for($i=2000;$i<2030;$i++){   
                                                echo '<option value="'.$i.'">'.$i.'</option>';  
                                            }  
                                            echo "</select>"; 

                                            echo "&nbsp;<font color='#FFFFFF'>/</font>&nbsp;"; 
                                            //combobox mes 
                                                echo "<select name='mesf' class='cboForm' id='mes'>"; 
                                                    echo "<option value='' selected='selected'>Mes</option>"; 
                                                    echo "<option value='01'>Enero</option>"; 
                                                    echo "<option value='02'>Febrero</option>"; 
                                                    echo "<option value='03'>Marzo</option>"; 
                                                    echo "<option value='04'>Abril</option>"; 
                                                    echo "<option value='05'>Mayo</option>"; 
                                                    echo "<option value='06'>Junio</option>"; 
                                                    echo "<option value='07'>Julio</option>"; 
                                                    echo "<option value='08'>Agosto</option>"; 
                                                    echo "<option value='09'>Septiembre</option>"; 
                                                    echo "<option value='10'>Octubre</option>"; 
                                                    echo "<option value='11'>Noviembre</option>"; 
                                                    echo "<option value='12'>Diciembre</option>"; 
                                                echo "</select>"; 
                                                
                                                echo "&nbsp;<font color='#FFFFFF'>/</font>&nbsp;";           
                                            echo "<select name='diaf' class='cboForm' id='dia' >"; 
                                            echo '<option selected value="" selected="selected" >Dia</option>';  
                                            for($i=1;$i<32;$i++){  
                                                    echo '<option value="'.$i.'">'.$i.'</option>'; 
                                            } 
                                            
                                            echo '</select>';

                                            echo "&nbsp;<font color='#FFFFFF'>/</font>&nbsp;";

                                            echo "<select name='horaf' class='cboForm' id='hora' >"; 
                                            echo '<option selected value="" selected="selected" >Hora</option>';  
                                            for($i=0;$i<24;$i++){  
                                                    echo '<option value="'.$i.'">'.$i.'</option>'; 
                                            } 
                                            echo '</select>'; 

                                            echo "&nbsp;<font color='#FFFFFF'>/</font>&nbsp;"; 
                                          
                                            echo "<select name='minutosf' class='cboForm' id='minutos' >"; 
                                            echo '<option selected value="" selected="selected" >Minutos</option>';  
                                            for($i=0;$i<60;$i++){  
                                                    echo '<option value="'.$i.'">'.$i.'</option>'; 
                                            } 
                                            echo '</select>';   
                                
                                        
                                        ?> 
                            </div>
                        </div>   
                  </div>
                </fieldset>


                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Crear Evento</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>