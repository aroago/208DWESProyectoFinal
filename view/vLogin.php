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
            .aaa{
                width: 246px;
                border-radius: 5px;
                background: rgba(3,3,3,0.6);
                box-shadow: 1px 1px 50px #000;
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
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br> Login</a></h1>
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
                <div class="container aaa">
                        <div class="col-3 col-6-medium col-12-small">
                            <form method="Post" style="width: 110%;">
                                <input type="text" name="usuario" id="username"  placeholder="username">
                                <input type="password" name="password" id="password" placeholder="password">
                                <input type="submit" style="width: 110px; margin-top: 23px;" name="login" class="btnlogin" value="ENTRAR">
                                <input type="submit" style="width: 110px; margin-top: 23px;" name="registro" class="btnlogin" value="REGISTRATE">
                            </form>
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
