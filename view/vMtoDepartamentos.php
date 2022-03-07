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
                                <form action="index.php" method="post">
                                    <button class="btnlogin" name="altaDepartamento">Añadir departamento</button>
                                    <button class="btnlogin" name="importarDepartamentos">Importar departamentos</button>
                                    <button class="btnlogin" name="exportarDepartamentos">Exportar departamentos</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Features -->
            <section id="features">
                <div class="container">
                    <div class="row">
                        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="departamentosFormulario" class="form">
                            <div class="col-6 col-6-medium col-12-small">

                                <label for="descDepartamento">Buscar por descripcion de departamento</label>
                                <input name="descDepartamento" id="descDepartamento" type="text" value="<?php echo $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? ''; ?>" placeholder="Introduzca la descripcion">
                                <input class="btnlogin" id="buscar" type="submit" name="buscar" value="Buscar"/>
                                <p class="mensajeErrorDepartamento"><?php echo $aErrores['descBuscarDepartamento'] ?></p>
                            </div>
                            <div style="display: flex;" >
                                <p style="margin-left: 44px;color: black;font-size: x-large;">Estado:</p>
                                <input name="estado" id="tipoDepartamentoTodos" type="radio" value="todos" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_TODOS ? 'checked' : '') : 'checked'; ?>/>
                                <label for="tipoDepartamentoTodos"><a class="rFiltrarDepartamento" style="color:black">Todos</a></label>
                                <input name="estado" id="tipoDepartamentoAltas" type="radio" value="altas" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_ALTAS ? 'checked' : '') : ''; ?> />
                                <label for="tipoDepartamentoAltas"><a class="rFiltrarDepartamento" style="color:black">Altas</a></label>
                                <input name="estado" id="tipoDepartamentoBajas" type="radio" value="bajas" <?php echo isset($_SESSION['criterioBusquedaDepartamentos']['estado']) ? ($_SESSION['criterioBusquedaDepartamentos']['estado'] == ESTADO_BAJAS ? 'checked' : '') : ''; ?> />
                                <label for="tipoDepartamentoBajas"><a class="rFiltrarDepartamento" style="color:black">Bajas</a></label>
                            </div>

                        </form>
                        <table class="tablaDepartamentos">
                            <?php
                            if ($aDepartamentosVista != null) {
                                ?>
                                <tr id="theadMtoDep">
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Fecha de alta</th>
                                    <th>Volumen de negocio</th>
                                    <th>Fecha de baja</th>
                                    <th>Acciones</th>
                                </tr>
                                <?php
                            }
                            if ($aDepartamentosVista) {
                                foreach ($aDepartamentosVista as $aDepartamento) {
                                    ?>
                                    <tr>
                                        <td><?php echo $aDepartamento['codDepartamento']; ?></td>
                                        <td><?php echo $aDepartamento['descDepartamento']; ?></td>
                                        <td><?php echo $aDepartamento['fechaAlta']; ?></td>
                                        <td><?php echo $aDepartamento['volumenNegocio']; ?></td>
                                        <td><?php echo $aDepartamento['fechaBaja']; ?></td>
                                        <td class="botonestabla">
                                            <button type="submit" form="departamentosFormulario" name="modificar" value="<?php echo $aDepartamento['codDepartamento']; ?>" class="imagenboton">
                                                <img src="./webroot/img/editar.png" class="imagenboton" alt="Lapiz" />
                                            </button>
                                            <img src="./webroot/img/ojo.png" class="imagenboton" alt="Ojo" />
                                            <img src="./webroot/img/eliminar.png" class="imagenboton" alt="Papelera" />
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                        <?php
                        if ($aDepartamentosVista != null) {
                            ?>
                            <div class = "paginacion">
                                <button type = "submit" form = "departamentosFormulario" name = "paginaPrimera" value = "paginaPrimera" class = "botonespaginado">
                                    | &#60;
                                </button>
                                <button type = "submit" form = "departamentosFormulario" name = "paginaAnterior" value = "paginaAnterior" class = "botonespaginado">
                                    &#60;
                                </button>
                                <?php echo $_SESSION['numPaginacionDepartamentos'];
                                ?> / <?php echo ceil($iDepartamentosTotales); ?>
                                <button type="submit" form="departamentosFormulario" name="paginaSiguiente" value="paginaSiguiente" class="botonespaginado">
                                    &#62;
                                </button>
                                <button type="submit" form="departamentosFormulario" name="paginaUltima" value="paginaUltima" class="botonespaginado">
                                    &#62; |
                                </button>
                            </div>
                        <?php }
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