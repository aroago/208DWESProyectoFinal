<?php

/**
 * Conexión de departamentos con la base de datos mediante PDO.
 * 
 * Funciones de conexión con la base de datos para modificación de departamentos.
 * 
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 03/02/2022
 * Last modification: 03/02/2022
 */
class DepartamentoPDO {

    /**
     * Búsqueda de departamento por código.
     * 
     * Busca en la base de datos el departamento con el código dado.
     * 
     * @param String $codDepartamento Código del departamento a buscar.
     * @return Departamento|false Devuelve el objeto Departamento si lo encuentra,
     * o false en caso contrario.
     */
    public static function buscaDepartamentoPorCod($codDepartamento) {
        $sSelect = <<<QUERY
                     SELECT * FROM T02_Departamento WHERE T02_CodDepartamento = '{$codDepartamento}';
                    QUERY;

        $oResultado = DBPDO::ejecutarConsulta($sSelect);
        $oResultado = $oResultado->fetchObject();
        if ($oResultado) {
            return new Departamento(
                    $oResultado->T02_CodDepartamento,
                    $oResultado->T02_DescDepartamento,
                    $oResultado->T02_FechaCreacionDepartamento,
                    $oResultado->T02_VolumenDeNegocio);
        } else {
            return false;
        }
    }

    /**
     * Búsqueda de un departamento introduciendo la descripción como
     * parámetro
     * 
     * @param String $descripcionDepartamento Descripción del departamento
     * a buscar.
     * @param Int $tipoBusqueda 0 para buscar entre todos los departamentos; 1 para buscar los que
     * están de alta; 2 para buscar los que están de baja.
     * @return PDOStatement Resultado del insert.
     */
    public static function buscaDepartamentosPorDesc($descripcionDepartamento, $tipoBusqueda=0){
            
            switch($tipoBusqueda){
                case 0: $sQueryTipoBusqueda='';
                    break;
                case 1: $sQueryTipoBusqueda='AND T02_FechaBajaDepartamento IS NULL';
                    break;
                case 2: $sQueryTipoBusqueda='AND T02_FechaBajaDepartamento IS NOT NULL';
                    break;
            }
            /*
             * Query de selección de departamento según su descripción
             */
            $sSelect = <<<QUERY
                SELECT * FROM T02_Departamento
                WHERE T02_DescDepartamento LIKE '%{$descripcionDepartamento}%' {$sQueryTipoBusqueda};
            QUERY;

            return DBPDO::ejecutarConsulta($sSelect);
        }

}
