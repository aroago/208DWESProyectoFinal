<?php
/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 26/1/2022
 * Last modification: 26/1/2022
 */
if (!isset($_SESSION['usuarioDAW208ProyectoFinal'])) {
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
if (isset($_REQUEST['rest'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'rest';

    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['miCuenta'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'miCuenta';

    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['mtoDepartamentos'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
    $_SESSION['numPaginacionDepartamentos'] = 1; //Asigno la pagina de departamentos a 1 para que sea la primera
    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['mtoUsuarios'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'mtoUsuarios';

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

