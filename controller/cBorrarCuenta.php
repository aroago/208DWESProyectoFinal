<?php

if (isset($_REQUEST['no'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['si'])) {
    
    UsuarioPDO::borrarUsuario($_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']);
    $path = RUTA_IMG . $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getCodUsuario(); 
    libreriaFunciones::borrarDirectorio($path);
    
    unset($_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']);
    $_SESSION['paginaEnCurso'] = 'inicioPublica';
    header('location: ./index.php');
    exit;
}

require_once $aVistas['layout'];