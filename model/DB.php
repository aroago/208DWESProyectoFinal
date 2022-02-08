<?php

/**
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 22/1/2022
 * Last modification: 22/1/2022
 */

interface DB {
    public static function ejecutarConsulta($consulta, $parametros=null);
}
