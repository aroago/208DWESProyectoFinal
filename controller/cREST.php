<?php

$bEntradaOK = true;
// Variable de mensaje de error.
$aErrores = ['eBuscarInput' => null,
    'eNoEncontrada'=>null];
$ciudadEncontrada = false;


if (isset($_REQUEST['volver'])) {
    unset($_SESSION['APIrest']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['buscarSubmit'])) {
    $aErrores['eBuscarInput']= validacionFormularios::comprobarAlfabetico($_REQUEST["buscarInput"], 100, 3, OBLIGATORIO);
    
    if($aErrores['eBuscarInput']!=null){//si ha habido fallos en el array
        $aErrores['eBuscarInput']= "Solo se admiten letras, min 3";
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
if ($bEntradaOK) {
     $sResultadoSinFiltro= file_get_contents('https://www.el-tiempo.net/api/json/v2/home');//devuelve un String del contenido JSON
      $aJson=json_decode($sResultadoSinFiltro,true);//decodificamos el json y lo devolvemos en un array
      
    for ($i=0 ; $i< count($aJson['ciudades']) && !$ciudadEncontrada ;$i++){//recorremos el arrray por las ciudades
        if(strtolower($aJson["ciudades"][$i]['name']) == strtolower($_REQUEST['buscarInput'])){//buscamos la ciudad introducida por el usuario
          
           $_SESSION['APIrest']=$aJson["ciudades"][$i];
           
           $ciudadEncontrada = true;
        }
    } 
}
include $aVistas['layout'];
?>