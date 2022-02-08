<?php
/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 18/1/2022
 * Last modification: 18/1/2022
 * */
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
                            <h1><a href="index.html" id="logo">AGO Proyecto Final 2021-2022 <br> Ventana Error</a></h1>

                            <nav id="nav">
                                <form method="post">
                                    <button type="submit" class="btnlogin" name="volver" value="volver">Cerrar y Volver</button>
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
                            <h3>Ha sucedido el siguiente error:</h3>
                            <table>
                                <tr>
                                    <th>Error</th>
                                    <td><?php echo $aVError['error']; ?></td>
                                </tr>
                                <tr>
                                    <th>Código</th>
                                    <td><?php echo $aVError['codigo']; ?></td>
                                </tr>
                                <tr>
                                    <th>Archivo</th>
                                    <td><?php echo $aVError['archivo']; ?></td>
                                </tr>
                                <tr>
                                    <th>Línea</th>
                                    <td><?php echo $aVError['linea']; ?></td>
                                </tr>
                                <tr>
                                    <th>Página </th>
                                    <td><?php echo $aVError['paginaSiguiente']; ?></td>
                                </tr>
                            </table>
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