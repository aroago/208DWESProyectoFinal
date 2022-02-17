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
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> Inicio Privada</a></h1>
                            <nav id="nav">
                                <img id="imagenUsuario" src="<?php print($_SESSION['usuarioDAW208ProyectoFinal']->getImagenUsuario()) ?>">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formularioInicioPrivada">
                                    <input type='submit' class="btnlogin" name='miCuenta' value='Mi Cuenta'/>
                                </form>
                            </nav>

                        </div>
                    </div>
                </div>
                <div id="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-12-medium">

                                <div class="col-3 col-6-medium col-12-small">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formularioInicioPrivada">
                                        <?php
                                        if ($_SESSION['usuarioDAW208ProyectoFinal']->getPerfil() === "administrador") {
                                            ?>
                                            <button type="submit" name="mtoUsuarios" class="btnlogin">Mantenimiento Usuarios</button>
                                            <?php
                                        } else {
                                            ?>
                                            <button type="submit" name="mtoDepartamentos" class="btnlogin">Mantenimiento Departamentos</button>
                                            <?php
                                        }
                                        ?>
                                        <input type='submit' class="btnlogin" name='detalle' value='Detalle'/>
                                        <input type='submit'class="btnlogin" name='saltarError' value='Saltar_Error'/>
                                        <input type='submit' class="btnlogin" name='rest' value='REST'/>
                                        <input class="btnlogin" type="submit" name="logout" value="logout"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features -->
            <section id="features">
                <div class="container">
                    <div class="row">

                        <?php if ($_SESSION["usuarioDAW208ProyectoFinal"]->getNumConexiones() <= 1) { ?>
                            <h1 class="mensajePrivada"><?php echo "Bienvenid@ " . $_SESSION["usuarioDAW208ProyectoFinal"]->getDescUsuario() ?></h1>
                            <h1 class="mensajePrivada"><?php echo "Esta es la primera vez que te conectas!" ?></h1>
                            <?php
                        } else {
                            ?>
                            <h1 class="mensajePrivada"><?php echo "Bienvenid@ " . $_SESSION["usuarioDAW208ProyectoFinal"]->getDescUsuario() ?></h1>
                            <h1 class="mensajePrivada"><?php echo "Es la " . $_SESSION["usuarioDAW208ProyectoFinal"]->getNumConexiones() . "ª vez que te conectas." ?></h1>
                            <h1 class="mensajePrivada"><?php echo "Tu ultima conexion fue el " . date("d/m/Y h:i:s", $_SESSION["usuarioDAW208ProyectoFinal"]->getFechaHoraUltimaConexion()) ?></h1>
                            <?php
                        }
                        ?> 

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
