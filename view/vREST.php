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
        <title>AGO Proyecto Final</title>
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
                            <h1><a href="index.html" id="logo">AGO Proyecto Final 2021-2022 <br>REST</a></h1>
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

                                    <input  type="search" name="buscarInput" placeholder="Código Provincia" value="<?php
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
                                        if ($aErrores["eResultado"] != null) { //Compruebo que el array de errores no está vacío.
                                            echo $aErrores["eResultado"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                            
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
                        <div class="col-3b col-6-medium col-12-small">
                            <?php if ($aErrores["eBuscarInput"] == null && isset($_REQUEST["buscarInput"]) && $oResultadoProv != null) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.?>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Resultado:</span> <?php print_r($oResultadoProv); //Devuelve el campo que ha escrito previamente el usuario.
                                ?>
                                    <br>
                                    <span class="tituloRest"> Provincia:</span> <?php
                                    echo $oResultadoProv->getProvincia(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest">ID Provincia:</span> <?php
                                    echo $oResultadoProv->getIdProvincia(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Descripcion:</span><?php
                                echo $oResultadoProv->getDescripcion() //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Tiempo:</span><?php
                                echo $oResultadoProv->getTiempo(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>

                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> MAX:</span><?php
                                echo$oResultadoProv->getTemperaturaMax(); //Devuelve el campo que ha escrito previamente el usuario.
                                ?>
                                    <span class="tituloRest"> MIN:</span><?php
                                    echo $oResultadoProv->getTemperaturaMin(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <?php } ?>
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


