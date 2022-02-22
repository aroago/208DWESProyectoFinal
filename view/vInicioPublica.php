<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 23/1/2022
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>AGO Proyecto Final</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="webroot/css/vInicioPublica.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
            <section id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Logo -->
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> Inicio Publica</a></h1>
                        </div>
                    </div>
                </div>
                <div id="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-12-medium">

                                <!-- Banner Copy -->
                                <p>Inicia Sesion En Nuestra Pagina Web</p>
                                <form method="post">
                                    <input type='submit' class="button-large" name='iniciar' value='Iniciar sesión' />
                                    <input type='submit' class="button-large" name='registro' value='Registrarse' />
                                </form>
                            </div>
                            <div class="col-6 col-12-medium imp-medium">

                                <!-- Banner Image -->
                                <a href="#" class="feature-image"><img src="./webroot/css/images/banner.jpg" alt="" /></a>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features -->
            <section id="features">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #1 -->
                            <section>
                                <a href="./webroot/pdf/CatalogoDeRequisitos.pdf" target="_blank" class="bordered-feature-image"><img src="./webroot/css/images/pic01.jpg" alt="" /></a>
                                <h2>Catalogo Requisitos</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #2 -->
                            <section>
                                <a href="./webroot/pdf/DiagramaDeCasosDeUso.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/css/images/pic02.jpg" alt="" /></a>
                                <h2>Diagrama casos de Uso</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #3 -->
                            <section>
                                <a href="./webroot/pdf/DiagramaDeClases.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/css/images/pic03.jpg" alt="" /></a>
                                <h2>Diagrama Clases</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #4 -->
                            <section>
                                <a href="./webroot/pdf/EstructuraAlmacenamiento.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/css/images/pic04.jpg" alt="" /></a>
                                <h2>Estuctura Almacenamiento</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #4 -->
                            <section>
                                <a href="./webroot/pdf/ArbolDeNavegación.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/css/images/pic051.jpg" alt="" /></a>
                                <h2>Arbol De Navegacion</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #4 -->
                            <section>
                                <a href="./webroot/pdf/RelacionDeFicheros.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/css/images/pic06.jpg" alt="" /></a>
                                <h2>Mapa Web-RelacionFicheros</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">

                            <!-- Feature #4 -->
                            <section>
                                <a href="./webroot/pdf/ModeloFisicoDeDatos20-21.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/css/images/pic07.jpg" alt="" /></a>
                                <h2>Modelo Fisico de Datos</h2>
                            </section>

                        </div>
                        <div class="col-6 col-6-medium col-12-small">
                            <!-- Feature #4 -->
                            <section>
                                <a href="./webroot/pdf/UsoDeLaSesion.pdf" class="bordered-feature-image" target="_blank"><img src="./webroot/img/usoSesion.PNG" alt="" /></a>
                                <h2>Uso De la Sesión</h2>
                            </section>

                        </div>
                        </div><div class="col-12 col-6-medium col-12-small">

                            <!-- Feature #4 -->
                            <section>
                                <a href="./webroot/img/apiInfo.PNG" class="bordered-feature-image" target="_blank"><img src="./webroot/img/apiInfo.PNG" alt="" /></a>
                                <h2>Información API REST</h2>
                            </section>

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