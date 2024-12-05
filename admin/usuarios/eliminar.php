<?php 
$id = $_GET['id'];
$usuario = $_GET['usuario'];

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

// Prepara la consulta para evitar inyecciones SQL
$consulta = "DELETE FROM usuarios WHERE id='$id'";
$query = mysqli_query($conexion, $consulta);

$consulta2 = "DELETE FROM documentos WHERE usuario='$usuario'";
$query = mysqli_query($conexion, $consulta2);

if (isset($_GET['usuario']) && !empty($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    echo "Usuario obtenido correctamente: " . $usuario;
} else {
    die("Error: No se ha proporcionado el parámetro 'usuario'.");
}


if($query) {
    header("location: usuarios.php");
}
?>
