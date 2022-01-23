<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
 * */
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    unset($_SESSION['error']);
    header('location: ./index.php');
    exit;
}

// Array con la información de la vista.
$aVError = [
    'error' => $_SESSION['error']->getDescError(),
    'codigo' => $_SESSION['error']->getCodError(),
    'archivo' => $_SESSION['error']->getArchivoError(),
    'linea' => $_SESSION['error']->getLineaError(),
    'paginaSiguiente' => $_SESSION['error']->getPaginaSiguiente()
];

include $aVistas['layout'];

