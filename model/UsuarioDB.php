<?php

/**
 * 
 * @author Aroa Granero Omañas
 * Fecha Creacion:  12/01/2022
 * Última modificación: 12/01/2022
 */
interface UsuarioDB {

    public static function validarUsuario($codUsuario, $password);
}
