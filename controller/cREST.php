<?php

include 'model/REST.php';

$bEntradaOK = true;
$bEntradaOKLibros = true;
$bEntradaOKPropio = true;
$bEntradaOKAjeno = true;
// Variable de mensaje de error.
$aErrores = ['eBuscarInput' => null,
    'eResultado' => null,
    'eBusquedaLibro' => null,
    'eBuscarPropio' => null
];
$aRespuestas = [
    "busquedaLibro" => ""
];

if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaAnterior'] =  $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicio";
    
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['infoapirest'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "infoAPI";

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
    $oResultadoProv = REST::provincia($_REQUEST['buscarInput']);

    if ($oResultadoProv == null) {
        $aErrores["eResultado"] = "Provincia no encontrada";
    } else {
        $nombreProvincia = $oResultadoProv->getProvincia();
        $idProvincia = $oResultadoProv->getIdProvincia();
        $descripcionProvincia = $oResultadoProv->getDescripcion();
        $tiempoProvincia = $oResultadoProv->getTiempo();
        $temmaximaProvincia = $oResultadoProv->getTemperaturaMax();
        $temminimaProvincia = $oResultadoProv->getTemperaturaMin();
    }
}

if (isset($_REQUEST['buscarPropio'])) {
    $aErrores['eBuscarPropio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['buscarInputPropio'], 3, 1, OBLIGATORIO);


    if ($aErrores['eBuscarPropio'] != null) {//si ha habido fallos en el array
        $_REQUEST['buscarPropio'] = "";
        $bEntradaOKPropio = false;
    }
}
/*
 * Si no se ha enviado el formulario, pone el manejador a false.
 */ else {
    $bEntradaOKPropio = false;
}
if ($bEntradaOKPropio) {//utilizacion de la web service cuando bEntrada=true
    $oResultadoDep = REST::buscarDepartamento($_REQUEST['buscarInputPropio']);

    if (is_object($oResultadoDep)) {
        $codDepartamento = $oResultadoDep->getCodDepartamento();
        $descDepartamento = $oResultadoDep->getDescDepartamento();
        $volumenDeNegocio = $oResultadoDep->getVolumenDeNegocio();
        $fechaCreacionDepartamento = $oResultadoDep->getFechaCreacionDepartamento();
    } else {
        $aErrores["eBuscarPropio"] = "Departamento no encontrado";
        $aErrorDepartamento=[
                    $oResultadoDep
                ];
    }
}


if (isset($_REQUEST['buscarLibros'])) {
    $aErrores['eBuscarPropio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['busquedaLibro'], 255, 1);
    if ($aErrores['eBusquedaLibro'] != "") {
        $bEntradaOKLibros = false;
    }
} else {
    $bEntradaOKLibros = false;
}

if ($bEntradaOKLibros) {
    $aRespuestas['busquedaLibro'] = $_REQUEST['busquedaLibro'];
    $aRespuestas['busquedaLibro'] = strtr($aRespuestas['busquedaLibro'], " ", "-");

    $aLibros = REST::buscarLibrosPorTitulo($aRespuestas['busquedaLibro']);

    $aVistaREST = [];
    $indice = 0;

    foreach ($aLibros as $libro) {
        $aVistaREST[$indice]['titulo'] = $libro->getTitulo();
        $aVistaREST[$indice]['autores'] = $libro->getAutor();
        $aVistaREST[$indice]['editorial'] = $libro->getEditorial();
        $aVistaREST[$indice]['anyoEdicion'] = $libro->getAnyoEdicion();
        $aVistaREST[$indice]['paginas'] = $libro->getPaginas();
        $aVistaREST[$indice]['imagen'] = $libro->getImagen();
        $aVistaREST[$indice]['link'] = $libro->getLink();

        $indice++;
    }
}

$aErroresDepartamento = [ //Array de errores
    'eBuscarDepartamento' => null,
    'eResultado' => null
];

if (isset($_REQUEST['buscarPropioA'])) {
    $aErroresDepartamento['eBuscarDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['buscarInputPropioA'], 3, 3, OBLIGATORIO); //Valido los datos pasados por teclado de codigo departamento
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErroresDepartamento as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $bEntradaOKAjeno = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
        }
    }
}else{ //Si el usuario no le ha dado al boton de buscar
    $bEntradaOKAjeno = false;
}

if($bEntradaOKAjeno){
    $oResultadoDepAjeno = REST::buscarDepartamentoAjeno($_REQUEST['buscarInputPropioA']);
   
    if(is_object($oResultadoDepAjeno)){
         $aDepartamento = [
            'codDepartamento' => $oResultadoDepAjeno->getCodDepartamento(),
            'descDepartamento' => $oResultadoDepAjeno->getDescDepartamento(),
            'fechaCreacionDepartamento' => $oResultadoDepAjeno->getFechaCreacionDepartamento(),
            'volumenDeNegocio' => $oResultadoDepAjeno->getVolumenDeNegocio(),
            'fechaBajaDepartamento' => $oResultadoDepAjeno->getFechaBajaDepartamento()
        ];
    }else{
        $aErroresDepartamento['eResultado'] = $oResultadoDepAjeno;
    }
}

include $aVistas['layout'];
?>