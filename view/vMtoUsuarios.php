<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 20/1/2022
 * Last modification: 20/2/2022
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
            .fotoPerfil{
                width: 40px;
               height: 40px;
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
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> MtoUsuarios</a></h1>
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
                        <form action="index.php" method="post">
                            <div id="divBuscar" class="menu">
                                <label for="descUsuario">Buscar por descripcion de usuario</label>
                                <input name="descUsuario" id="descUsuario" class="descUsuarioBuscar" type="text" placeholder="Introduzca la descripcion">
                              <button type="button" id="buscar" name="buscar" class="btnlogin">Buscar</button>
                            </div>
                        </form>
                        <div id="container">
                            <table id="tablausuarios" class="tablaDepartamentos">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Conexiones</th>
                                    <th>Ultima Conexion</th>
                                    <th>Perfil</th>
                                    <th>Imagen</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- Scripts -->
        <script src="webroot/js/mtoUsuarios.js"></script>

    </body>
</html>
