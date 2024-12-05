<?php
// Obtener valores de los parámetros
$id = $_POST['document_id'];
$document_name= $_POST['document_name'];
$usuario = $_GET['usuario'];
$archivo = $_FILES['archivo']['name'];
$archivo_tmp = $_FILES['archivo']['tmp_name'];
$directorio_base = '../../uploads/';

// Conectar a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

// Verificar conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Crear el directorio del usuario si no existe
$directorio_usuario = $directorio_base . $usuario . '/';
if (!is_dir($directorio_usuario)) {
    mkdir($directorio_usuario, 0777, true);
}

$directorio_doc = $directorio_base . $usuario . '/'. $document_name . '/';
if (!is_dir($directorio_doc)) {
    mkdir($directorio_doc, 0777, true);
}

// Verificar extensión del archivo
$extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

if ($extension == 'pdf') {
    $ruta = $directorio_doc . $archivo;

    // Mover archivo al directorio del usuario
    if (move_uploaded_file($archivo_tmp, $ruta)) {
        
        // Actualizar la base de datos con la ruta correcta
        $consulta = "UPDATE documentos SET estado = 'cargado', archivo = '$ruta', actualizacion = NOW() WHERE id = '$id'";
        
        if (mysqli_query($conexion, $consulta)) {
            echo "<script>
                    alert('Archivo subido exitosamente.');
                    window.location.href = 'verdocumentos.php?id=" . $id . "&usuario=" . $usuario . "';
                  </script>";
        } else {
            echo "<script>alert('Error en la consulta SQL: " . mysqli_error($conexion) . "');</script>";
        }
    } else {
        echo "<script>alert('Error al mover el archivo a la carpeta de destino.');</script>";
    }
} else {
    echo "<script>alert('Solo se permiten archivos PDF.');</script>";
}

// Cerrar conexión
mysqli_close($conexion);
?>
