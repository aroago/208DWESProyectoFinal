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
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> Mi Cuenta</a></h1>
                            <nav id="nav">
                                <form method="post">
                                    <input type="submit" name="cancelar" class="btnlogin" value="volver">
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
                                    <h3>Usuario: </h3>
                                    <input  type="text" name="CodUsuario" value="<?php echo $aVMiCuenta['CodUsuario'] ?>" disabled/>
                                    <br>

                                    <h3>Descripción de usuario: </h3>
                                    <input  type="text" name="DescUsuario" value="<?php
                                    echo $aVMiCuenta['DescUsuario'];
                                    ?>">
                                    <span style="color:red">
                                        <?php
                                        if ($aErrores["DescUsuario"] != null) { //Compruebo que el array de errores no está vacío.
                                            echo $aErrores["DescUsuario"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                        }
                                        ?>
                                    </span>

                                    <br>

                                    <h3>Fecha y Hora Ultima Conexion: </h3>
                                    <input  type="fechaHoraUltimaConexion" name="fechaHoraUltimaConexion" value="<?php echo $aVMiCuenta['fechaHoraUltimaConexion'] ?>" disabled/>

                                    <br>

                                    <h3>Contraseña: </h3>
                                    <input  type="password" name="cambiarPassword" value="<?php echo $aVMiCuenta['password'] ?>" disabled/>
                                    <input type="submit" name="cambiarPassword" class="btnlogin" value="Cambiar Contraseña">
                                    <br>

                                    <h3>Imagen: </h3>
                                    <input name="archivo" id="archivo" type="file"/>
                                    <br>

                                    <input type="submit" name="btnMiCuenta" class="btnlogin" value="ACEPTAR">
                                    <input style="background: rgba(255, 3, 3, 0.3);" type="submit" name="borrarCuenta" class="btnlogin" value="Eliminar Cuenta">
                                </form>
                                <!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
                                <img id="imagenPrevisualizacion" src="<?php echo $aVMiCuenta["imagen"];?>">
                                <script src="./webroot/js/imagenUsuariojs.js"></script>
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
