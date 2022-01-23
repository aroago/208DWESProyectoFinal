<?php
/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 18/1/2022
 * Last modification: 18/1/2022
 * */
?>
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
            
            #button{
                width: 20%;
                background: rgba(6, 187, 211, 0.3);
            }

            body{
                background-color: rgba(243, 243, 243, 0.233) ;
            }
            table,tr,td{
                border: 3px solid #ABE3D8;
            }
        </style>
    </head>
    <body>
        <h3>Ha sucedido el siguiente error:</h3>
        <div>
            <table>
                <tr>
                    <th>Error</th>
                    <td><?php echo $aVError['error']; ?></td>
                </tr>
                <tr>
                    <th>Código</th>
                    <td><?php echo $aVError['codigo']; ?></td>
                </tr>
                <tr>
                    <th>Archivo</th>
                    <td><?php echo $aVError['archivo']; ?></td>
                </tr>
                <tr>
                    <th>Línea</th>
                    <td><?php echo $aVError['linea']; ?></td>
                </tr>
                <tr>
                    <th>Página </th>
                    <td><?php echo $aVError['paginaSiguiente']; ?></td>
                </tr>
            </table>
        </div>
        <form method="post">
            <button type="submit" id="button" name="volver" value="volver">Cerrar y Volver</button>
        </form>
    </body>