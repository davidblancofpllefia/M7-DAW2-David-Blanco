<?php
session_start();
include('funciones.php');  

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: home.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    eliminarLibro($id);  
    header('Location: home.php'); 
    exit;
}

inicializarLibros();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$titulo = $autor = $imagen = $descripcion = "";

if ($id !== null && isset($_SESSION['libros'][$id])) {
    $titulo = $_SESSION['libros'][$id]['titulo'];
    $autor = $_SESSION['libros'][$id]['autor'];
    $imagen = $_SESSION['libros'][$id]['imagen'];
    $descripcion = $_SESSION['libros'][$id]['descripcion'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    if ($id !== null && isset($_SESSION['libros'][$id])) {
        editarLibro($id, $titulo, $autor, $imagen, $descripcion);
    } else {
        agregarLibro($titulo, $autor, $imagen, $descripcion);
    }

    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $id !== null ? 'Editar Libro' : 'Agregar Libro' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <h4 class="m-0">👋 Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?></h4>
                <p class="text-muted m-0">
                    <i class="fas fa-user-shield text-success"></i> <?= htmlspecialchars($_SESSION['role'] === 'admin' ? 'Administrador' : 'Lector') ?>
                </p>
            </div>
            <a href="home.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Biblioteca
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= $id !== null ? 'Editar Libro' : 'Agregar Nuevo Libro' ?></h2>
            <p class="lead"><?= $id !== null ? 'Modifica los datos del libro.' : 'Añade un nuevo libro a la biblioteca.' ?></p>
        </div>

        <form method="POST" action="add_edit_book.php" class="mx-auto" style="max-width: 600px;">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"> <!-- Campo oculto para el ID -->

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" placeholder="Título" required>
                <label for="titulo">Título</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="autor" name="autor" value="<?= htmlspecialchars($autor) ?>" placeholder="Autor" required>
                <label for="autor">Autor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?= htmlspecialchars($imagen) ?>" placeholder="URL de la Imagen">
                <label for="imagen">URL de la Imagen</label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" style="height: 150px;"><?= htmlspecialchars($descripcion) ?></textarea>
                <label for="descripcion">Descripción</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg"><?= $id !== null ? 'Guardar Cambios' : 'Agregar Libro' ?></button>
            </div>
        </form>

        <!-- Si estamos editando, mostrar la opción de eliminar -->
        <?php if ($id !== null): ?>
        <div class="mt-4">
            <a href="add_edit_book.php?delete_id=<?= $id ?>" class="btn btn-danger btn-lg" onclick="return confirm('¿Estás seguro de eliminar este libro?');">Eliminar Libro</a>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
