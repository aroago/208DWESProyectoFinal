<?php

/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 10/1/2022
 * Last modification: 11/1/2022
 */
class Usuario{
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $fechaHoraUltimaConexion;
        private $numConexiones;
        private $perfil;
        private $imagenUsuario;
        
        function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil, $imagenUsuario) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numConexiones = $numConexiones;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
            $this->perfil = $perfil;
            $this->imagenUsuario = $imagenUsuario;
        }

        function getCodUsuario(){
            return $this->codUsuario;
        }
        function getPassword(){
            return $this->password;
        }
        function getDescUsuario(){
            return $this->descUsuario;
        }
        function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        function getNumConexiones(){
            return $this->numConexiones;
        }
        function getPerfil(){
            return $this->perfil;
        }
        function getImagenUsuario(){
            return $this->imagenUsuario;
        }
        function setCodUsuario($codUsuario){
           $this->codUsuario=$codUsuario; 
        }
        function setPassword($password){
            $this->password=$password;
        }
        function setDescUsuario($descUsuario){
            $this->descUsuario=$descUsuario;
        }
        function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
        }
        function setNumConexiones($numConexiones){
            $this->numConexiones=$numConexiones;
        }
        function setPerfil($perfil){
            $this->perfil=$perfil;
        }
        function setImagenUsuario($imagenUsuario){
            $this->imagenUsuario=$imagenUsuario;
        }
    }
?>
