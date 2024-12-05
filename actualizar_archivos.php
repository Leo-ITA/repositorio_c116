<?php
// Ruta de la carpeta donde están los archivos PHP
$directorio = __DIR__; // Cambia esto por la ruta específica si no es el directorio actual

// Reemplazos a realizar
$buscar = 'require_once 'db_config.php';
$conexion = conectarBD();';
$reemplazar = "require_once 'db_config.php';\n\$conexion = conectarBD();";

// Función para recorrer y modificar archivos
function actualizarArchivos($ruta, $buscar, $reemplazar) {
    $archivos = scandir($ruta);

    foreach ($archivos as $archivo) {
        $rutaArchivo = $ruta . '/' . $archivo;

        // Ignorar directorios "." y ".."
        if ($archivo === '.' || $archivo === '..') {
            continue;
        }

        // Si es un archivo PHP, modificarlo
        if (is_file($rutaArchivo) && pathinfo($rutaArchivo, PATHINFO_EXTENSION) === 'php') {
            // Leer el contenido del archivo
            $contenido = file_get_contents($rutaArchivo);

            // Reemplazar el código
            if (strpos($contenido, $buscar) !== false) {
                $contenidoModificado = str_replace($buscar, $reemplazar, $contenido);
                file_put_contents($rutaArchivo, $contenidoModificado);
                echo "Archivo actualizado: $rutaArchivo\n";
            } else {
                echo "Sin cambios en: $rutaArchivo\n";
            }
        }

        // Si es un directorio, recorrerlo recursivamente
        if (is_dir($rutaArchivo)) {
            actualizarArchivos($rutaArchivo, $buscar, $reemplazar);
        }
    }
}

// Ejecutar la función
actualizarArchivos($directorio, $buscar, $reemplazar);
?>
