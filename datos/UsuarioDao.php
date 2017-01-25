<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion{

	protected static $cnx;

	private static function getConexion(){
		self::$cnx = Conexion::conectar();
	}

	private static function desconectar(){
		self::$cnx = null;
	}

	  public static function login($usuario)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":usuario", $usuario->getUsuario());
        $resultado->bindParam(":password", $usuario->getPassword());

        $resultado->execute();
        
        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario->getUsuario()
                && $filas["password"] == $usuario->getPassword()) {
                return true;
            }
        }
        return false;
    }


}