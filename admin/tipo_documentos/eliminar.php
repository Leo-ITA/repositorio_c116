<?php 
$id = $_GET['id'];

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

// Prepara la consulta para eliminar documentos asociados al tipo de documento
$consulta_documentos = "DELETE FROM documentos WHERE tipo = (SELECT tipo FROM tipos_documentos WHERE id = '$id')";
$query_documentos = mysqli_query($conexion, $consulta_documentos);

// Prepara la consulta para eliminar el tipo de documento
$consulta_tipo = "DELETE FROM tipos_documentos WHERE id='$id'";
$query_tipo = mysqli_query($conexion, $consulta_tipo);

// Verifica si ambas consultas se ejecutaron correctamente
if ($query_documentos && $query_tipo) {
    header("location: documentos.php");
} else {
    die("Error al eliminar: " . mysqli_error($conexion));
}
?>
