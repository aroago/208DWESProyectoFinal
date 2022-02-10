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
     * Funcion que devuelve un objeto provincia con los datos devueltos por la API. 
     * En caso de que el servidor de error devuelve null.
     * 
     * 
     * @param Int $codProvincia
     * @return \Provincia
     */
    public static function provincia($codProvincia) {
        $urlConcreta='https://www.el-tiempo.net/api/json/v2/provincias/'. $codProvincia;
        $oProvincia = null;
        $sResultadoRawData = false;
        $aHeaders = get_headers( $urlConcreta);   //get_header devuelve un array con las respuestas a una petición HTTP.Lo guardo en la variable headers
        $numHeaders = substr($aHeaders[0], 9, 3);      //substr devuelve una cadena, entonces quiero que recorra la posicion 0 del array aheaders
        if ($numHeaders == "200") {
            $sResultadoRawData = file_get_contents( $urlConcreta);
        }
        
        if ($sResultadoRawData) {//si el servidor no ha dado fallo
            $aJson = json_decode($sResultadoRawData, true); //decodificamos el json y lo devolvemos en un array

            $oProvincia = new Provincia($aJson['title'],
                    $aJson['ciudades']['0']['idProvince'],
                    $aJson['ciudades']['0']['stateSky']['description'],
                    $aJson['today']['p'],
                    $aJson['ciudades']['0']['temperatures']['max'],
                    $aJson['ciudades']['0']['temperatures']['min']
            );
        }

        return $oProvincia;//si ha dado error devuelce null.
    }

    /**
     * Uso de la API REST  de Google Books mediante el protocolo HTML para 
     * consultar libros introduciendo un título como parámetro.
     * 
     * @param String $sTitulo Título por el que hay que buscar un libro
     * @return Array Un array formado de objetos Libro
     */
    public static function buscarLibrosPorTitulo($sTitulo) {
       $resultadoAPI=@file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$sTitulo);
            $aLibros=[];
            $aResultadoAPI=json_decode($resultadoAPI,true);
            if(isset($aResultadoAPI['error'])){
                return $aResultadoAPI['error']['message'];
            }
            if($aResultadoAPI['totalItems']>0){
                 foreach($aResultadoAPI['items'] as $item){
                 array_push($aLibros, new Libro(
                     $item['volumeInfo']['title'],
                     $item['volumeInfo']['authors']??"Autor desconocido", 
                     $item['volumeInfo']['publisher']??"Editorial desconocida",
                     $item['volumeInfo']['publishedDate']??"Año desconocido", 
                     $item['volumeInfo']['pageCount']??"¿?", 
                     $item['volumeInfo']['imageLinks']['thumbnail']??"webroot/img/nodisponible.jpg", 
                     $item['volumeInfo']['infoLink'])); 
                 }
                 return $aLibros;
             }
             else{
                 return false;
             } 
            
        }
        /**
     * Funcion que devuelve un objeto provincia con los datos devueltos por la API. 
     * En caso de que el servidor de error devuelve null.
     * 
     * 
     * @param Int $codDepartamento
     * @return \Departamento
     */
    public static function buscarDepartamento($codDepartamento) {
         $sResultadoRawData = file_get_contents("https://daw208.ieslossauces.es/208DWESProyectoFinal/api/consultaDepartamentoPorCodigo.php?codDepartamento=$codDepartamento");
         $aJson = json_decode($sResultadoRawData, true); //decodificamos el json y lo devolvemos en un array
        
        if ($aJson['respuestaOK']) {//si el servidor no ha dado fallo
            $oDepartamento = new Departamento($aJson['departamento']['codDepartamento'],
                    $aJson['departamento']['descDepartamento'],
                    $aJson['departamento']['fechaCreacionDepartamento'],
                    $aJson['departamento']['volumenDeNegocio']
            );
            
             return $oDepartamento;//si ha dado error devuelce null.
        }else{
            
             return $aJson['error'];
        }

       
    }

}
