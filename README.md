# ConexionSingleton
Implementar el patrón de diseño Singleton para manejar la conexión a una base de datos MySQL

Este proyecto proporciona una implementación de la clase `ConexionSingleton`, que utiliza el patrón de diseño Singleton para gestionar la conexión a una base de datos MySQL en aplicaciones PHP.

## Uso

1. Incluye la clase en tu proyecto:
 `include("ruta-de-/connection.php");`
2.Obtén una instancia de la conexión: 
 `$conexion = ConexionSingleton::obtenerInstancia();`
3.Obtén la conexión a la base de datos:
`$con = $conexion->obtenerConexion();`

4. ¡Importante! No olvides cerrar la conexión después de su uso para liberar recursos y mantener una gestión eficiente de la base de datos.
    mysqli_close($con);

¡Listo! Ahora puedes utilizar $con para realizar consultas a la base de datos.

5. También puedes implementar en el connection.php la función:

public function cerrarConexion()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
            $this->conexion = null;
        }
    }

6. Para terminarla de esta forma:
$conexion->cerrarConexion();

Singleton: Se utiliza el patrón de diseño Singleton para garantizar que solo haya una instancia de la clase ConexionSingleton en toda la aplicación, evitando así la creación de múltiples conexiones innecesarias a la base de datos.

Conexión a la base de datos: El constructor de la clase se encarga de establecer la conexión a la base de datos utilizando los parámetros proporcionados (usuario, contraseña, servidor y nombre de la base de datos). También se manejan posibles errores durante el proceso de conexión.

Obtención de instancia: Se proporciona un método estático obtenerInstancia que devuelve la instancia única de la clase, permitiendo acceder a la conexión a la base de datos desde cualquier lugar del código.

Obtención de conexión: Se proporciona un método obtenerConexion para obtener la conexión a la base de datos desde fuera de la clase.

