<?php
session_start();
include('funciones.php');

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');  
    exit;
}

$isAdmin = $_SESSION['role'] === 'admin';

inicializarLibros();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?= htmlspecialchars($_SESSION['profile_picture']) ?>" alt="Foto de perfil" 
                    class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                    <h4 class="m-0">👋 Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?></h4>
                    <p class="text-muted m-0">
                        <i class="fas fa-user-shield text-success"></i> <?= htmlspecialchars($isAdmin ? 'Administrador' : 'Lector') ?>
                    </p>
                </div>
            </div>
            <a href="logout.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
        </div>
    </header>

    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2 class="fw-bold">Biblioteca</h2>

            <?php if ($isAdmin): ?>
            <a href="add_edit_book.php" class="btn btn-primary">Añadir Libro</a>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php foreach ($_SESSION['libros'] as $id => $libro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($libro['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($libro['titulo']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($libro['descripcion']) ?></p>
                            <p class="text-muted">Autor: <?= htmlspecialchars($libro['autor']) ?></p>

                            <!-- Mostrar botones de editar y eliminar solo si es admin -->
                            <?php if ($isAdmin): ?>
                            <div class="d-flex justify-content-between">
                                <a href="add_edit_book.php?id=<?= $id ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="add_edit_book.php?delete_id=<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este libro?');">Eliminar</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
