<?php 
//seguridad de session
session_start();
error_reporting(0);
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location:../index.html");
    die();
}

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <a class="nav-link text-white font-weight-bold" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="usuarios/usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="tipo_documentos/documentos.php">Documentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
            </li>
        </ul>
    </nav>

    <div class="container my-4">
        <div class="content bg-white p-4 rounded shadow-sm">
            <div class="welcome-message text-center mb-4">
                <h2>Bienvenido al Sistema de Gestión Documental del CETIS 116</h2>
                <p>Simplificamos el manejo de documentos para nuestro personal y administradores.</p>
            </div>
            <div class="features row">
                <div class="col-md-4 mb-3">
                    <div class="feature text-center p-4 rounded">
                        <i class="fas fa-file-alt fa-3x text-primary mb-2"></i>
                        <h3>Gestión de Documentos</h3>
                        <p>Almacena y organiza todos los documentos importantes en un solo lugar.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="feature text-center p-4 rounded">
                        <i class="fas fa-users-cog fa-3x text-primary mb-2"></i>
                        <h3>Control de Usuarios</h3>
                        <p>Administra fácilmente los accesos y permisos de los usuarios del sistema.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="feature text-center p-4 rounded">
                        <i class="fas fa-search fa-3x text-primary mb-2"></i>
                        <h3>Búsqueda Rápida</h3>
                        <p>Encuentra rápidamente los documentos que necesitas con nuestra función de búsqueda avanzada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmar Cierre de Sesión Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cerrar la sesión?
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
