<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 22/1/2022
 * Last modification: 22/1/2022
 */
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('location: ./index.php');
    exit;
}

 $bEntradaOK = true;
// Variable de mensaje de error.
$aErrores = ['CodUsuario' => null, //Creo un array de errores y lo inicializo a null con los campos correspondientes.
    'DescUsuario' => null,
    'Password' => null,
    'ConfirmarPassword' => null];
/*
 * Si se selecciona crear usuario, valida la entrada y comprueba que el usuario
 * no exista ya en la base de datos.
 */
if(isset($_REQUEST['aceptarRegistro'])) {
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 255, 3, OBLIGATORIO);
    
    if($aErrores['CodUsuario']==null && UsuarioPDO::validarCodNoExiste($_REQUEST['CodUsuario'])==false){ 
        
        $aErrores['CodUsuario']="El nombre de usuario ya existe";
    }
    
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO);
    
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);
    $aErrores['ConfirmarPassword'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);
    if($_REQUEST['Password'] != $_REQUEST['ConfirmarPassword']){
        $aErrores['ConfirmarPassword'] = "Las contraseñas no coinciden";
    }
    
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
    
    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['CodUsuario'], $_REQUEST['Password'], $_REQUEST['DescUsuario']);

  
    // Almacenamiento del usuario y la fecha-hora de última conexión.
    unset($_SESSION['usuarioDAW208LoginLogoutMulticapaPOO']);
    $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO'] = $oUsuario;

    $_SESSION['paginaEnCurso'] = 'inicio';
     
    header('Location: index.php');
    exit;
}

// Carga de la vista del registro.
require_once $aVistas['layout'];
