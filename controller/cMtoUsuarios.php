<?php

if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaAnterior'] =  $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicio";
    
    header('location: ./index.php');
    exit;
}


include $aVistas['layout'];
