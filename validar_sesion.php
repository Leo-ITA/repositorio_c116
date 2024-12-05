<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

// Prepara la consulta para evitar inyecciones SQL
$consulta = "SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

$filas = mysqli_fetch_array($resultado);

if ($filas) {
    // Verifica el rol del usuario
    if ($filas['id_rol'] == 1) {
        header("Location: admin/index.php");
        exit();
    } else if ($filas['id_rol'] == 2) {
        header("Location: personal/index.php");
        exit();
    }
} else {
    // Si no se encuentran filas, las credenciales son incorrectas
    $error_message = "Usuario o contraseña incorrectos";
    include("index.html");
}

// Liberar el resultado y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
