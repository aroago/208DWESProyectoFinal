<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 21/12/2021
 * Last modification: 18/1/2022
 **/
ob_start();
//Constantes de la aplicación.
require_once './config/configApp.php';

//Se inicia o recupera la sesión
session_start();

//Para mostrar la ventana del login, llama al controlador del mismo.
if(!isset($_SESSION['paginaEnCurso'])){
    $_SESSION['paginaEnCurso'] = 'inicioPublica';
}
// Cargado de la página indicada.
require_once $aControladores[$_SESSION['paginaEnCurso']];

