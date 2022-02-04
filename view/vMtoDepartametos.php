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
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> MtoDepartamentos</a></h1>
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
                            <form name="formulario" action="mtoDepartamentos.php" method="post">
                                <fieldset>
                                    <legend>Editar Departamento</legend>
                                    <table>
                                        <tr>
                                            <td><label for="CodDepartamento">Código Departamento:</label></td>
                                            <td><input id="CodDepartamento" type="text" name="CodDepartamento" value="<?php echo (isset($_REQUEST['CodDepartamento'])) ? $_REQUEST['CodDepartamento'] : ""; ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for="DescDepartamento">Descripción:</label></td>
                                            <td><input id="DescDepartamento" type="text" name="DescDepartamento"  value="<?php echo (isset($_REQUEST['DescDepartamento'])) ? $_REQUEST['DescDepartamento'] : ""; ?>" ></td>
                                            <td> <?php
                                                if (!is_null($aErrores['DescDepartamento'])) { //compruebo si ha introducido mal el nombre
                                                    echo "<span>" . $aErrores['DescDepartamento'] . "</span>"; // muestro el error en el nombre
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="FechaBaja">Fecha de baja:</label></td>
                                            <td><input id="FechaBaja" type="text" name="FechaBaja"  value="<?php echo (isset($_REQUEST['FechaBaja'])) ? $_REQUEST['FechaBaja'] : ""; ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td><label for="VolumenNegocio">Volumen de negocio:</label></td>
                                            <td><input id="VolumenNegocio" type="text" name="VolumenNegocio" value="<?php echo (isset($_REQUEST['VolumenNegocio'])) ? $_REQUEST['VolumenNegocio'] : ""; ?>" ></td>
                                            <td> <?php
                                                if (!is_null($aErrores['VolumenNegocio'])) { //compruebo si ha introducido mal el nombre
                                                    echo "<span>" . $aErrores['VolumenNegocio'] . "</span>"; // muestro el error en el nombre
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                    </table>
                                    <input id="Editar" type="button" name="Editar" value="Editar">
                                    <input id="Cancelar" type="button" name="Cancelar" value="Cancelar">

                                </fieldset>
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