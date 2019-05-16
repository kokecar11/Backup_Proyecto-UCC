<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> FORMATO <small>ANTEPROYECTO</small></h1>
    </div>
    
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo SERVERURLL?>anteproyectof/" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO FORMATO
            </a>
        </li>
        <!--<li>
            <a href="<?php echo SERVERURLL?>companylist/" class="btn btn-success">
                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EMPRESAS
            </a>
        </li>-->
    </ul>
</div>

<!-- panel lista de empresas -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; FORMATO DE CALIFICACIÓN DE ANTEPROYECTO</h3>
        </div>
        <div class="panel-body">
        <form>
        <fieldset>

                <legend><i class="zmdi zmdi-group"></i> &nbsp; Datos del Grupo</legend>
                            <div class="container-fluid">
                            </div>




        </fieldset>

        <fieldset>
        
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ASPECTO EVALUADO</th>
                            <th class="text-center">CUMPLE</th>
                            <th class="text-center">CRITERIOS</th>
                            <th class="text-center">RECOMENDACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Generalidades</td>
                            <td><select class="form-control" id="Opcion_generalidades" name="Opcion_generalidades">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>El tema es adecuado para ser desarrollado como proyecto de Grado.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Introducción</td>
                            <td><select class="form-control" id="Opcion_introduccion" name="Opcion_introduccion">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Presenta Claramente las principales ideas en relacion al problema.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Justificación</td>
                            <td><select class="form-control" id="Opcion_justificacion" name="Opcion_justificacion">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿Es conveniente la investigación y cuáles son los beneficios que se esperan con el conocimiento obtenido?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Argumentación</td>
                            <td><select class="form-control" id="Opcion_argumentacion" name="Opcion_argumentacion">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Claridad conceptual : ¿por qué?, ¿cómo?, ¿dónde?, ¿cuándo?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Planteamiento y formulación del problema</td>
                            <td><select class="form-control" id="Opcion_planteamiento" name="Opcion_planteamiento">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿El Problema está descrito en forma clara, precisa y accesible ? 
                                ¿Se especifica cómo se manifiesta y cuáles son las consecuencias de éste?</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Objetivo General</td>
                            <td><select class="form-control" id="Opcion_objetivog" name="Opcion_objetivog">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>El Objetivo General responde a las preguntas 
                                • ¿Qué se va a hacer? 
                                • ¿Cómo se va a hacer?
                                • ¿Para qué se va a hacer?
                                ¿El  objetivo es coherente con el planteamiento del problema y específicamente con la pregunta a resolver?</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Objetivos Específicos</td>
                            <td><select class="form-control" id="Opcion_objetivoe" name="Opcion_objetivoe">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿Los objetivos específicos conducen a la consecución del objetivo general?
                                    ¿Los objetivos específicos son pertinentes, concisos y son alcanzables?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Coherencia</td>
                            <td><select class="form-control" id="Opcion_coherencia" name="Opcion_coherencia">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Coherencia del título, Planteamiento y  objetivos.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Alcance y limitaciones</td>
                            <td><select class="form-control" id="Opcion_alcances" name="Opcion_alcances">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿Se define el espacio de tiempo, espacio geográfico y las limitaciones que se tengan para el cumplimiento de los objetivos?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Marco conceptual</td>
                            <td><select class="form-control" id="Opcion_marcoc" name="Opcion_marcoc">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿Presenta claramente las principales definiciones en relación al problema a resolver?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Marco teórico</td>
                            <td><select class="form-control" id="Opcion_marcot" name="Opcion_marcot">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Recoge las principales teorías sobre el tema del proyecto de grado.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Estado del arte</td>
                            <td><select class="form-control" id="Opcion_estadoarte" name="Opcion_estadoarte">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Presenta un análisis de los últimos estudios realizados sobre la temática a trabajar.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Impacto y/o viabilidad</td>
                            <td><select class="form-control" id="Opcion_impacto" name="Opcion_impacto">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Impacto y/o viabilidad técnica, social y económica.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Aplicación y/o aporte al área de conocimiento o sector</td>
                            <td><select class="form-control" id="Opcion_apparea" name="Opcion_apparea">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Mejoramiento técnico o tecnológico; desarrollo de procesos. Otros aportes.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Metodología</td>
                            <td><select class="form-control" id="Opcion_metodologia" name="Opcion_metodologia">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Muestra como se alcanzará cada uno de los objetivos propuestos.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Presupuesto</td>
                            <td><select class="form-control" id="Opcion_presupuesto" name="Opcion_presupuesto">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿Presenta todos los elementos necesarios para el desarrollo del proyecto?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Productos a entregar</td>
                            <td><select class="form-control" id="Opcion_productose" name="Opcion_productose">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>¿Se relacionan los productos que se entregarán como resultado del trabajo realizado por cada objetivo?.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td>Bibliografía</td>
                            <td><select class="form-control" id="Opcion_bibliografia" name="Opcion_bibliografia">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select></td>
                            <td>Presenta  referencias citadas en el documento y pertinentes.</td>
                            <td><textarea name="recomendation-anteproyecto" class="form-control" rows="4"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            </fieldset>
        </div>
            <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-mail-send"></i> Enviar Formato</button>
                </p>
            </form>
    </div>
</div>