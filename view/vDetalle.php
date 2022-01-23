<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="aroaGraneroOmañas">
        <meta name="application-name" content="Sitio web de DAW2">
        <meta name="description" content="Inicio de la pagina web">
        <meta name="keywords" content=" index" >
        <meta name="robots" content="index, follow" />
        <title>Detalle</title>
        <link rel="shortcut icon" href="favicon.ico">
        <style>
            .button{
                width: 20%;
                background: rgba(6, 187, 211, 0.3);
            }

            body{
                background-color: black;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * @author: Aroa Granero Omañas
         * @version: v1
         * Created on: 11/1/2022
         * Last modification: 11/1/2022
         */
        ?>
        <header>
            <h1>Detalle  LoginLogout</h1>
        </header>
        <form>
            <input type="submit" value="volver" name="volver" class="button"/>
        </form>
        <h1>Mostrar el contenido de las variables superglobales</h1>

        <table>
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION as $clave => $valor) {
                    echo "<tr><td>";
                    echo $clave;
                    echo "</td><td>";
                    echo print_r($valor);
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
// El contenido de $_COOKIE
        echo '<h3>Mostrar el contenido de $_COOKIE :</h3>  ';
        echo '<table><tr><th>Clave</th><th>Valor</th></th>';
        foreach ($_COOKIE as $Clave => $Valor) {
            echo '<tr>';
            echo "<td>$Clave</td>";
            echo "<td>$Valor</td>";
            echo '</tr>';
        }
        echo '</table>';

        echo '<h3>Mostrar el contenido de $_SERVER :</h3>  ';
        echo '<table><tr><th>Clave</th><th>Valor</th></th>';
        /* usando foreach() */
        foreach ($_SERVER as $Clave => $Valor) {
            echo '<tr>';
            echo "<td>$Clave</td>";
            echo "<td>$Valor</td>";
            echo '</tr>';
        }
        echo '</table>';

        phpinfo();
        ?>



