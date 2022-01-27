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
        <title>App AGO POO</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link href="webroot/css/footer.css" rel="stylesheet" type="text/css" />
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
       <!-- Copyright -->
            <div id="copyright">
                <p>&copy;2021 Todos los derechos reservados AroaGO----Fecha de Modificación:22/01/2022
                    <a style="padding-left:10%;" type="application/herramientas" href="#" target="_blank">
                        <img class="iconoIMG" alt="herramientas" src="./webroot/css/images/herramientas.png" width="40px" height="40px" />

                    </a>
                    <a type="application/github" href="https://github.com/aroago/208DWESProyectoFinal" target="_blank">
                        <img class="iconoIMG" alt="gitHub" src="./webroot/css/images/github.png" width="40px" height="40px" />

                    </a>
                    <a type="application/github" href="#" target="_blank">
                        <img class="iconoIMG" alt="RSS" src="./webroot/css/images/RSS.png" width="40px" height="40px" />

                    </a>
                    <a type="application/www" href="https://daw208.ieslossauces.es/" target="_blank">
                        <img class="iconoIMG" alt="www" src="./webroot/css/images/www.png" width="40px" height="40px" />

                    </a>
                    <a type="application/doc" href="./doc/index.html" target="_blank">
                        <img class="iconoIMG" alt="doc" src="./webroot/css/images/doc.png" width="40px" height="40px" />

                    </a>
                    <a type="application/cv" href="#" target="_blank">
                        <img class="iconoIMG" alt="cv" src="./webroot/css/images/cv.png" width="40px" height="40px" />

                    </a>
                    <a type="application/github" href="https://daw208.ieslossauces.es/" target="_blank">
                        <img class="iconoIMG" alt="gitHub" src="./webroot/css/images/wwwcopia.png" width="40px" height="40px" />

                    </a>
                </p>
            </div>
</html>

