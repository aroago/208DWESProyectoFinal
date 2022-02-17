<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 17/2/2022
 * Last modification: 17/2/2022
 */
  if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>
