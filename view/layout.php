<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 10/1/2022
 * Last modification: 10/1/2022
 * Contiene el head con el estilo básico, título y metas. También footer.
 */
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="aroaGraneroOmañas">
        <meta name="application-name" content="Sitio web de DAW2">
        <meta name="description" content="Inicio de la pagina web">
        <meta name="keywords" content=" index" >
        <meta name="robots" content="index, follow" />
        <title>App Login-Logout POO</title>
        <link rel="shortcut icon" href="favicon.ico">
        <style>
		 html { 
  background: url("../img/fondogato.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}
       
            .imgFooter{
                width: 40px;
                height: 40px;
            }
        </style>
        
    </head>
    <body>
        <?php require_once $aVistas[$_SESSION['paginaEnCurso']]; //Requiere la vista indicada en el controlador correspondiente. ?>
      
</html>

