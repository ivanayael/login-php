<?php
class Conexion
{
    /**
     * Conexión a la base datos
     *
     * @return PDO
     */
    public static function conectar()
    {
        try {
            $cn = new PDO("mysql:host=localhost;dbname=pit", "currai", "blackrose007");
            return $cn;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
}