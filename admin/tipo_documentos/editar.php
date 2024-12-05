<?php 
$id = $_POST['id'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

    // Actualiza los documentos que tienen el tipo antiguo
    $consulta_documentos = "UPDATE documentos SET tipo='$tipo' WHERE tipo = (SELECT tipo FROM tipos_documentos WHERE id = '$id')";
    $query_documentos = mysqli_query($conexion, $consulta_documentos);

// Prepara la consulta para actualizar el tipo de documento
$consulta_tipo = "UPDATE tipos_documentos SET tipo='$tipo', descripcion='$descripcion' WHERE id='$id'";
$query_tipo = mysqli_query($conexion, $consulta_tipo);

// Si la actualización del tipo es exitosa, actualiza los documentos relacionados
if($query_tipo) {
    // Redirecciona al documento después de la edición
    header("location: documentos.php");
} else {
    die("Error al actualizar: " . mysqli_error($conexion));
}
?>
