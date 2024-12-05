<?php
function conectarBD() {
    $server = "serverdemo2025.mysql.database.azure.com";
    $username = "adminaz";
    $password = "Contrasena123";
    $database = "repositorio_c116";
    $port = 3306;

    // Crear la conexión
    $conexion = mysqli_connect($server, $username, $password, $database, $port);

    // Verificar la conexión
    if (!$conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    return $conexion;
}
?>
