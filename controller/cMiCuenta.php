<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 26/1/2022
 * Last modification: 26/1/2022
 */
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
     $_SESSION['paginaEnCurso'] = 'inicio';
    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['borrarCuenta'])) {
    $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'borrarCuenta';
    header('location: ./index.php');
    exit;
}
if (isset($_REQUEST['cambiarPassword'])) {
    $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'cambiarPassword';
    header('location: ./index.php');
    exit;
}
 $bEntradaOK = true;
// Variable de mensaje de error.
$aErrores = ['DescUsuario' => null, //Creo un array de errores y lo inicializo a null con los campos correspondientes.
    'imagen' => null];

$aVMiCuenta = [
    'CodUsuario' => $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getCodUsuario(),
    'DescUsuario' => $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getDescUsuario(),
    'numConexiones' => $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getNumConexiones(),
    'fechaHoraUltimaConexion' => date('d/m/Y H:i:s e', $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getFechaHoraUltimaConexion()),
    'password' => $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']->getPassword()
];


if(isset($_REQUEST['btnMiCuenta'])) {
  
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO);
    
    
    foreach ($aErrores as $campo => $error) { //Recorro cada campo del array de errores.
        if ($error != null) { //Si hay algún error.
            $bEntradaOK = false;
            $_REQUEST[$campo] = ""; //Le muestro al usuario el campo vacío.
        }
    }
}
/*
 * Si no se ha enviado el formulario, pone el manejador a false.
 */ else {
    $bEntradaOK = false;
}
/*
 * Si la entrada es correcta, se conecta con la base de datos para crear el usuario,
 * iniciar sesión y enviar a la página de inicio.
 */
if ($bEntradaOK) {
    
    $aVMiCuenta['DescUsuario'] = $_REQUEST['DescUsuario'];
    
    $oUsuario = UsuarioPDO::modificarUsuario($aVMiCuenta['CodUsuario'], $aVMiCuenta['DescUsuario']);

  
    $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO'] = $oUsuario;
    
    
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicio';
     
    header('Location: index.php');
    exit;
}

// Carga de la vista del registro.
require_once $aVistas['layout'];
