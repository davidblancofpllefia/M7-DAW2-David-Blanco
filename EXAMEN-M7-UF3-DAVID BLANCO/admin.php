<?php
session_start();
require_once 'config.php';

// 1. Verifica si el rol es administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    echo '<img src="https://i.blogs.es/d86db0/meme-fry-1/1366_2000.jpg" alt="">';
    exit;
}

// Extracción de testimonios
$resultTestimonios = $mysqli->query("SELECT * FROM Testimonials");

// Extracción de usuarios
$resultUsers = $mysqli->query("SELECT * FROM Users");

$resultNews = $mysqli->query("SELECT * FROM News");
$resultProjects = $mysqli->query("SELECT * FROM Projects");



?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Fondo de pantalla */
        body {
            background-image: url('https://images7.alphacoders.com/108/1087509.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff; /* Asegura que el texto sea legible sobre el fondo */
        }
        .container {
            background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro semitransparente para mejorar la visibilidad del texto */
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Panel de Administrador</h1>

         <!-- Botón para volver -->
         <div class="mb-4">
            <a href="../index.php" class="btn btn-secondary">Volver</a>
        </div>
        
        <!-- Usuarios -->
        <div class="card mb-4">
            <div class="card-header ">
                <h2>Usuarios</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Rol</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Recorremos todas las filas de los usuarios
                        while ($user = $resultUsers->fetch_assoc()) : ?>
                            <tr>
                                <td><?= ($user['name']) ?></td>
                                <td><?= ($user['surname']) ?></td>
                                <td><?= ($user['email']) ?></td>
                                <td><img src="<?= $user['avatar'] ?>" alt="Avatar" class="img-fluid" width="80"></td>
                                <td><?= ($user['rol']) ?></td>
                                <td><?= ($user['age']) ?> </td>
                                <td>
                                    <a href="./users/edit-users.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="./users/delete-user.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

            <!-- Testimonios -->
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Testimonios</h2>
                <a href="./testimonials/add-testimonials.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Agregar Testimonio</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Descripción</th>
                            <th>Rating</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Recorremos todas las filas de los testimonios
                        while ($testimonio = $resultTestimonios->fetch_assoc()) : ?>
                            <tr>
                                <td><?= ($testimonio['name']) ?></td>
                                <td><?= ($testimonio['surname']) ?></td>
                                <td><?= ($testimonio['description']) ?></td>
                                <td><?= ($testimonio['rating']) ?></td>
                                <td>
                                    <a href="./testimonials/edit-testimonials.php?id=<?= $testimonio['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="./testimonials/delete-testimonials.php?id=<?= $testimonio['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este testimonio?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>


 
        <!-- News -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Noticias</h2>
                <a href="../admin/new/add-new.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Agregar Noticia</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Titulo</th>
                            <th>Subtitulo</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Recorremos todas las filas de los usuarios
                        while ($new = $resultNews->fetch_assoc()) : ?>
                            <tr>
                                <td><?= ($new['title']) ?></td>
                                <td><?= ($new['subtitle']) ?></td>
                                <td><img src="<?= $new['thumbnail'] ?>" alt="Avatar" class="img-fluid" width="60"></td>
                                <td><?= ($new['description']) ?></td>
                              
                                <td>
                                    <a href="./new/edit-new.php?id=<?= $new['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="../admin/new/delete-new.php?id=<?= $new['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta noticia?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

      <!-- Proyectos -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Proyectos</h2>
        <a href="./projects/add-project.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Agregar Proyecto</a>
    </div>

    <div class="card-body">
        <?php if ($resultProjects->num_rows > 0) : ?>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Título</th>
                        <th>URL</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($project = $resultProjects->fetch_assoc()) : ?>
                        <tr>
                            <td><?= ($project['title']) ?></td>
                            <td><a href="<?= ($project['url']) ?>" target="_blank"><?= ($project['url']) ?></a></td>
                            <td><img src="<?= ($project['thumbnail']) ?>" alt="Imagen Proyecto" class="img-fluid" width="60"></td>
                            <td><?= ($project['description']) ?></td>
                            <td>
                                <a href="./projects/edit-project.php?id=<?= $project['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="./projects/delete-project.php?id=<?= $project['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center">No hay proyectos registrados.</p>
        <?php endif; ?>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0CpOzzIGrgPbGp6vq+hsZ2/DzS09eptChbFZ3w5t7fDz3coP" crossorigin="anonymous"></script>
</body>
</html>