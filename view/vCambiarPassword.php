<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 26/1/2022
 * Last modification: 26/1/2022
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
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> Cambiar Password</a></h1>
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
                            <div id="containerRegistro">
                                <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

                                    <h3>Contraseña: </h3>
                                    <input  type="password" name="passwordActual" />
                                    <br>
                                    <span style="color:red">
                                        <?php echo $aErrores["passwordActual"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                        ?>
                                    </span>
                                    <h3>Nueva Contraseña: </h3>
                                    <input  type="password" name="passwordNueva" />
                                    <br>
                                    <span style="color:red">
                                        <?php echo $aErrores["passwordNueva"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                        ?>
                                    </span>
                                    <h3>Repite Contraseña: </h3>
                                    <input  type="password" name="passwordRepeticion" />
                                    <br>
                                    <span style="color:red">
                                        <?php
                                            echo $aErrores["passwordRepeticion"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                          ?>
                                    </span>
                                    <input type="submit" name="cambiar" class="btnlogin" value="Cambiar Password">
                                    <input style="background: rgba(255, 3, 3, 0.3);" type="submit" name="Cancelar" class="btnlogin" value="Cancelar">
                                </form>
                            </div>
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

