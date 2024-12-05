<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion == '') {
    header("location:index.html");
    die();
}

$conexion = require_once 'db_config.php';
$conexion = conectarBD();

$id = $_GET['id'];

$consulta = "SELECT archivo FROM documentos WHERE id = '$id'";
$query = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($query);

if ($row && !empty($row['archivo'])) {
    $ruta_archivo = $row['archivo'];

    if (file_exists($ruta_archivo)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($ruta_archivo) . '"');
        readfile($ruta_archivo);
        exit();
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No hay archivo asociado con este documento.";
}
?>
