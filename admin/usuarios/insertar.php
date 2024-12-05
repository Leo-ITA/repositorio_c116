<?php 
$id = null;
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$id_rol = $_POST['id_rol'];

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verifica si el nombre de usuario ya existe en la base de datos
$check_query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$check_result = mysqli_query($conexion, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // Si el usuario ya existe, muestra un mensaje de error y redirige
    echo "<script>
            alert('El nombre de usuario ya existe. Por favor, elige uno diferente.');
            window.location.href = 'usuarios.php';
          </script>";
} else {
    // Si el usuario no existe, procede con la inserción
    $consulta = "INSERT INTO usuarios VALUES ('$id','$nombre','$usuario','$contraseña','$id_rol')";
    $query = mysqli_query($conexion, $consulta);

    // Obtener todos los tipos de documentos
    $consulta_tipos = "SELECT tipo FROM tipos_documentos";
    $resultado_tipos = mysqli_query($conexion, $consulta_tipos);

    if ($resultado_tipos) {
        // Inserta un registro en la tabla "documentos" por cada tipo de documento obtenido
        while ($row = mysqli_fetch_assoc($resultado_tipos)) {
            $documento = $row['tipo'];
            $consulta_documento = "INSERT INTO documentos (`usuario`, `tipo`, `estado`, `actualizacion`, `archivo`) 
                                   VALUES ('$usuario', '$documento', 'vacio', 'nulo', 'nulo')";
            $query_documento = mysqli_query($conexion, $consulta_documento);
        }
    }

    if ($query) {
        header("location: usuarios.php");
    } else {
        echo "Error al insertar el usuario: " . mysqli_error($conexion);
    }
}

// Cierra la conexión
mysqli_close($conexion);
?>
