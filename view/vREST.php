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
                            <h1><a href="index.html" id="logo">AGO Proyecto Final 2021-2022 <br>REST</a></h1>
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
                                    <input  type="search" name="buscarInput" placeholder="Código Provincia" value="<?php
                                    if ($aErrores["eBuscarInput"] == null && isset($_REQUEST["buscarInput"])) { //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                        echo $_REQUEST["buscarInput"]; //Devuelve el campo que ha escrito previamente el usuario.
                                    }
                                    ?>">
                                    <select required name="provincia" class="form-control">
                                        <option value="">Elige Provincia</option>
                                        <option value="Álava/Araba">Álava/Araba</option>
                                        <option value="Albacete">Albacete</option>
                                        <option value="Alicante">Alicante</option>
                                        <option value="Almería">Almería</option>
                                        <option value="Asturias">Asturias</option>
                                        <option value="Ávila">Ávila</option>
                                        <option value="Badajoz">Badajoz</option>
                                        <option value="Baleares">Baleares</option>
                                        <option value="Barcelona">Barcelona</option>
                                        <option value="Burgos">Burgos</option>
                                        <option value="Cáceres">Cáceres</option>
                                        <option value="Cádiz">Cádiz</option>
                                        <option value="Cantabria">Cantabria</option>
                                        <option value="Castellón">Castellón</option>
                                        <option value="Ceuta">Ceuta</option>
                                        <option value="Ciudad Real">Ciudad Real</option>
                                        <option value="Córdoba">Córdoba</option>
                                        <option value="Cuenca">Cuenca</option>
                                        <option value="Gerona/Girona">Gerona/Girona</option>
                                        <option value="Granada">Granada</option>
                                        <option value="Guadalajara">Guadalajara</option>
                                        <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                        <option value="Huelva">Huelva</option>
                                        <option value="Huesca">Huesca</option>
                                        <option value="Jaén">Jaén</option>
                                        <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                        <option value="La Rioja">La Rioja</option>
                                        <option value="Las Palmas">Las Palmas</option>
                                        <option value="León">León</option>
                                        <option value="Lérida/Lleida">Lérida/Lleida</option>
                                        <option value="Lugo">Lugo</option>
                                        <option value="Madrid">Madrid</option>
                                        <option value="Málaga">Málaga</option>
                                        <option value="Melilla">Melilla</option>
                                        <option value="Murcia">Murcia</option>
                                        <option value="Navarra">Navarra</option>
                                        <option value="Orense/Ourense">Orense/Ourense</option>
                                        <option value="Palencia">Palencia</option>
                                        <option value="Pontevedra">Pontevedra</option>
                                        <option value="Salamanca">Salamanca</option>
                                        <option value="Segovia">Segovia</option>
                                        <option value="Sevilla">Sevilla</option>
                                        <option value="Soria">Soria</option>
                                        <option value="Tarragona">Tarragona</option>
                                        <option value="Tenerife">Tenerife</option>
                                        <option value="Teruel">Teruel</option>
                                        <option value="Toledo">Toledo</option>
                                        <option value="Valencia">Valencia</option>
                                        <option value="Valladolid">Valladolid</option>
                                        <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                                        <option value="Zamora">Zamora</option>
                                        <option value="Zaragoza">Zaragoza</option>
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
                                    echo $oResultadoProv->getProvincia(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest">ID Provincia:</span> <?php
                                    echo $oResultadoProv->getIdProvincia(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Descripcion:</span><?php
                                    echo $oResultadoProv->getDescripcion() //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> Tiempo:</span><?php
                                    echo $oResultadoProv->getTiempo(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>

                                </h1>
                                <h1 class="mensajeRest">
                                    <span class="tituloRest"> MAX:</span><?php
                                    echo $oResultadoProv->getTemperaturaMax(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                    <span class="tituloRest"> MIN:</span><?php
                                    echo $oResultadoProv->getTemperaturaMin(); //Devuelve el campo que ha escrito previamente el usuario.
                                    ?>
                                </h1>
                            <?php } ?>
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


