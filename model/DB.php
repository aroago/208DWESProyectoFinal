<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author daw2
 */
interface DB {
    public static function ejecutarConsulta($consulta, $parametros=null);
}
