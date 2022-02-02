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
            <style>
                html{
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
                                <h1>AGO Proyecto Final 2021-2022 <br> Detalle</h1>
                                <nav id="nav">
                                    <form>
                                        <input type="submit" value="volver" name="volver" class="btnlogin"/>
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

                <section id="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-3 col-6-medium col-12-small">
                                <h1 style='color:black'>Mostrar el contenido de las variables superglobales</h1>

                                <table>
                                    <thead>
                                        <tr>
                                            <th style="color:black">Clave</th>
                                            <th style="color:black">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($_SESSION as $clave => $valor) {
                                            echo "<tr style='color:black'><td>";
                                            echo $clave;
                                            echo "</td><td style='color:black'>";
                                            echo print_r($valor);
                                            echo "</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
// El contenido de $_COOKIE
                                echo '<h3>Mostrar el contenido de $_COOKIE :</h3>  ';
                                echo '<table><tr style="color:black"><th>Clave</th><th style="color:black">Valor</th></th>';
                                foreach ($_COOKIE as $Clave => $Valor) {
                                    echo '<tr>';
                                    echo "<td style='color:black'>$Clave</td>";
                                    echo "<td style='color:black'>$Valor</td>";
                                    echo '</tr>';
                                }
                                echo '</table>';

                                echo '<h3>Mostrar el contenido de $_SERVER :</h3>  ';
                                echo '<table><tr><th style="color:black">Clave</th><th style="color:black">Valor</th></th>';
                                /* usando foreach() */
                                foreach ($_SERVER as $Clave => $Valor) {
                                    echo '<tr>';
                                    echo "<td style='color:black'>$Clave</td>";
                                    echo "<td style='color:black'>$Valor</td>";
                                    echo '</tr>';
                                }
                                echo '</table>';

                                phpinfo();
        ?>
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

