<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 10/02/2022
 * Last modification: 10/02/2022
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
            pre{
                border-radius: 5px;
                background-color: dimgray;
                padding: 5px;
                color:white;
            }
        </style>
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
            <section id="header">
                <div class="container">

                    <div class="col-12">
                        <!-- Logo -->
                        <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> INFO API REST DEPARTAMENTO</a></h1>
                        <nav id="nav">
                            <form method="post">
                                <input type="submit" name="volver" class="btnlogin" value="volver">
                            </form>
                        </nav>
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
                    <div class="col-3 col-6-medium col-12-small">
                        <h3>Enlace de la API:</h3>
                        <pre>
                                https://daw208.ieslossauces.es/208DWESProyectoFinal/api/consultaDepartamentoPorCodigo.php
                        </pre>
                        <h3>Ejemplo:</h3>
                        <pre>
                                https://daw208.ieslossauces.es/208DWESProyectoFinal/api/consultaDepartamentoPorCodigo.php?codDepartamento=INF
                        </pre>
                        <h3>Nombre del parametro que recoge</h3>
                        <pre>
                                codDepartamento
                        </pre>
                        <h3>Errores</h3>
                        <p>
                            En caso de error el valor de RespuestaOK pasa a ser false.
                        </p><br>
                        <p>
                            En vez de devolver un objeto con el departamento buscado, devuelve un mensaje de error.
                        </p>

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
