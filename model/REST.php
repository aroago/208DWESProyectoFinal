<?php

include 'Provincia.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of REST
 *
 * @author aroag
 */
class REST {

    public static function get_http_response_code($url) {                       //Declaro una funcion para recoger el error de respuesta de http
        $aHeaders = get_headers($url);                                          //get_header devuelve un array con las respuestas a una petición HTTP.Lo guardo en la variable headers
        return substr($aHeaders[0], 9, 3);                                      //substr devuelve una cadena, entonces quiero que recorra la posicion 0 del array aheaders 
    }

    function obtenerDatosCrudos($url, $parametros) {

        $sResultado = false;

        if (self::get_http_response_code($url . $parametros) == "200") {
            $sResultado = file_get_contents($url . $parametros);
        }

        return $sResultado;
    }

    function provincia($codProvincia) {

        $oProvincia = null;

        $sResultadoRawData = self::obtenerDatosCrudos('https://www.el-tiempo.net/api/json/v2/provincias/', $codProvincia);

        if ($sResultadoRawData) {
            $aJson = json_decode($sResultadoRawData, true); //decodificamos el json y lo devolvemos en un array

            $oProvincia = new Provincia($aJson['title'],
                    $aJson['ciudades']['0']['idProvince'],
                    $aJson['ciudades']['0']['stateSky']['description'],
                    $aJson['today']['p'],
                    $aJson['ciudades']['0']['temperatures']['max'],
                    $aJson['ciudades']['0']['temperatures']['min']
            );
        }

        return $oProvincia;
    }

}
