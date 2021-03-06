<?php

/*
 * @author: Aroa Granero Omañas
 * @version: v1
 * Created on: 10/1/2022
 * Last modification: 10/1/2022
 */

class UsuarioPDO implements UsuarioDB {

    /**
     * Comprobación de la existencia previa de un usuario y de si su contraseña es correcta en la base de datos.
     * 
     * @param type $codUsuario codigo de usuario a comprobar
     * @param type $password Contrasenya del usuario a comprobar
     * @return \Usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        $consulta = <<<PDO
                 SELECT * FROM T01_Usuario
            WHERE T01_CodUsuario='{$codUsuario}' AND
            T01_Password=SHA2("{$codUsuario}{$password}", 256);
            PDO;

        $oResultado = DBPDO::ejecutarConsulta($consulta);
        $oUsuario = $oResultado->fetchObject();

        if (!$oUsuario) {
            return false;
        } else {
            return new Usuario($oUsuario->T01_CodUsuario, $oUsuario->T01_Password, $oUsuario->T01_DescUsuario, $oUsuario->T01_NumConexiones, $oUsuario->T01_FechaHoraUltimaConexion, null, $oUsuario->T01_Perfil, $oUsuario->T01_ImagenUsuario);
        }
    }

    /**
     * Dado un código de usuario, comprueba que no exista ya en la base de datos.
     * @param type $codUsuario cosigo del usuario a comprobar.
     * @return boolean devuelve true o false segun si existe o no previamente.
     */
    public static function validarCodNoExiste($codUsuario) {
        $usuarioNoExiste = true;

        $consulta = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codUsuario]);

        if ($resultado->rowCount() > 0) {
            $usuarioNoExiste = false;
        }

        return $usuarioNoExiste;
    }

    /**
     * Insercion y registro de un usuario en la base de datos
     * 
     * @param type $codUsuario codigo del usuario a registrar
     * @param type $password contraseña del usuario que se va a registrar
     * @param type $descripcion una descripcion breve del usuario
     * @return \Usuario
     */
    public static function altaUsuario($codUsuario, $password, $descripcion) {
        $oUsuario = null;

        $consulta = "Insert into T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password , T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)";
        $passwordEncriptado = hash("sha256", ($codUsuario . $password));
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codUsuario, $descripcion, $passwordEncriptado, time()]);

        if ($resultado->rowCount() > 0) {
            $oUsuario = self::validarUsuario($codUsuario, $password);
        }
        return $oUsuario;
    }

    public static function modificarUsuario($oUsuario, $descUsuario, $imagenUsuario) {
        $codUsuario = $oUsuario->getCodUsuario();
        $sUpdate = <<<QUERY
            UPDATE T01_Usuario SET T01_DescUsuario = "{$descUsuario}",
            T01_ImagenUsuario = '{$imagenUsuario}'
            WHERE T01_CodUsuario = "{$codUsuario}";
        QUERY;

        $oUsuario->setDescUsuario($descUsuario);
        $oUsuario->setImagenUsuario($imagenUsuario);

        if (DBPDO::ejecutarConsulta($sUpdate)) {
            return $oUsuario;
        } else {
            return false;
        }
    }

    /**
     * Cambio de contraseña.
     * 
     * Modifica la contraseña del usuario indicado en la base de datos y en el
     * objeto antes de devolverlo.
     * 
     * @param Usuario $usuario Usuario a modificar.
     * @param String $password Nueva contraseña del usuario.
     * @return Usuario|false Devuelve el objeto usuario modificado si todo es correcto,
     * o false en caso contrario.
     */
    public static function cambiarPassword($usuario, $password) {
        $sUpdate = <<<QUERY
            UPDATE T01_Usuario SET T01_Password = SHA2("{$usuario->getCodUsuario()}{$password}", 256)
            WHERE T01_CodUsuario = "{$usuario->getCodUsuario()}";
        QUERY;

        $usuario->setPassword($descUsuario);

        if (DBPDO::ejecutarConsulta($sUpdate)) {
            return $usuario;
        } else {
            return false;
        }
    }

    public static function mostrarUsuarios() {
        $sMostrar = <<<QUERY
            select * FROM T01_Usuario;
        QUERY;

        return DBPDO::ejecutarConsulta($sMostrar);
    }

    /**
     * Eliminación de usuario.
     * 
     * Elimina el usuario dado de la base de datos.
     * 
     * @param Usuario $usuario Usuario a ser eliminado.
     * @return PDOStatement Resultado del delete.
     */
    public static function borrarUsuario($usuario) {
        $sDelete = <<<QUERY
            DELETE FROM T01_Usuario
            WHERE T01_CodUsuario='{$usuario->getCodUsuario()}';
        QUERY;

        return DBPDO::ejecutarConsulta($sDelete);
    }

    public static function registrarUltimaConexion($codigoUsuario) {

        $sUpdate = <<<QUERY
            UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
            T01_FechaHoraUltimaConexion = unix_timestamp()
            WHERE T01_CodUsuario='{$codigoUsuario}';
        QUERY;

        return DBPDO::ejecutarConsulta($sUpdate);
    }

    /**
     * Buscar usuario por Descripcion
     * 
     * Busqueda de un usuario por descripcion
     * 
     * @param Usuario $descUsuario
     * @return array
     */
    public static function buscaUsuariosPorDesc($descUsuario) {
        $aRespuesta = [];
        $consultaBuscarUsuarioPorDesc = <<<CONSULTA
            SELECT * FROM T01_Usuario WHERE T01_DescUsuario LIKE '%{$descUsuario}%' ;
        CONSULTA;

        $resultadoConsulta = DBPDO::ejecutarConsulta($consultaBuscarUsuarioPorDesc); //Ejecuto la consulta y guardo el resultado en una variable
        $aUsuario = $resultadoConsulta->fetchAll(); //Guardo en un array el conjunto de resultados del objeto resultado

        if ($aUsuario) { //Si el array tiene valores, lo recorro y creo el objeto usuario
            foreach ($aUsuario as $oUsuario) {
                $aRespuesta[$oUsuario['T01_DescUsuario']] = new Usuario(
                        $oUsuario['T01_CodUsuario'],
                        $oUsuario['T01_Password'],
                        $oUsuario['T01_DescUsuario'],
                        $oUsuario['T01_NumConexiones'],
                        $oUsuario['T01_FechaHoraUltimaConexion'],
                        $oUsuario['T01_FechaHoraUltimaConexion'],
                        $oUsuario['T01_Perfil'],
                        $oUsuario['T01_ImagenUsuario']
                );
            }
            return $aRespuesta; //Devuelvo el nuevo usuario
        } else {
            return false; //Devuelvo false
        }
    }

}
