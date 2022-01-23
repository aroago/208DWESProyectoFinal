<?php

if (!isset($_SESSION['usuarioDAW208LoginLogoutMulticapaPOO'])) {
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['logout'])) {
    session_destroy();
    include $aControladores['login'];
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'detalle';

    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['mtoDep'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'WIP';

    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['saltarError'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $sentenciaSQL = 'SELECT * FROM XXX;';
    DBPDO::ejecutarConsulta($sentenciaSQL);
}
include $aVistas['layout'];
?>

