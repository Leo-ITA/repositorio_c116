<?php
session_start();
error_reporting(0);

$varsesion= $_SESSION['usuario'];
if($varsesion == null || $varsesion == ''){
    header("location:index.html");
    die();
}

// Conexión a la base de datos
$conexion = require_once 'db_config.php';
$conexion = conectarBD();

$id = $_GET['id'];

// Prepara la consulta para obtener el usuario específico
$consulta_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$query_usuario = mysqli_query($conexion, $consulta_usuario);
$row_usuario = mysqli_fetch_array($query_usuario);

// Segunda consulta para obtener todos los usuarios
$consulta = "SELECT `id`,`tipo`, `estado`, `actualizacion` FROM `documentos` WHERE usuario = '$varsesion'";
$query = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <base href="#inicio">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CETIS 116 - Sistema de Gestión Documental</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f8ff;
        }

        .header {
            background-color: #0066cc;
            color: white;
        }

        .nav-custom {
            background-color: #004499;
        }

        .feature {
            background-color: #f0f8ff;
        }

        .table {
            width: 100%;
            max-width: 100%;
            table-layout:initial;
        }
        th, tr {
            text-align: center;
        }
    </style>

</head>

<body>
    <header class="header text-center py-3">
        <img src="../img/logo.png" width="60" height="60" alt="">
        <h1>Cetis 116 - Sistema de Gestión Documental</h1>
    </header>

    <nav class="nav-custom">
        <ul class="nav justify-content-center py-2">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold"  href="documentos.php">Documentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
            </li>
        </ul>
    </nav>

    <!-- tabla de usuarios -->
    <div class="container my-4">
        <div class="content bg-white p-4 rounded shadow-sm">
            <div class="content">
                <div class="search-bar d-flex mb-3">
                    <button class="btn btn-success mr-2" data-toggle="modal" data-target="#userModal-nuevo"
                        onclick="showModal('nuevo')">Nuevo</button>
                    <input id="buscar" type="text" class="form-control" placeholder="Buscar documentos..." onkeyup="onSearch()">
                </div>
                <table class="table table-bordered table-striped bg-white table-text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Documento</th>
                            <th>Estado</th>
                            <th>Actualización</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody id="tabla_usuario">
    <?php while($row = mysqli_fetch_array($query)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['tipo'] ?></td>
        <td><?= $row['estado'] ?></td>
        <td><?= $row['actualizacion'] ?></td>
        <td>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Acción
                </button>
                <ul class="dropdown-menu">
                    <?php if ($row['estado'] == 'cargado'): ?>

                    <li><a class="dropdown-item" 
                            href="acciones\ver_documento.php?id=<?= $row['id'] ?>">Ver</a></li>
                    <li><a class="dropdown-item" 
                            href="acciones\descargar_documento.php?id=<?= $row['id'] ?>">Descargar</a></li>
                    <?php endif; ?>

                    <?php if ($row['estado'] == 'vacio'): ?>
                    <li><a class="dropdown-item"
                            >El documento no ha sido cargado</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </td>
    </tr>
    <?php endwhile; ?>
</tbody>


                </table>
            </div>
        </div>
    </div>

    
    <!-- Modal para cerrar sesión -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmar Cierre de Sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cerrar la sesión, <strong><?= $varsesion ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="../cerrar_sesion.php">
                        <button type="button" class="btn btn-primary">Cerrar Sesión</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    <script>
        const onSearch = () => {
            const input = document.querySelector("#buscar");
            const filter = input.value.toUpperCase();
            const rows = document.querySelectorAll("#tabla_usuario  tr");

            rows.forEach((row) => {
                const text = row.textContent.toUpperCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        };
    </script>

</body>

</html>