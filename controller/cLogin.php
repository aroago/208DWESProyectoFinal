<?php
/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 11/1/2022
 * Last modification: 11/1/2022
 */
if(isset($_REQUEST['registro'])){  
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'registro';
        header('location: ./index.php');
        exit;
    }
if(isset($_REQUEST['login'])){ 
        if(validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 255, MIN_TAMANIO, OBLIGATORIO)==null && validacionFormularios::comprobarAlfaNumerico($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO)==null){
            $oUsuario = UsuarioPDO::validarUsuario($_REQUEST["usuario"], $_REQUEST["password"]);
            if($oUsuario){
                UsuarioPDO::registrarUltimaConexion($oUsuario->getCodUsuario());
                $_SESSION['usuarioDAW208LoginLogoutMulticapaPOO'] = $oUsuario;
                
                $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
                $_SESSION['paginaEnCurso'] = 'inicio';
                header('Location: index.php');
                exit;
            }
        }
    }

  
require_once $aVistas['layout'];
?> 
