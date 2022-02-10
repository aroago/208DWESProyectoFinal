<?php

if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('location: ./index.php');
    exit;
}

include $aVistas['layout'];