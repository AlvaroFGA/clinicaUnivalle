<?php 
require('../../modelo/conexion.php');
 if(isset($_POST["Enviar"])){   
    $estadoSalud = trim($_POST["EstadoSalud"]);
    $actitud=trim($_POST[""]);
    $marcha=trim($_POST[""]);
    $biotipologia=trim($_POST[""]);
    $peso=trim($_POST[""]);
    $talla=trim($_POST[""]);
    $habitoPos=trim($_POST[""]);
    $examenCrane=trim($_POST[""]);
    $tipoFacial=trim($_POST[""]);
    $examenFacial=trim($_POST[""]);
    $perfilFaci=trim($_POST[""]);
    $facias=trim($_POST[""]);
    $exmanATM=trim($_POST[""]);
    $dx1=trim($_POST[""]);
    $examenGang=trim($_POST[""]);
    $dx2=trim($_POST[""]);
    $labios=trim($_POST[""]);
    $mucosaYugal=trim($_POST[""]);
    $lengua=trim($_POST[""]);
    $paladar=trim($_POST[""]);
    $amigdalas=trim($_POST[""]);
    $encias=trim($_POST[""]);
    if(isset($_POST["Tartaro"]) ){
       $TartaroSelect = $_POST["Tartaro"]; 
    }
    if(isset($_POST["Halitosis"]) ){
        $HalitosisSelect = $_POST["Halitosis"];
    }
    if(isset($_POST["Saburra"]) ){
        $SaburraSelect = $_POST["Saburra"];
    }
    if(isset($_POST["PlacaBac"]) ){
        $PlacaSelect = $_POST["PlacaBac"];
    }
    if(isset($_POST["PlacaMat"]) ){
        $PlacaMatSelect= $_POST["PlacaMat"];
    }
    //Derecha
    if(isset($_POST["RelacionMolarDe"]) ){
        $relacionMolarDe= $_POST["RelacionMolarDe"];
    }
    if(isset($_POST["RelacionCaninaDe"]) ){
        $relacionCaninaDe= $_POST["RelacionCaninaDe"];
    }
    $overjetDe=trim($_POST[""]);
    $desviacionDe=trim($_POST[""]);
    if(isset($_POST["Derecha"]) ){
        $derecha= $_POST["Derecha"];
    }
    //Izquierda
    if(isset($_POST["RelacionMolarIz"]) ){
        $relacionMolarIz= $_POST["RelacionMolarIz"];
    }
    if(isset($_POST["RelacionCaninaDe"]) ){
        $relacionCaninaIz= $_POST["RelacionCaninaIz"];
    }
    $overjetIz=trim($_POST[""]);
    $desviacionIz=trim($_POST[""]);
    if(isset($_POST["Izquierda"]) ){
        $derecha= $_POST["Izquierda"];
    }
 }


?>