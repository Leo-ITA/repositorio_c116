<?php
session_start();
error_reporting(0);

$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion == '') {
    header("location:index.html");
    die();
}

// Verificar sesión activa
echo "Usuario en sesión: $varsesion <br>";

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
echo "Conexión exitosa <br>";

$id = $_GET['id'];
echo "ID del documento: $id <br>";

// Consulta para obtener el archivo del documento por ID
$consulta = "SELECT archivo FROM documentos WHERE id = '$id'";
$query = mysqli_query($conexion, $consulta);
if (!$query) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
echo "Consulta ejecutada correctamente <br>";

$row = mysqli_fetch_array($query);
if ($row) {
    echo "Resultado de la consulta: " . var_export($row, true) . "<br>";

    if (!empty($row['archivo'])) {
        $ruta_archivo = $row['archivo'];
        echo "Ruta del archivo: $ruta_archivo <br>";

        // Verifica si el archivo existe
        if (file_exists($ruta_archivo)) {
            echo "El archivo existe. Mostrándolo en el navegador. <br>";

            // Mostrar el PDF en el navegador
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($ruta_archivo) . '"');
            readfile($ruta_archivo);
            exit();
        } else {
            echo "El archivo no existe en la ruta especificada.<br>";
            echo "ruta archivo: " . $ruta_archivo . "<br>";
        }
    } else {
        echo "No hay archivo asociado con este documento.";
    }
} else {
    echo "No se encontró ningún registro en la consulta.";
}

// Cierra la conexión
mysqli_close($conexion);
?>