<?php

/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
 */
require_once "core/libreriaValidacion.php";

include 'model/DB.php';
include 'model/UsuarioDB.php';
include 'model/DBPDO.php';
include 'model/Usuario.php';
include 'model/UsuarioPDO.php';
include 'model/AppError.php';

//Definir constantes
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);
define("MIN_TAMANIO", 0);
define("RUTA_IMG", "webroot/img/imagenUsuarios/");
//Conexion con la base de datos.
include 'config/configDB.php';

//Array de los controladores
$aControladores = [
    'inicioPublica' => 'controller/cInicioPublica.php',
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicioPrivada.php',
    'detalle' => 'controller/cDetalle.php',
    'WIP' => 'controller/cWIP.php',
    'error' => 'controller/cError.php',
    'registro' => 'controller/cRegistro.php'
];

//Array de las vistas
$aVistas = [
    'inicioPublica' => 'view/vInicioPublica.php',
    'layout' => 'view/layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicioPrivada.php',
    'detalle' => 'view/vDetalle.php',
    'WIP' => 'view/vWIP.php',
    'error' => 'view/vError.php',
    'registro'=> 'view/vRegistro.php'
];
?>

