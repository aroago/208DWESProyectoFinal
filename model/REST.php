<?php

include 'Provincia.php';

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 31/1/2022
 * Last modification: 31/1/2022
 */

class REST {

    /**
     * Funcion para recoger el error de respuesta de http.
     * 
     * @param String $url
     * @return  Array con las cabeceras enviadas por el servidor en respuesta a una petición HTTP.
     */
    public static function get_http_response_code($url) {                       //Declaro una funcion para recoger el error de respuesta de http
        $aHeaders = get_headers($url);                                          //get_header devuelve un array con las respuestas a una petición HTTP.Lo guardo en la variable headers
        return substr($aHeaders[0], 9, 3);                                      //substr devuelve una cadena, entonces quiero que recorra la posicion 0 del array aheaders 
    }

    /**
     * Funcion que devuelve los datos de la API en formato JSON
     * 
     * @param type $url url del servidor al que le vamos a solicitar la informacion
     * @param type $parametros el codigo de la provincia a buscar
     * @return String con el contenido del fichero en formato JSON
     */
    function obtenerDatosCrudos($url, $parametros) {

        $sResultado = false;

        if (self::get_http_response_code($url . $parametros) == "200") {
            $sResultado = file_get_contents($url . $parametros);
        }

        return $sResultado;
    }
/**
 * Funcion que devuelve un objeto provincia con los datos devueltos por la API.
 * 
 * @param Int $codProvincia
 * @return \Provincia
 */
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

    /**
     * Uso de la API REST  de Google Books mediante el protocolo HTML para 
     * consultar libros introduciendo un título como parámetro.
     * 
     * @param String $sTitulo Título por el que hay que buscar un libro
     * @return Array Un array formado de objetos Libro
     */
    public static function buscarLibrosPorTitulo($sTitulo) {
        $resultadoAPI = @file_get_contents("https://www.googleapis.com/books/v1/volumes?q=" . $sTitulo);
        $aLibros = [];
        $aResultadoAPI = json_decode($resultadoAPI, true);
        if ($aResultadoAPI) {
            foreach ($aResultadoAPI['items'] as $item) {
                array_push($aLibros, new Libro(
                                $item['volumeInfo']['title'],
                                $item['volumeInfo']['authors'] ?? "Autor desconocido",
                                $item['volumeInfo']['publisher'] ?? "Editorial desconocida",
                                $item['volumeInfo']['publishedDate'] ?? "Año desconocido",
                                $item['volumeInfo']['pageCount'] ?? "¿?",
                                $item['volumeInfo']['imageLinks']['thumbnail'] ?? "webroot/img/nodisponible.jpg",
                                $item['volumeInfo']['infoLink']));
            }
        }
        return $aLibros;
    }

}
