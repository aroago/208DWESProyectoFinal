<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 24/1/2022
 * Last modification: 24/1/2022
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>AGO Proyecto Final</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="webroot/css/loginRegistro.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Header -->
            <section id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Logo -->
                            <h1><a href="index.php" id="logo">AGO Proyecto Final 2021-2022 <br>REST</a></h1>
                            <nav id="nav">
                                <form method="post">
                                    <input type="submit" name="volver" class="btnlogin" value="volver">
                                </form>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">

                                <form method="post">
                                    <legend>Tiempo En Las Provincias <a href="https://www.el-tiempo.net/api" target="_blank"><i class="bi bi-info-circle-fill"></i></a></legend>
                                    <div style="with:50%;height: 30%;border:solid 2px #000; word-break:break-all;background: rgba(0, 0, 0, 0.486);padding: 20px 0px 0px 20px;margin-bottom: 5px">
                                        <p style=" text-align: justify;font-size: 18px; font-weight: 50;">Este es un servicio web ligero el cual provee los datos e información del Tiempo en España.
                                            Los datos de esta aplicación hacen uso del servicio web de la Agencia Estatal de Meteorología - AEMET.
                                            Gobierno de España, que autoriza el uso de la información y reproducción citando a © AEMET como autora de la misma.</p>
                                    </div> 
                                    <p style=" text-align: justify;font-size: 20px; font-weight: 50;"><a target="_blank" href="https://www.ine.es/daco/daco42/codmun/cod_provincia.htm" style="color:white; font-weight: 100;">Consulta los codigos de las provincias</a></p>
                                    <select required name="buscarInput" class="form-control">
                                        <option value="">Elige Provincia</option>
                                        <option value="01">Álava/Araba</option>
                                        <option value="02">Albacete</option>
                                        <option value="03">Alicante</option>
                                        <option value="04">Almería</option>
                                        <option value="33">Asturias</option>
                                        <option value="05">Ávila</option>
                                        <option value="06">Badajoz</option>
                                        <option value="08">Barcelona</option>
                                        <option value="09">Burgos</option>
                                        <option value="48">Bizkaia</option>
                                        <option value="10">Cáceres</option>
                                        <option value="11">Cádiz</option>
                                        <option value="12">Castellón</option>
                                        <option value="39">Cantabria</option>
                                        <option value="13">Ciudad Real</option>
                                        <option value="14">Córdoba</option>
                                        <option value="51">Ceuta</option>
                                        <option value="16">Cuenca</option>
                                        <option value="17">Gerona/Girona</option>
                                        <option value="18">Granada</option>
                                        <option value="19">Guadalajara</option>
                                        <option value="20">Guipúzcoa/Gipuzkoa</option>
                                        <option value="21">Huelva</option>
                                        <option value="22">Huesca</option>
                                        <option value="23">Jaén</option>
                                        <option value="15">La Coruña/A Coruña</option>
                                        <option value="26">La Rioja</option>
                                        <option value="35">Las Palmas</option>
                                        <option value="24">León</option>
                                        <option value="25">Lérida/Lleida</option>
                                        <option value="27">Lugo</option>
                                        <option value="28">Madrid</option>
                                        <option value="29">Málaga</option>
                                        <option value="52">Melilla</option>
                                        <option value="30">Murcia</option>
                                        <option value="31">Navarra</option>
                                        <option value="32">Orense/Ourense</option>
                                        <option value="34">Palencia</option>
                                        <option value="36">Pontevedra</option>
                                        <option value="37">Salamanca</option>
                                        <option value="40">Segovia</option>
                                        <option value="41">Sevilla</option>
                                        <option value="42">Soria</option>
                                        <option value="43">Tarragona</option>
                                        <option value="38">Tenerife</option>
                                        <option value="44">Teruel</option>
                                        <option value="45">Toledo</option>
                                        <option value="46">Valencia</option>
                                        <option value="47">Valladolid</option>
                                        <option value="51">Vizcaya/Bizkaia</option>
                                        <option value="49">Zamora</option>
                                        <option value="50">Zaragoza</option>
                                    </select>
                                    <input type="submit" class="btnlogin" name="buscarSubmit"/>
                                    <br>
                                    <span style="color:red">
                                        <?php
                                        if ($aErrores["eBuscarInput"] != null) { //Compruebo que el array de errores no está vacío.
                                            echo $aErrores["eBuscarInput"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                        }
                                        if ($aErrores["eResultado"] != null) { //Compruebo que el array de errores no está vacío.
                                            echo $aErrores["eResultado"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                        }
                                        ?>
                                    </span>
                                </form>
                            </div>

                        </div>
                    </div>
            </section>

            <!-- Features -->
            <section id="features">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <?php if ($aErrores["eBuscarInput"] == null && isset($_REQUEST["buscarInput"]) && $oResultadoProv != null) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar. ?>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Resultado:</span> <?php print_r($oResultadoProv); //Devuelve el campo que ha escrito previamente el usuario.
                                ?>
                                    <br>
                                    <span class="tituloRest"> Provincia:</span> <?php
                                    echo $nombreProvincia; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest">ID Provincia:</span> <?php
                                    echo $idProvincia; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Descripcion:</span><?php
                                    echo $descripcionProvincia; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Tiempo:</span><?php
                                    echo $tiempoProvincia; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>

                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> MAX:</span><?php
                                    echo $temmaximaProvincia; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                    <span class="tituloRest"> MIN:</span><?php
                                    echo $temminimaProvincia; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                            <?php } ?>
                        </div>
                        <div id="banner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="index.php" method="post">
                                            <legend>Busqueda de Departamentos <a href="#" target="_blank"><i class="bi bi-info-circle-fill"></i></a></legend>
                                            <div style="with:50%;height: 30%;border:solid 2px #000; word-break:break-all;background: rgba(0, 0, 0, 0.486);padding: 20px 0px 0px 20px;margin-bottom: 5px">
                                                <p style=" text-align: justify;font-size: 18px; font-weight: 50;">Servicio web que sirve para consultar los datos de un Departamento 
                                                    de esta base de datos a través de su codigo.</p>
                                            </div>    
                                            <select required name="buscarInputPropio" class="form-control">
                                                <option value="">Elige Un Departamento</option>
                                                <option value="INF">Informatica</option>
                                                <option value="LEN">Lengua</option>
                                                <option value="MUS">Musica</option>
                                                <option value="BIO">Biologia</option>
                                                <option value="ING">Ingles</option>
                                            </select>
                                            <input type="submit" class="btnlogin" name="buscarPropio"/>
                                            <br>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!--resultado-->
                            <?php if ($aErrores["eBuscarPropio"] == null && isset($_REQUEST["buscarInputPropio"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar. ?>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> CodDepartamento:</span> <?php
                                    echo $codDepartamento; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest">Descripcion Departamento:</span> <?php
                                    echo $descDepartamento; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Volumen Departamento:</span><?php
                                    echo $volumenDeNegocio; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Fecha Creacion Departamento:</span><?php
                                    echo $fechaCreacionDepartamento; //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>

                                </h1>

                            <?php } ?>
                        </div>
                        <div id="banner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="index.php" method="post">
                                            <legend>Busqueda de Libros <a href="https://developers.google.com/books/docs/v1/getting_started" target="_blank"><i class="bi bi-info-circle-fill"></i></a></legend>
                                            <div style="with:50%;height: 30%;border:solid 2px #000; word-break:break-all;background: rgba(0, 0, 0, 0.486);padding: 20px 0px 0px 20px;margin-bottom: 5px">
                                                <p style=" text-align: justify;font-size: 18px; font-weight: 50;">Servicio web que sirve para consultar un libro. No necesariamente busca por título, pero es su prioridad. 
                                                    (p. ej. si buscas un autor primero mostrará libros en cuyo título esté su nombre). Puede buscar los carácteres 
                                                    introducidos en cualquier campo de su base de datos de libros.</p>
                                            </div>    
                                            <input name="busquedaLibro" type="text" placeholder="Buscar Libro" value="<?php echo $_REQUEST['busquedaLibro'] ?? "" ?>">
                                            <input type="submit" class="btnlogin" name="buscarLibros"/>
                                            <br>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="resultado">
                                <?php
                                if (isset($aVistaREST)) {
                                    foreach ($aVistaREST as $libro) {
                                        ?>
                                        <div class="libro">
                                            <div class="imagen">
                                                <img src="<?php echo $libro['imagen']; ?>">
                                            </div>
                                            <div class="titulo">
                                                <h1 class="mensajeRest">
                                                    <span class="tituloRest"><?php echo $libro['titulo'] . ", (" . $libro['anyoEdicion'] . ")"; ?></span>
                                                </h1>
                                                <p>
                                                    <?php
                                                    ?>
                                                </p>
                                                <h1 class="mensajeRest">
                                                    <span class="tituloRest"><?php echo $libro['editorial']; ?></span>
                                                </h1>
                                                <h1 class="mensajeRest">
                                                    <span class="tituloRest"><?php echo $libro['paginas']; ?> páginas</span>
                                                    <a style="color: black" href="<?php echo $libro['link']; ?>">Ver en Google Books &#62;&#62;</a>
                                                </h1>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>


    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>


