<?php

include 'model/REST.php';

$bEntradaOK = true;
$bEntradaOKLibros = true;
$bEntradaOKPropio = true;

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


include $aVistas['layout'];
?>