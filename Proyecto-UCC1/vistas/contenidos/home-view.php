<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Dashboard <small>Usuarios</small></h1>
    </div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">

    <!--<article class="full-box tile">
        <div class="full-box tile-title text-center text-titles text-uppercase">
            Coordinador
        </div>
        <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-account"></i>
        </div>
        <div class="full-box tile-number text-titles">
            <p class="full-box">0</p>
            <small>Registrados</small>
        </div>
    </article>-->
    <article class="full-box tile">
        <div class="full-box tile-title text-center text-titles text-uppercase">
            Profesores
        </div>
        <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-account"></i>
        </div>
        <div class="full-box tile-number text-titles">
            <p class="full-box"><?php 
            require "./controladores/adminController.php";
            $insAdmin= new adminController();
            $contAdmin= $insAdmin->data_admin_controller("Count",0);
            echo $contAdmin->rowCount();
            ?></p>
            <small>Registrados</small>
        </div>
    </article>
    <article class="full-box tile">
        <div class="full-box tile-title text-center text-titles text-uppercase">
            Estudiantes
        </div>
        <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-account-box"></i>
        </div>
        <div class="full-box tile-number text-titles">
            <p class="full-box"><?php 
            require "./controladores/studentController.php";
            $insstudent= new studentController();
            $contstudent= $insstudent->data_student_controller("Conteo",1);
            echo $contstudent->rowCount();
            ?></p>
            <small>Registrados</small>
        </div>
    </article>
</div>
<!--<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">System <small>TimeLine</small></h1>
    </div>
    <section id="cd-timeline" class="cd-container">
        <div class="cd-timeline-block">
            <div class="cd-timeline-img">
                <img src="<?php echo SERVERURLL?>vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
            </div>
            <div class="cd-timeline-content">
                <h4 class="text-center text-titles">1 - Name (Admin)</h4>
                <p class="text-center">
                    <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                    <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                </p>
                <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
            </div>
        </div>  
        <div class="cd-timeline-block">
            <div class="cd-timeline-img">
                <img src="<?php echo SERVERURLL?>vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
            </div>
            <div class="cd-timeline-content">
                <h4 class="text-center text-titles">2 - Name (Teacher)</h4>
                <p class="text-center">
                    <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                    <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                </p>
                <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
            </div>
        </div>
        <div class="cd-timeline-block">
            <div class="cd-timeline-img">
                <img src="<?php echo SERVERURLL?>vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
            </div>
            <div class="cd-timeline-content">
                <h4 class="text-center text-titles">3 - Name (Student)</h4>
                <p class="text-center">
                    <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                    <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                </p>
                <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
            </div>
        </div>
        <div class="cd-timeline-block">
            <div class="cd-timeline-img">
                <img src="<?php echo SERVERURLL?>vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
            </div>
            <div class="cd-timeline-content">
                <h4 class="text-center text-titles">4 - Name (Personal Ad.)</h4>
                <p class="text-center">
                    <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                    <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                </p>
                <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
            </div>
        </div>   
    </section>


</div>-->