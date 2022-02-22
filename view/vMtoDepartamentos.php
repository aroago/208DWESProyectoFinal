<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 22/2/2022
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
                            <div class="menu">
                                <button class="btnlogin" name="altaDepartamento">Añadir departamento</button>
                                <button class="btnlogin" name="importarDepartamentos">Importar departamentos</button>
                                <button class="btnlogin" name="exportarDepartamentos">Exportar departamentos</button>
                                <br>
                                <input name="busquedaDesc" type="text" placeholder="Buscar por descripción..." value="<?php echo $_REQUEST['busquedaDesc'] ?? "" ?>">                     
                                <button class="boton" name="buscar">Buscar</button>
                                <input id="busquedaTodos" name="tipoCriterio" type="radio" value="0" <?php echo (!isset($_SESSION['criterioBusquedaDepartamentos']['estado']) || $_SESSION['criterioBusquedaDepartamentos']['estado'] == 0) ? "checked" : "" ?>>
                                <label for="busquedaTodos">Todos</label>
                                <input id="busquedaAlta" name="tipoCriterio" type="radio" value="1" <?php echo (isset($_SESSION['criterioBusquedaDepartamentos']['estado']) && $_SESSION['criterioBusquedaDepartamentos']['estado'] == 1) ? "checked" : "" ?>>
                                <label for="busquedaAlta">Alta</label>
                                <input id="busquedaBaja" name="tipoCriterio" type="radio" value="2"<?php echo (isset($_SESSION['criterioBusquedaDepartamentos']['estado']) && $_SESSION['criterioBusquedaDepartamentos']['estado'] == 2) ? "checked" : "" ?>>
                                <label for="busquedaBaja">Baja</label>
                            </div>
                            <table class="tablaDepartamentos">
                                <tr>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Fecha de creación</th>
                                    <th>Volumen de negocio</th>
                                    <th>Fecha de baja</th>
                                    <th>Editar</th>
                                    <th>Baja</th>
                                    <th>Eliminar</th>
                                </tr>
                                <?php
                                foreach ($aDepartamentos as $departamento) {
                                    ?>
                                    <tr class="<?php echo (empty($departamento['T02_FechaBajaDepartamento'])) ? "activo" : "baja" ?>">
                                        <td class="codigo"><?php echo $departamento['T02_CodDepartamento'] ?></td>
                                        <td><?php echo $departamento['T02_DescDepartamento'] ?></td>
                                        <td><?php echo date("d/m/Y", $departamento['T02_FechaCreacionDepartamento']) ?></td>
                                        <td><?php echo $departamento['T02_VolumenDeNegocio'] ?> €</td>
                                        <td><?php echo!empty($departamento['T02_FechaBajaDepartamento']) ? date("d/m/Y", $departamento['T02_FechaBajaDepartamento']) : "" ?></td>
                                        <td><button class="boton" name="editarDepartamento" value="<?php echo $departamento['T02_CodDepartamento'] ?>"><img src="webroot/img/editar.png"></button></td>
                                        <?php
                                        if (empty($departamento['T02_FechaBajaDepartamento'])) {
                                            ?>
                                            <td><button class="boton" name="bajaLogica" value="<?php echo $departamento['T02_CodDepartamento'] ?>"><img src="webroot/img/baja.png"></button></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><button class="boton" name="rehabilitar"  value="<?php echo $departamento['T02_CodDepartamento'] ?>"><img src="webroot/img/alta.png"></button></td>
                                            <?php
                                        }
                                        ?>
                                        <td><button class="boton" name="bajaFisica"  value="<?php echo $departamento['T02_CodDepartamento'] ?>"><img src="webroot/img/eliminar.png"></button></td>
                                    </tr>    
                                    <?php
                                }
                                ?>
                            </table>
                            <div class="paginacion">
                                <button class="boton" name="primeraPagina" <?php echo ($_SESSION['numPaginacionDepartamentos'] === 1) ? "disabled" : "" ?>>| &#60;</button>
                                <button class="boton" name="paginaAnterior" <?php echo ($_SESSION['numPaginacionDepartamentos'] === 1) ? "disabled" : "" ?>>&#60;</button>
                                <span><?php echo $_SESSION['numPaginacionDepartamentos'] . "/" . $_SESSION['numPaginas'] ?></span>
                                <button class="boton" name="paginaSiguiente" <?php echo ($_SESSION['numPaginacionDepartamentos'] === $_SESSION['numPaginas']) ? "disabled" : "" ?>>&#62;</button>
                                <button class="boton" name="ultimaPagina" <?php echo ($_SESSION['numPaginacionDepartamentos'] === $_SESSION['numPaginas']) ? "disabled" : "" ?>>&#62; |</button>
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