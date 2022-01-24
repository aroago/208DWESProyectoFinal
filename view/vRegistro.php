<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
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
                            <h1><a href="index.html" id="logo">LoginLogOut Proyecto Final 2021-2022 <br> Registro</a></h1>
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
                                    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                        <h3>Usuario: </h3>
                                        <input  type="text" name="CodUsuario" value="<?php
                                        if ($aErrores["CodUsuario"] == null && isset($_REQUEST["CodUsuario"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                            echo $_REQUEST["CodUsuario"]; //Devuelve el campo que ha escrito previamente el usuario.
                                        }
                                        ?>">
                                        <span style="color:red">
                                            <?php
                                            if ($aErrores["CodUsuario"] != null) { //Compruebo que el array de errores no está vacío.
                                                echo $aErrores["CodUsuario"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                            }
                                            ?>
                                        </span>

                                        <br>

                                        <h3>Descripción de usuario: </h3>
                                        <input  type="text" name="DescUsuario" value="<?php
                                        if ($aErrores["DescUsuario"] == null && isset($_REQUEST["DescUsuario"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                            echo $_REQUEST["DescUsuario"]; //Devuelve el campo que ha escrito previamente el usuario.
                                        }
                                        ?>">
                                        <span style="color:red">
                                            <?php
                                            if ($aErrores["DescUsuario"] != null) { //Compruebo que el array de errores no está vacío.
                                                echo $aErrores["DescUsuario"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                            }
                                            ?>
                                        </span>

                                        <br>

                                        <h3>Contraseña: </h3>
                                        <input  type="password" name="Password" value="<?php
                                        if ($aErrores["Password"] == null && isset($_REQUEST["Password"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                            echo $_REQUEST["Password"]; //Devuelve el campo que ha escrito previamente el usuario.
                                        }
                                        ?>">
                                        <span style="color:red">
                                            <?php
                                            if ($aErrores["Password"] != null) { //Compruebo que el array de errores no está vacío.
                                                echo $aErrores["Password"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                            }
                                            ?>
                                        </span>

                                        <br>

                                        <h3>Confirmar contraseña: </h3>
                                        <input  type="password" name="ConfirmarPassword" value="<?php
                                        if ($aErrores["ConfirmarPassword"] == null && isset($_REQUEST["ConfirmarPassword"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                            echo $_REQUEST["ConfirmarPassword"]; //Devuelve el campo que ha escrito previamente el usuario.
                                        }
                                        ?>">
                                        <span style="color:red">
                                            <?php
                                            if ($aErrores["ConfirmarPassword"] != null) { //Compruebo que el array de errores no está vacío.
                                                echo $aErrores["ConfirmarPassword"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                            }
                                            ?>
                                        </span>

                                        <br>

                                        <input type="submit" name="aceptarRegistro" class="btnlogin" value="ACEPTAR">
                                        <input style="background: rgba(255, 3, 3, 0.3);" type="submit" name="cancelar" class="btnlogin" value="CANCELAR">
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