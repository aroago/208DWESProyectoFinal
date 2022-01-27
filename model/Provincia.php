<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provincia
 *
 * @author aroag
 */
class Provincia {

    private $provincia;
    private $idProvincia;
    private $descripcion;
    private $tiempo;
    private $temperaturaMax;
    private $temperaturaMin;

    function __construct($provincia, $idProvincia, $descripcion, $tiempo, $temperaturaMax, $temperaturaMin) {
        $this->provincia = $provincia;
        $this->idProvincia = $idProvincia;
        $this->descripcion = $descripcion;
        $this->tiempo = $tiempo;
        $this->temperaturaMax = $temperaturaMax;
        $this->temperaturaMin = $temperaturaMin;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getIdProvincia() {
        return $this->idProvincia;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function getTemperaturaMax() {
        return $this->temperaturaMax;
    }

    function getTemperaturaMin() {
        return $this->temperaturaMin;
    }

}
