<?php

class ConexionSingleton
{
    private static $instancia;
    private $conexion;

    const USUARIO = "*******";
    const PASSWORD = "*******";
    const SERVIDOR = "*******";
    const BASE_DATOS = "*******";

    private function __construct()
    {
        $this->conexion = mysqli_connect(self::SERVIDOR, self::USUARIO, self::PASSWORD);

        if (!$this->conexion) {
            throw new Exception("No se pudo conectar al Servidor: " . mysqli_connect_error());
        }

        mysqli_query($this->conexion, "SET SESSION collation_connection ='utf8_unicode_ci'");

        $db = mysqli_select_db($this->conexion, self::BASE_DATOS);

        if (!$db) {
            throw new Exception("Error al conectar a la base de datos: " . mysqli_error($this->conexion));
        }
    }

    public static function obtenerInstancia()
    {
        if (!self::$instancia) {
            self::$instancia = new self();
        }

        return self::$instancia;
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }


}

?>