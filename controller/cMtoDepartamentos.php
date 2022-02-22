<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 26/1/2022
 * Last modification: 17/2/2022
 */
if (isset($_REQUEST['volver'])) {

    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicio';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['altaDepartamento'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'WIP';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['editarDepartamento'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'WIP';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['bajaFisica'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'WIP';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['bajaLogica'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'WIP';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['rehabilitar'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'WIP';
    header('Location: index.php');
    exit;
}
 if(isset($_REQUEST['paginaAnterior']) && $_SESSION['numPaginacionDepartamentos']>1){
        $_SESSION['numPaginacionDepartamentos']--;
        
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['paginaSiguiente']) && $_SESSION['numPaginacionDepartamentos']<$_SESSION['numPaginas']){
        $_SESSION['numPaginacionDepartamentos']++;
        
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['primeraPagina'])){
        $_SESSION['numPaginacionDepartamentos']=1;
        
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['ultimaPagina'])){
        $_SESSION['numPaginacionDepartamentos']=$_SESSION['numPaginas'];
        
        header('Location: index.php');
        exit;
    }

  
    $aErrores=[
      "busquedaDesc" => ""  
    ];
    $aRespuestas=[
      "busquedaDesc" => ""  
    ];
    
    $bEntradaOK=true;
    
    if(isset($_REQUEST['buscar'])){
        $aErrores['busquedaDesc']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busquedaDesc'], 255, 1);
    
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    else{
        $bEntradaOK=false;
        $oDepartamentos=DepartamentoPDO::buscaDepartamentosPorDesc("",0,$_SESSION['numPaginacionDepartamentos']-1);
        $oResultado=$oDepartamentos->fetchObject();
    }
    if($bEntradaOK){
       $_SESSION['criterioBusquedaDepartamentos']['descripcionBusqueda'] = $_REQUEST['busquedaDesc'];
        $_SESSION['criterioBusquedaDepartamentos']['estado'] = $_REQUEST['tipoCriterio'];
        
       if(isset($_REQUEST['busquedaDesc'])){
            $aRespuestas['busquedaDesc']=$_REQUEST['busquedaDesc'];
            $oDepartamentos= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['busquedaDesc'],$_SESSION['criterioBusquedaDepartamentos']['estado'], $_SESSION['numPaginacionDepartamentos']-1);
            $oResultado=$oDepartamentos->fetchObject();
        }
        
    }
    $numDepartamentos= DepartamentoPDO::contarDepartamentos($_SESSION['criterioBusquedaDepartamentos']['estado']??0);
    $_SESSION['numPaginas']=($numDepartamentos%3===0)?$numDepartamentos/3:intdiv($numDepartamentos,3)+1;
    
    $aDepartamentos=[];
    $contador=0;
    while($oResultado!=null){
        foreach($oResultado as $clave=>$valor){
            $aDepartamentos[$contador][$clave]=$valor;
        }
        $contador++;
        $oResultado=$oDepartamentos->fetchObject();
    }
    
    

include $aVistas['layout'];
?>