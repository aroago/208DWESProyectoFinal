<?php

/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
 */

    if(isset($_REQUEST['volver'])){  
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>
