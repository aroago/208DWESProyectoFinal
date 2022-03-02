<?php
/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 02/03/2022
 * Last modification: 02/03/2022
 */

if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit;
}

$bEntradaOK = true;
// Variable de mensaje de error.
$aErrores = [ //Declaracion del array de errores
    'codDepartamento' => null,
    'descDepartamento' => null,
    'volumenDeNegocio' => null
];

if (isset($_REQUEST['crearDept'])) {
    $aErrores['codDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'], 3, 3, OBLIGATORIO); //Compruebo si el codigo de departamento esta bien rellenado
    $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescDepartamento'], 255, 1, OBLIGATORIO); //Compruebo si la descripcion del departamento esta bien rellenada
    $aErrores['volumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['VolumenNegocio'], 9999, 0, OBLIGATORIO); //Compruebo si el volumen de negocio esta bien rellenada
    
    $oDepartamentoValido = DepartamentoPDO::validaCodNoExiste($_REQUEST['CodDepartamento']); //Compruebo si el departamento existe con la funcion validarcodnoexiste
    if($oDepartamentoValido){ //Si me devuelve el objeto el departamento ya existe
        $aErrores['codDepartamento'] = 'El codigo ya existe.';
    } 
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
             $bEntradaOK = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
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
    
     $oDepartamentoNuevo = DepartamentoPDO::altaDepartamento($_REQUEST['CodDepartamento'], $_REQUEST['DescDepartamento'], $_REQUEST['VolumenNegocio']); //Doy de alta el nuevo departamento
    $_SESSION['paginaEnCurso'] =  $_SESSION['paginaAnterior'];

    header('Location: index.php');
    exit;
}

// Carga de la vista del registro.
require_once $aVistas['layout'];