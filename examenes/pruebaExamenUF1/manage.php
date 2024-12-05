<?php
session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php'); 
    exit();
}

include('data.php');

if (isset($_GET['eliminar_id'])) {
    $id_a_eliminar = $_GET['eliminar_id'];
    $preguntas = array_filter($preguntas, fn($pregunta) => $pregunta['id'] != $id_a_eliminar);
    $preguntas = array_values($preguntas); 

    header('Location: manage.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Preguntas - Trivial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Vincula el archivo CSS si tienes alguno personalizado -->
</head>
<body>

<header class="bg-primary text-white p-4">
    <div class="container">
        <h1 class="text-center">Gestión de Preguntas</h1>
        <a href="logout.php" class="btn btn-danger float-right">Cerrar sesión</a>
    </div>
</header>

<main class="container mt-4">
    <h2 class="mb-4">Lista de Preguntas</h2>
    <a href="add_edit_question.php" class="btn btn-success mb-3">Añadir Nueva Pregunta</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Respuesta Correcta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($preguntas as $pregunta): ?>
                <tr>
                    <td><?php echo $pregunta['id']; ?></td>
                    <td><?php echo $pregunta['pregunta']; ?></td>
                    <td><?php echo $pregunta['respuesta_correcta']; ?></td>
                    <td>
                        <a href="add_edit_question.php?id=<?php echo $pregunta['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="manage.php?eliminar_id=<?php echo $pregunta['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pregunta?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
