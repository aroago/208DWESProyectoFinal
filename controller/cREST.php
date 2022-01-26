<?php

$bEntradaOK = true;
// Variable de mensaje de error.
$aErrores = ['eBuscarInput' => null,
    'eNoEncontrada'=>null];

$ciudadEncontrada = false;


if (isset($_REQUEST['volver'])) {
    unset($_SESSION['APIrest']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaAnterior']="rest";
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['buscarSubmit'])) {
    $aErrores['eBuscarInput']= validacionFormularios::comprobarAlfaNumerico($_REQUEST["buscarInput"], 255, 2, OBLIGATORIO);
    
    
    if($aErrores['eBuscarInput']!=null){//si ha habido fallos en el array
        $aErrores['eBuscarInput']= "minimo 2 numeros";
        unset($_SESSION['APIrest']);
        $_REQUEST['buscarSubmit'] = "";
        $bEntradaOK = false;
    }
}
/*
 * Si no se ha enviado el formulario, pone el manejador a false.
 */ else {
    $bEntradaOK = false;
}
if ($bEntradaOK) {//utilizacion de la web service cuando bEntrada=true
     $sResultadoSinFiltro= file_get_contents('https://www.el-tiempo.net/api/json/v2/provincias/'.$_REQUEST['buscarInput']);//devuelve un String del contenido JSON
     $aJson=json_decode($sResultadoSinFiltro,true);//decodificamos el json y lo devolvemos en un array
     $_SESSION['APIrest']=$aJson;
      
   
}
include $aVistas['layout'];
?>