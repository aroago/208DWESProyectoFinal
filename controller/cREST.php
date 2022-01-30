<?php

include 'model/REST.php';

$bEntradaOK = true;
$bEntradaOKLibros = true;

// Variable de mensaje de error.
$aErrores = ['eBuscarInput' => null,
    'eResultado' => null,
    'eBusquedaLibro' =>null
    ];
$aRespuestas=[
        "busquedaLibro" =>""
    ];
    
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
if(isset($_REQUEST['buscarLibros'])){
        $aErrores['eBusquedaLibro']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busquedaLibro'], 255, 1);
        if($aErrores['eBusquedaLibro']!=""){
            $bEntradaOKLibros=false;
        }
    }else{
        $bEntradaOKLibros = false;
    }
    
if($bEntradaOKLibros){
     $aRespuestas['busquedaLibro']=$_REQUEST['busquedaLibro'];
        $aRespuestas['busquedaLibro']=strtr($aRespuestas['busquedaLibro'], " ", "-");
        
        $aLibros=REST::buscarLibrosPorTitulo($aRespuestas['busquedaLibro']);
        
        /*$resultadoAPI=file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$aRespuestas['busqueda']);
        $aResultadoAPI=json_decode($resultadoAPI,true);*/
        
        $aVistaREST=[];
        $indice=0;
        
        foreach($aLibros as $libro){
            $aVistaREST[$indice]['titulo']=$libro->getTitulo();
            $aVistaREST[$indice]['autores']=$libro->getAutor();
            $aVistaREST[$indice]['editorial']=$libro->getEditorial();
            $aVistaREST[$indice]['anyoEdicion']=$libro->getAnyoEdicion();
            $aVistaREST[$indice]['paginas']=$libro->getPaginas();
            $aVistaREST[$indice]['imagen']=$libro->getImagen();
            $aVistaREST[$indice]['link']=$libro->getLink();
            
            $indice++;
        }
}


include $aVistas['layout'];
?>