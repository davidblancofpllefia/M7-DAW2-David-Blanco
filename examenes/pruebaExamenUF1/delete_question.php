<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: manage.php');
    exit();
}

$id_eliminar = $_GET['id'];
$pregunta_a_eliminar = null;
$indice_pregunta = -1;

// Buscar la pregunta que se va a eliminar en la sesión
foreach ($_SESSION['preguntas'] as $index => $pregunta) {
    if ($pregunta['id'] == $id_eliminar) {
        $pregunta_a_eliminar = $pregunta;
        $indice_pregunta = $index;
        break;
    }
}

if (!$pregunta_a_eliminar) {
    header('Location: manage.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    array_splice($_SESSION['preguntas'], $indice_pregunta, 1);

    header('Location: manage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Pregunta - Trivial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-danger text-white p-4">
    <h1 class="text-center">Eliminar Pregunta</h1>
    <a href="manage.php" class="btn btn-secondary">Volver a Gestión</a>
</header>

<main class="container mt-4">
    <h2>¿Estás seguro de que deseas eliminar la siguiente pregunta?</h2>
    
    <div class="pregunta-info mb-4">
        <p><strong>Pregunta:</strong> <?php echo $pregunta_a_eliminar['question']; ?></p>
        <ul>
            <?php foreach ($pregunta_a_eliminar['options'] as $opcion): ?>
                <li><?php echo $opcion; ?></li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Respuesta Correcta:</strong> <?php echo $pregunta_a_eliminar['answer']; ?></p>
    </div>

    <!-- Formulario de confirmación de eliminación -->
    <form method="POST">
        <button type="submit" class="btn btn-danger btn-lg">Confirmar Eliminación</button>
    </form>
</main>
</body>
</html>
