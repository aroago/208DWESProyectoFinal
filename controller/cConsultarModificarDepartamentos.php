<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 07/03/2022
 * Last modification: 08/03/2022
 */

if(isset($_REQUEST['volver'])){ //Si el usuario pulsa el boton de cancelar, mando al usuario a la pagina de mto departamentos
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina anterior
    header('Location: index.php'); //Redireciono de nuevo a mto departamentos
    exit;
}

$oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']); //Ejecuto la consulta que busca un departamento por el codigo que tiene la sesion

$aDepartamento = [ //Guardo los datos del departamento en un array para mostrarlos
    'codDepartamento' => $oDepartamento->getCodDepartamento(),
    'descDepartamento' => $oDepartamento->getDescDepartamento(),
    'fechaCreacionDepartamento' => $oDepartamento->getFechaCreacionDepartamento(),
    'volumenNegocio' => $oDepartamento->getVolumenDeNegocio()
];

$aErrores = [ //Declaracion del array de errores
    'descDepartamento' => null,
    'volumenDeNegocio' => null
];

$entradaOK = true; //Declaro entradaok a verdadero

if(isset($_REQUEST['modificar'])){ //Si el usuario le da a modificar
    $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescDepartamento'], 255, 1, OBLIGATORIO); //Compruebo si la descripcion del departamento esta bien rellenada
    $aErrores['volumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['VolumenNegocio'], 9999, 0, OBLIGATORIO); //Compruebo si el volumen de negocio esta bien rellenada
    
    //Comprobar si algun campo del array de errores ha sido rellenado
    foreach ($aErrores as $campo => $error) {//recorro el array errores
        if ($error != null) {//Compruebo si hay algun error
            $entradaOK = false;//Le doy el valor false a entradaOK
            $_REQUEST[$campo] = '';//Limpio el campo del formulario
        }
    }
}else{ //Si el usuario no le ha dado al boton de modificar
   $entradaOK = false; 
}

if($entradaOK){//Si la entrada es correcta
    DepartamentoPDO::modificaDepartamento($_SESSION['codDepartamentoEnCurso'], $_REQUEST['DescDepartamento'], $_REQUEST['VolumenNegocio']); //Modifico el departamento de la sesion
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina anterior
    header('Location: index.php'); //Redirecciono a mto departamentos
    exit;
}

require_once $aVistas['layout']; //Cargo la pagina de ConsultaModificarDepartamento
