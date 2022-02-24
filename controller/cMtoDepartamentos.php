<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 26/1/2022
 * Last modification: 17/2/2022
 */
if (isset($_REQUEST['volver'])) {
    $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = ""; //Si el usuario sale de MtoDepartamentos, elimino el valor que hay guardado del campo de busqueda por descripcion
    $_SESSION['numPaginacionDepartamentos'] = 1; //Asigno la pagina de departamentos a 1
    $_SESSION['criterioBusquedaDepartamentos']['estado'] = ESTADO_TODOS;
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicio';
    header('Location: index.php');
    exit;
}
$iDepartamentosTotales = DepartamentoPDO::buscaDepartamentosTotales() / 3;
if (isset($_REQUEST['paginaPrimera'])) { //Si el usuario pulsa el boton de paginaPrimera
    $_SESSION['numPaginacionDepartamentos'] = 1; //Le situo en la primera pagina
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST['paginaAnterior']) && $_SESSION['numPaginacionDepartamentos'] >= 2) { //Si el usuario pulsa el boton de paginaAnterior
    $_SESSION['numPaginacionDepartamentos']--; //Le situo una pagina mas atras
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST['paginaSiguiente']) && $_SESSION['numPaginacionDepartamentos'] <= $iDepartamentosTotales) { //Si el usuario pulsa el boton de paginaSiguiente
    $_SESSION['numPaginacionDepartamentos']++; //Le situo una pagina mas adelante
    header('Location: index.php');
    exit;
}
if (isset($_REQUEST['paginaUltima'])) { //Si el usuario pulsa el boton de paginaUltima
    $_SESSION['numPaginacionDepartamentos'] = ceil($iDepartamentosTotales);
    header('Location: index.php');
    exit;
}


$aErrores = [
    "descBuscarDepartamento" => "",
    'filtroDepartamentos' => null
];
$aRespuestas = [
    "descBuscarDepartamento" => ""
];

$aLista = [//Array de lista de opciones de filtrado
    'todos',
    'altas',
    'bajas'
];




if (isset($_REQUEST['buscar'])) {
    $bEntradaOK = true;
    $aErrores['descBuscarDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 255, 1);
    $aErrores['filtroDepartamentos'] = validacionFormularios::validarElementoEnLista($_REQUEST['estado'], $aLista);

    foreach ($aErrores as $clave => $error) {
        //condición de que hay un error
        if (($error) != null) {
            $bEntradaOK = false;
        }
    }
} else {
    $bEntradaOK = false;
}
if ($bEntradaOK) {
    $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = $_REQUEST['descDepartamento']; //Guardo en la session el contenido del campo de buscar departamento por descripcion
    switch ($_REQUEST['estado']) { //Guardo el estado que ha seleccionado el usuario en el filtrado de la busqueda
        case 'todos':
            $sEstado = ESTADO_TODOS;
            break;
        case 'altas':
            $sEstado = ESTADO_ALTAS;
            break;
        case 'bajas':
            $sEstado = ESTADO_BAJAS;
            break;
    }
    $_SESSION['criterioBusquedaDepartamentos']['estado'] = $sEstado; //Guardo el valor del estado en la session
}
$aDepartamentosVista = []; //Array para guardar el contenido de un departamento
$oResultadoBuscar = DepartamentoPDO::buscaDepartamentosPorEstado($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? '', $_SESSION['criterioBusquedaDepartamentos']['estado'] ?? ESTADO_TODOS, $_SESSION['numPaginacionDepartamentos'] ); //Obtengo los datos del departamento con el metodo buscaDepartamentosPorDesc
if ($oResultadoBuscar) { //Si el resultado es correcto
    foreach ($oResultadoBuscar as $aDepartamento) {//Recorro el objeto del resultado que contiene un array
        array_push($aDepartamentosVista, [//Hago uso del metodo array push para meter los valores en el array $aDepartamentosVista
            'codDepartamento' => $aDepartamento->getCodDepartamento(), //Guardo en el valor codDepartamento el codigo del departamento
            'descDepartamento' => $aDepartamento->getDescDepartamento(), //Guardo en el valor descDepartamento la descripcion del departamento
            'fechaAlta' => date('d/m/Y H:i:s', $aDepartamento->getFechaCreacionDepartamento()), //Guardo en el valor fechaAlta la fecha de alta del departamento
            'volumenNegocio' => $aDepartamento->getVolumenDeNegocio(), //Guardo en el valor volumenNegocio el volumen de negocio del departamento
            'fechaBaja' => !empty($aDepartamento->getFechaBajaDepartamento()) ? date('d/m/Y H:i:s', $aDepartamento->getFechaBajaDepartamento()) : '' //Guardo en el valor fechaBaja la fecha de baja del departamento
        ]);
    }
} else {
    $aErrores['descBuscarDepartamento'] = "No se encuentra el departamento";
}


include $aVistas['layout'];
?>