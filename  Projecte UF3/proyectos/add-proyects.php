<?php 
session_start();
require_once './proyectobd_uf3/config.php';


// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    die("Acceso denegado.");
}

// Comprobar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']); // URL de la imagen
    $created_at = date('Y-m-d H:i:s');

    // Validar que los campos no estén vacíos
    if (empty($title) || empty($description) || empty($image)) {
        die("Todos los campos son obligatorios.");
    }

    // Insertar el proyecto en la base de datos
    $stmt = $mysqli->prepare("INSERT INTO Projects (title, description, image, created_at) VALUES (?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Error en la consulta: " . $mysqli->error);
    }

    $stmt->bind_param('ssss', $title, $description, $image, $created_at);

    if ($stmt->execute()) {
        echo "Proyecto añadido con éxito.";
    } else {
        echo "Error al añadir el proyecto: " . $mysqli->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Proyecto</title>
</head>
<body>
    <h1>Añadir Proyecto</h1>
    
    <form action="add-proyects.php" method="POST">
        <label for="title">Título del Proyecto:</label><br>
        <input type="text" name="title" id="title" required><br>

        <label for="description">Descripción:</label><br>
        <textarea name="description" id="description" required></textarea><br>

        <label for="image">URL de la Imagen:</label><br>
        <input type="text" name="image" id="image" required><br>

        <input type="submit" value="Añadir Proyecto">
    </form>
</body>
</html>
