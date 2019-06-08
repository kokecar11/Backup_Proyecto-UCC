<?php

if($petiAjax){
    require_once ("../modelos/anteproyectoModels.php");
}else{
    require_once ("./modelos/anteproyectoModels.php");
}  

    class anteproyectoController extends anteproyectoModels{

        public function add_anteproyecto_C(){

            $cod=mainModel::clean_cadn($_POST['gpanteproyectof']);
            $generalidad=mainModel::clean_cadn($_POST['Opcion_generalidades']);
            $recgeneralidad=mainModel::clean_cadn($_POST['recomendation-generalidades']);
            $introduccion=mainModel::clean_cadn($_POST['Opcion_introduccion']);
            $recintroduccion=mainModel::clean_cadn($_POST['recomendation-introduccion']);
            $justificacion=mainModel::clean_cadn($_POST['Opcion_justificacion']);
            $recjustificacion=mainModel::clean_cadn($_POST['recomendation-justificacion']);
            $argumentacion=mainModel::clean_cadn($_POST['Opcion_argumentacion']);
            $recargumentacion=mainModel::clean_cadn($_POST['recomendation-argumentacion']);
            $planteamiento=mainModel::clean_cadn($_POST['Opcion_planteamiento']);
            $recplanteamiento=mainModel::clean_cadn($_POST['recomendation-argumentacion']);
            $obgetivog=mainModel::clean_cadn($_POST['Opcion_objetivog']);
            $recobgetivog=mainModel::clean_cadn($_POST['recomendation-objetivog']);
            $obgetivoe=mainModel::clean_cadn($_POST['Opcion_objetivoe']);
            $recobgetivoe=mainModel::clean_cadn($_POST['recomendation-objetivoe']);
            $coherencia=mainModel::clean_cadn($_POST['Opcion_coherencia']);
            $reccoherencia=mainModel::clean_cadn($_POST['recomendation-coherencia']);
            $alcances=mainModel::clean_cadn($_POST['Opcion_alcances']);
            $recalcances=mainModel::clean_cadn($_POST['recomendation-alcances']);
            $marcoc=mainModel::clean_cadn($_POST['Opcion_marcoc']);
            $recmarcoc=mainModel::clean_cadn($_POST['recomendation-marcoc']);
            $marcot=mainModel::clean_cadn($_POST['Opcion_marcot']);
            $recmarcot=mainModel::clean_cadn($_POST['recomendation-marcot']);
            $estadoa=mainModel::clean_cadn($_POST['Opcion_estadoarte']);
            $recesatadoa=mainModel::clean_cadn($_POST['recomendation-estadoarte']);
            $impacto=mainModel::clean_cadn($_POST['Opcion_impacto']);
            $recimpacto=mainModel::clean_cadn($_POST['recomendation-impacto']);
            $apparea=mainModel::clean_cadn($_POST['Opcion_apparea']);
            $recapparea=mainModel::clean_cadn($_POST['recomendation-apparea']);
            $metodologia=mainModel::clean_cadn($_POST['Opcion_metodologia']);
            $recmetodologia=mainModel::clean_cadn($_POST['recomendation-metodologia']);
            $presupuesto=mainModel::clean_cadn($_POST['Opcion_presupuesto']);
            $recpresupuesto=mainModel::clean_cadn($_POST['recomendation-presupuesto']);
            $productose=mainModel::clean_cadn($_POST['Opcion_productose']);
            $recproductose=mainModel::clean_cadn($_POST['recomendation-productose']);
            $bibliografia=mainModel::clean_cadn($_POST['Opcion_bibliografia']);
            $recbibliografia=mainModel::clean_cadn($_POST['recomendation-bibliografia']);


            $conexion=mainModel::connection();
            $consult="SELECT idFormatos FROM formatos WHERE Grupos_Gp_cod='$cod'";
            $datas=$conexion->query($consult);
            $data_formato=$datas->fetch();
            $pls=$data_formato['idFormatos'];


            

            $data_generalidad=[
                "cumple_formato"=>$generalidad,
                "recomendacion_formato"=>$recgeneralidad,
                "idFormato_Anteproyecto"=>1,
                "idFormatos"=>$pls
            ];
            $data_intro=[
                "cumple_formato"=>$introduccion,
                "recomendacion_formato"=>$recintroduccion,
                "idFormato_Anteproyecto"=>2,
                "idFormatos"=>$pls
            ];
            $data_justi=[
                "cumple_formato"=>$justificacion,
                "recomendacion_formato"=>$recjustificacion,
                "idFormato_Anteproyecto"=>3,
                "idFormatos"=>$pls
            ];
            $data_argu=[
                "cumple_formato"=>$argumentacion,
                "recomendacion_formato"=>$recargumentacion,
                "idFormato_Anteproyecto"=>4,
                "idFormatos"=>$pls
            ];
            $data_plante=[
                "cumple_formato"=>$planteamiento,
                "recomendacion_formato"=>$recplanteamiento,
                "idFormato_Anteproyecto"=>5,
                "idFormatos"=>$pls
            ];
            $data_obgg=[
                "cumple_formato"=>$obgetivog,
                "recomendacion_formato"=>$recobgetivog,
                "idFormato_Anteproyecto"=>6,
                "idFormatos"=>$pls
            ];
            $data_obge=[
                "cumple_formato"=>$obgetivoe,
                "recomendacion_formato"=>$recobgetivoe,
                "idFormato_Anteproyecto"=>7,
                "idFormatos"=>$pls
            ];
            $data_cohe=[
                "cumple_formato"=>$coherencia,
                "recomendacion_formato"=>$reccoherencia,
                "idFormato_Anteproyecto"=>8,
                "idFormatos"=>$pls
            ];
            $data_alcan=[
                "cumple_formato"=>$alcances,
                "recomendacion_formato"=>$recalcances,
                "idFormato_Anteproyecto"=>9,
                "idFormatos"=>$pls
            ];
            $data_marc=[
                "cumple_formato"=>$marcoc,
                "recomendacion_formato"=>$recmarcoc,
                "idFormato_Anteproyecto"=>10,
                "idFormatos"=>$pls
            ];
            $data_mart=[
                "cumple_formato"=>$marcot,
                "recomendacion_formato"=>$recmarcot,
                "idFormato_Anteproyecto"=>11,
                "idFormatos"=>$pls
            ];
            $data_esta=[
                "cumple_formato"=>$estadoa,
                "recomendacion_formato"=>$recesatadoa,
                "idFormato_Anteproyecto"=>12,
                "idFormatos"=>$pls
            ];
            $data_imp=[
                "cumple_formato"=>$impacto,
                "recomendacion_formato"=>$recimpacto,
                "idFormato_Anteproyecto"=>13,
                "idFormatos"=>$pls
            ];
            $data_app=[
                "cumple_formato"=>$apparea,
                "recomendacion_formato"=>$recapparea,
                "idFormato_Anteproyecto"=>14,
                "idFormatos"=>$pls
            ];
            $data_met=[
                "cumple_formato"=>$metodologia,
                "recomendacion_formato"=>$recmetodologia,
                "idFormato_Anteproyecto"=>15,
                "idFormatos"=>$pls
            ];
            $data_pres=[
                "cumple_formato"=>$presupuesto,
                "recomendacion_formato"=>$recpresupuesto,
                "idFormato_Anteproyecto"=>16,
                "idFormatos"=>$pls
            ];
            $data_prod=[
                "cumple_formato"=>$productose,
                "recomendacion_formato"=>$recproductose,
                "idFormato_Anteproyecto"=>17,
                "idFormatos"=>$pls
            ];
            $data_bib=[
                "cumple_formato"=>$bibliografia,
                "recomendacion_formato"=>$recbibliografia,
                "idFormato_Anteproyecto"=>18,
                "idFormatos"=>$pls
            ];
      
            $saveante1=anteproyectoModels::add_antreproyecto_M($data_generalidad);
            $saveante2=anteproyectoModels::add_antreproyecto_M($data_intro);
            $saveante3=anteproyectoModels::add_antreproyecto_M($data_justi);
            $saveante4=anteproyectoModels::add_antreproyecto_M($data_argu);
            $saveante5=anteproyectoModels::add_antreproyecto_M($data_plante);
            $saveante6=anteproyectoModels::add_antreproyecto_M($data_obgg);
            $saveante7=anteproyectoModels::add_antreproyecto_M($data_obge);
            $saveante8=anteproyectoModels::add_antreproyecto_M($data_cohe);
            $saveante9=anteproyectoModels::add_antreproyecto_M($data_alcan);
            $saveante0=anteproyectoModels::add_antreproyecto_M($data_marc);
            $saveante1=anteproyectoModels::add_antreproyecto_M($data_mart);
            $saveante2=anteproyectoModels::add_antreproyecto_M($data_esta);
            $saveante3=anteproyectoModels::add_antreproyecto_M($data_imp);
            $saveante4=anteproyectoModels::add_antreproyecto_M($data_app);
            $saveante5=anteproyectoModels::add_antreproyecto_M($data_met);
            $saveante6=anteproyectoModels::add_antreproyecto_M($data_pres);
            $saveante7=anteproyectoModels::add_antreproyecto_M($data_prod);
            $saveante8=anteproyectoModels::add_antreproyecto_M($data_bib);


            

            if($saveante1){
                $fantealert=[
                    "Alerta"=>"clean",
                    "Titulo"=>"Ante-Proyecto Calificado",
                    "Texto"=>"Formato de Anteproyecto Calificado Con Exito!.",
                    "Tipo"=>"success"
                ];
                return mainModel::sweet_alerts($fantealert);
         
            }else{
                
                $fantealert=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error Inesperado",
                    "Texto"=>"Los datos no se pudieron registrar.",
                    "Tipo"=>"error"
                ];
                return mainModel::sweet_alerts($fantealert);
                
            }


            
        }


        public function update_estadosGp_C($tipo,$codigo_admn){
            
            session_start(['name'=>'PUCC']);
            $codigo_admn=$_SESSION['Cod_pucc'];
                $codigo_admn=mainModel::decryption($codigo_admn);
                $tipo=mainModel::clean_cadn($codigo_admn);
                
                return anteproyectoModels::data_estado_model("Count",$_SESSION['Cod_pucc']);
    
            }
    }