<?php

if (isset($_REQUEST['no'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['si'])) {
    
    UsuarioPDO::borrarUsuario($_SESSION['usuarioDAW208ProyectoFinal']);
    $path = RUTA_IMG . $_SESSION['usuarioDAW208ProyectoFinal']->getCodUsuario(); 
    libreriaFunciones::borrarDirectorio($path);
    
    unset($_SESSION['usuarioDAW208ProyectoFinal']);
    $_SESSION['paginaEnCurso'] = 'inicioPublica';
    header('location: ./index.php');
    exit;
}

require_once $aVistas['layout'];