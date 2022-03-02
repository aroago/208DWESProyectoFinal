<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 02/03/2022
 * Last modification: 02/03/2022
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>AGO Proyecto Final</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="webroot/css/loginRegistro.css" rel="stylesheet" type="text/css" />
        <style>
            .rFiltrarDepartamento{
                color:black;
            }
        </style>
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
            <section id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Logo -->
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> Alta Departamentos</a></h1>
                            <nav id="nav">
                                <form method="post">
                                    <button class="btnlogin" name="volver">Volver</button>
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
                        <div id="containerRegistro">
                            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                
                                <h3>CodDepartamento: </h3>
                              <input name="CodDepartamento" id="CodUsuarioReg" type="text" value="<?php echo isset($_REQUEST['CodDepartamento']) ? $_REQUEST['CodDepartamento'] : null; ?>" 
                               placeholder="Introduzca el código">
                                <span style="color:red">
                                    <?php
                                    if ($aErrores['codDepartamento'] != null) { //Compruebo que el array de errores no está vacío.
                                       echo $aErrores['codDepartamento']; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                    }
                                    ?>
                                </span>

                                <br>
                                <h3>Descripcion Departamento: </h3>
                               <input name="DescDepartamento" id="CodUsuarioReg" type="text" value="<?php echo isset($_REQUEST['DescDepartamento']) ? $_REQUEST['DescDepartamento'] : null; ?>" 
                               placeholder="Introduzca la descripción">
                                <span style="color:red">
                                    <?php
                                    if ($aErrores['descDepartamento'] != null) { //Compruebo que el array de errores no está vacío.
                                       echo $aErrores['descDepartamento']; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                    }
                                    ?>
                                </span>

                                <br>

                                <h3>Volumen de Negocio: </h3>
                               <input name="VolumenNegocio" id="CodUsuarioReg" type="text" value="<?php echo isset($_REQUEST['VolumenNegocio']) ? $_REQUEST['VolumenNegocio'] : null; ?>" 
                               placeholder="Introduzca el volumen de negocio">
                                <span style="color:red">
                                    <?php
                                    if ($aErrores['volumenDeNegocio'] != null) { //Compruebo que el array de errores no está vacío.
                                        echo $aErrores['volumenDeNegocio']; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                    }
                                    ?>
                                </span>
                               <br>
                               <input type="submit" style="width: 47%;margin-top: 30px;" name="crearDept" class="btnlogin" value="ACEPTAR">
                                <input style="background: rgba(255, 3, 3, 0.3); width: 47%" type="submit" name="volver" class="btnlogin" value="CANCELAR">
                            </form>
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