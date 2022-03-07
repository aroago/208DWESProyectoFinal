<?php

/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
 */
require_once "core/libreriaValidacion.php";
require_once "core/libreriaFunciones.php";

include 'model/DB.php';
include 'model/UsuarioDB.php';
include 'model/DBPDO.php';
include 'model/Usuario.php';
include 'model/UsuarioPDO.php';
include 'model/AppError.php';
require_once 'model/Libro.php';
include 'model/Departamento.php';
include 'model/DepartamentoPDO.php';

//Definir constantes
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);
define("MIN_TAMANIO", 0);
define("RUTA_IMG", "webroot/img/imagenUsuarios/");

define("ESTADO_TODOS", 0);
define("ESTADO_ALTAS", 1);
define("ESTADO_BAJAS", 2);
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
    'registro' => 'controller/cRegistro.php',
    'rest' => 'controller/cREST.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'cambiarPassword' => 'controller/cCambiarPassword.php',
    'mtoDepartamentos' => 'controller/cMtoDepartamentos.php',
    'infoAPI' => 'controller/cInfoApiPropia.php',
    'tecnologias' => 'controller/cTecnologias.php',
    'mtoUsuarios' => 'controller/cMtoUsuarios.php',
    'altaDepartamento' => 'controller/cAltaDepartamento.php',
    'consultarModificarDepartamentos' => 'controller/cConsultarModificarDepartamentos'
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
    'registro' => 'view/vRegistro.php',
    'rest' => 'view/vREST.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'cambiarPassword' => 'view/vCambiarPassword.php',
    'mtoDepartamentos' => 'view/vMtoDepartamentos.php',
    'infoAPI' => 'view/vInfoApiPropia.php',
    'tecnologias' => 'view/vTecnologias.php',
    'mtoUsuarios' => 'view/vMtoUsuarios.php',
    'altaDepartamento' => 'view/vAltaDepartamento.php',
    'consultarModificarDepartamentos' => 'view/vConsultarModificarDepartamentos'
];
?>

