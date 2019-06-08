<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"> <i class="zmdi zmdi-view-dashboard"></i> Mi Dashboard <small><?php echo $_SESSION['NameUser_pucc'].' '.
                        $_SESSION['LastNameUser_pucc'];?></small></h1>
    </div>
</div>

<div class="full-box text-center" style="padding: 30px 10px;">

    <article class="full-box tile">
        <div class="full-box tile-title text-center text-titles text-uppercase">
            Ante-proyecto
        </div>
        <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-graduation-cap"></i>
        </div>
        <div class="full-box tile-number text-titles">
        <?php 
            require "./controladores/anteproyectoController.php";
            $insanteproyecto=new anteproyectoController();
            $contanteproyecto = $insanteproyecto->update_estadosGp_C("Count",$_SESSION['Cod_pucc']);
                       
            $estado=$contanteproyecto->rowCount();?>
           <?php if($estado==18): ?>
            <p>A</p>
        <?php elseif($estado !=0 &&$estado >=11 && $estado <=17 ): ?>  
            <p>P</p>
        <?php elseif($estado < 11): ?> 
            <p>R</p>
        <?php endif;?> 
            <small>Estado</small>
        
        </div>
    </article>
    <article class="full-box tile">
        <div class="full-box tile-title text-center text-titles text-uppercase">
            Proyecto
        </div>
        <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-collection-bookmark"></i>
        </div>
        <div class="full-box tile-number text-titles">
            <p class="full-box">0<?php/* 
            require "./controladores/anteproyectoController.php";
            $insanteproyecto = new anteproyectoController();
            $contanteproyecto = $insanteproyecto->addnota_anteproyecto_C("Count",0);
            echo $contanteproyecto->rowCount();*/
            ?></p>
            <small>Nota Final</small>
        </div>
    </article>

    <article class="full-box tile">
        <div class="full-box tile-title text-center text-titles text-uppercase">
            Sustentación
        </div>
        <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-collection-image-o"></i>
        </div>
        <div class="full-box tile-number text-titles">
            <p class="full-box">0<?php/* 
            require "./controladores/anteproyectoController.php";
            $insanteproyecto = new anteproyectoController();
            $contanteproyecto = $insanteproyecto->addnota_anteproyecto_C("Count",0);
            echo $contanteproyecto->rowCount();*/
            ?></p>
            <small>Nota Final</small>
        </div>
    </article>
 </div>   

 <div class="container-fluid">
<p class="lead text-center">Estados de Ante-Proyecto 'A' = Aprobado, 'R' = Reprobado y 'P' = Pendiente</p>
</div>
