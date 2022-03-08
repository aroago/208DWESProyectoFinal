<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 08/03/2022
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
    'volumenNegocioDepartamento' => $oDepartamento->getVolumenDeNegocio()
];

if(isset($_REQUEST['eliminar'])){ //Si el usuario le da a eliminar
    $oDepartamentoNuevo = DepartamentoPDO::bajaFisicaDepartamento($_SESSION['codDepartamentoEnCurso']); //Elimino el departamento pasado en la sesion
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Asigno a la pagina en curso la pagina anterior
    header('Location: index.php'); //Redirecciono a mto departamentos
    exit;
}

require_once $aVistas['layout']; //Cargo la pagina de EliminarDepartamento
?>