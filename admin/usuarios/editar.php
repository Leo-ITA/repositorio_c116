<?php 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario2'];
$nuevousuario = $_POST['nuevousuario'];
$contraseña = $_POST['contraseña'];
$id_rol = $_POST['id_rol'];

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Verificar que se ha proporcionado el usuario antiguo
if (isset($usuario) && !empty($usuario)) {
    echo "Antiguo usuario: " . $usuario;
} else {
    die("Error: No se ha proporcionado el antiguo valor de 'usuario'.");
}

// Actualizar el nombre de la carpeta del usuario si existe
$directorio_base = '../../uploads/';
$directorio_actual = $directorio_base . $usuario;
$directorio_nuevo = $directorio_base . $nuevousuario;

if (is_dir($directorio_actual)) {
    rename($directorio_actual, $directorio_nuevo);
}

// Actualizar el nombre de usuario en la tabla 'documentos'
$consulta2 = "UPDATE documentos SET usuario='$nuevousuario' WHERE usuario='$usuario'";
$query2 = mysqli_query($conexion, $consulta2);

// Actualizar el usuario en la tabla 'usuarios'
$consulta = "UPDATE usuarios SET nombre='$nombre', usuario='$nuevousuario', contraseña='$contraseña', id_rol='$id_rol' WHERE id='$id'";
$query = mysqli_query($conexion, $consulta);

if ($query && $query2) {
    header("Location: usuarios.php");
} else {
    die("Error en la actualización: " . mysqli_error($conexion));
}

// Cerrar la conexión
mysqli_close($conexion);
?>
