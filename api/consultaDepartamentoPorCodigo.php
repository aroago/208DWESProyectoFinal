<?php
/**
 * Devuelve dado un codDepartamento un JSON con el resultado del departamento.
 * 
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 03/02/2022
 * Last modification: 03/02/2022
 */
//http://daw208.sauces.local/208DWESProyectoFinal/api/consultaDepartamentoPorCodigo.php?codDepartamento=INF
    require_once '../config/configDB.php';   
    require_once '../model/DB.php';
    require_once '../model/DBPDO.php';
    require_once '../model/Departamento.php';
    require_once '../model/DepartamentoPDO.php';

    
    $bRespuestaOK=true;
    if(isset($_GET['codDepartamento'])){
        $oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_GET['codDepartamento']);
        if($oDepartamento){
            $aRespuesta=[
                "departamento"=>[
                    "codDepartamento" => $oDepartamento->getCodDepartamento(),
                    "descDepartamento" => $oDepartamento->getDescDepartamento(),
                    "fechaCreacionDepartamento" => $oDepartamento->getFechaCreacionDepartamento(),
                    "volumenDeNegocio" => $oDepartamento->getVolumenDeNegocio(),
                    "fechaBajaDepartamento" => $oDepartamento->getFechaBajaDepartamento()
                ]
            ];
        }
        else{
            $bRespuestaOK=false;
            $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "error"=>"Departamento no encontrado"
            ];
        }
        
    }
    else{
        $bRespuestaOK=false;
        $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "error"=>"Ha habido un problema con la API"
            ];
    }
    echo json_encode($aRespuesta);