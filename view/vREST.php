<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 24/1/2022
 * Last modification: 24/1/2022
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>LoginLogOut Proyecto Final</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="webroot/css/loginRegistro.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
            <section id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Logo -->
                            <h1><a href="index.html" id="logo">LoginLogOut Proyecto Final 2021-2022 <br>REST</a></h1>
                            <nav id="nav">
                                <form method="post">
                                    <input type="submit" name="volver" class="btnlogin" value="volver">
                                </form>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-12-medium">
                                <form method="post">
                                    
                                    <input  type="search" name="buscarInput" placeholder="Nombre Ciudad" value="<?php
                                        if ($aErrores["eBuscarInput"] == null && isset($_REQUEST["buscarInput"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                            echo $_REQUEST["buscarInput"]; //Devuelve el campo que ha escrito previamente el usuario.
                                        }
                                        ?>">
                                        
                                    <input type="submit" class="btnlogin" name="buscarSubmit"/>
                                    <br>
                                    <span style="color:red">
                                            <?php
                                            if ($aErrores["eBuscarInput"] != null) { //Compruebo que el array de errores no está vacío.
                                                echo $aErrores["eBuscarInput"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                            }
                                            ?>
                                        </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features -->
            <section id="features">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-6-medium col-12-small">
                            <h1 class="mensajeRest">
                                <span class="tituloRest"> Provincia:</span> <?php print($_SESSION['APIrest']['nameProvince']); ?>
                            </h1>
                            <h1 class="mensajeRest">
                                <span class="tituloRest">ID Provincia:</span> <?php print($_SESSION['APIrest']['idProvince']); ?>
                            </h1>
                            <h1 class="mensajeRest">
                                <span class="tituloRest"> Descripcion:</span> <?php print($_SESSION['APIrest']['stateSky']['description']); ?>
                            </h1>
                            <h1 class="mensajeRest">
                                <span class="tituloRest"> Temperaturas:</span>

                            </h1>
                            <h1 class="mensajeRest">
                                <span class="tituloRest"> MAX:</span><?php print($_SESSION['APIrest']['temperatures']['max']); ?>
                                <span class="tituloRest"> MIN:</span><?php print($_SESSION['APIrest']['temperatures']['min']); ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>


