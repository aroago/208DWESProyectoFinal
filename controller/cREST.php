<?php

include 'model/REST.php';

$bEntradaOK = true;
// Variable de mensaje de error.
$aErrores = ['eBuscarInput' => null,
    'eResultado' => null];

$ciudadEncontrada = false;


if (isset($_REQUEST['volver'])) {
    unset($_SESSION['APIrest']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaAnterior'] = "rest";
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['buscarSubmit'])) {
    $aErrores['eBuscarInput'] = validacionFormularios::comprobarEntero($_REQUEST['buscarInput'], 52, 1, OBLIGATORIO);


    if ($aErrores['eBuscarInput'] != null) {//si ha habido fallos en el array
        
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
    
  $oResultadoProv= REST::provincia($_REQUEST['buscarInput']);
  
  if ($oResultadoProv == null){
      $aErrores["eResultado"]="Provincia no encontrada";
  }
       
}

include $aVistas['layout'];
?>