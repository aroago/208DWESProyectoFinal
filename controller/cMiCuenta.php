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
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'borrarCuenta';
    header('location: ./index.php');
    exit;
}

if (isset($_REQUEST['cambiarPassword'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'cambiarPassword';
    header('location: ./index.php');
    exit;
}
$bEntradaOK = true;
$bImagenIntroducida = false;
// Variable de mensaje de error.
$aErrores = ['DescUsuario' => null, //Creo un array de errores y lo inicializo a null con los campos correspondientes.
    'imagen' => null];

$aVMiCuenta = [
    'CodUsuario' => $_SESSION['usuarioDAW208ProyectoFinal']->getCodUsuario(),
    'DescUsuario' => $_SESSION['usuarioDAW208ProyectoFinal']->getDescUsuario(),
    'numConexiones' => $_SESSION['usuarioDAW208ProyectoFinal']->getNumConexiones(),
    'fechaHoraUltimaConexion' => date('d/m/Y H:i:s e', $_SESSION['usuarioDAW208ProyectoFinal']->getFechaHoraUltimaConexion()),
    'password' => $_SESSION['usuarioDAW208ProyectoFinal']->getPassword(),
    'imagen'=> $_SESSION['usuarioDAW208ProyectoFinal']->getImagenUsuario()
];


if (isset($_REQUEST['btnMiCuenta'])) {

    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO);
    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['archivo']['name'];
    //Si el archivo contiene algo y es diferente de vacio
    if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            $aErrores['imagen'] = 'Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.';
        } else {
            $bImagenIntroducida = true;
        }
        foreach ($aErrores as $campo => $error) { //Recorro cada campo del array de errores.
            if ($error != null) { //Si hay algún error.
                $bEntradaOK = false;
                $_REQUEST[$campo] = ""; //Le muestro al usuario el campo vacío.
            }
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

    if ($bImagenIntroducida) {
        $path = RUTA_IMG . $_SESSION['usuarioDAW208ProyectoFinal']->getCodUsuario();
        $rutaArchivo = $path . "/" . $archivo;

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (move_uploaded_file($temp, $rutaArchivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod($rutaArchivo, 0777);
        }
    } else {
        $rutaArchivo = $aVMiCuenta["imagen"];
    }


    $aVMiCuenta['DescUsuario'] = $_REQUEST['DescUsuario'];
    //Si la imagen es correcta en tamaño y tipo
    //Se intenta subir al servidor


    $oUsuario = UsuarioPDO::modificarUsuario($_SESSION['usuarioDAW208ProyectoFinal'], $aVMiCuenta['DescUsuario'], $rutaArchivo);


    $_SESSION['usuarioDAW208ProyectoFinal'] = $oUsuario;


    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicio';

    header('Location: index.php');
    exit;
}

// Carga de la vista del registro.
require_once $aVistas['layout'];
?>