<?php 
$id = null;
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

// Prepara la consulta para evitar inyecciones SQL
$consulta = "INSERT INTO tipos_documentos VALUES ('$id', '$tipo', '$descripcion')";
$query = mysqli_query($conexion, $consulta);

if ($query) {
    // Ahora obtenemos todos los usuarios para insertar documentos para cada uno
    $consulta_usuarios = "SELECT usuario FROM usuarios"; // Ajusta el nombre de la columna según sea necesario
    $query_usuarios = mysqli_query($conexion, $consulta_usuarios);

    if ($query_usuarios) {
        // Insertar un registro en la tabla "documentos" por cada usuario
        while ($row = mysqli_fetch_assoc($query_usuarios)) {
            $usuario = $row['usuario'];
            $consulta_documento = "INSERT INTO documentos (usuario, tipo, estado, actualizacion, archivo) 
                                   VALUES ('$usuario', '$tipo', 'vacio', 'nulo', 'nulo')";
            mysqli_query($conexion, $consulta_documento);
        }
    }

    header("location: documentos.php");
}
?>
