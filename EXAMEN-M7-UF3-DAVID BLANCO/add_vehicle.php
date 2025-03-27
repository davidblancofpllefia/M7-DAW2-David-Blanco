<?php
session_start();
require_once 'config.php';

// Verificar si el usuario es admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página.';
    exit;
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $model = $_POST['model'];
    $categoria = $_POST['categoria'];
    $preu_dia = $_POST['preu_dia'];
    $imatge = $_POST['imatge'];
    $disponible = isset($_POST['disponible']) ? 1 : 0;  // Si está marcado, disponible será 1, de lo contrario 0

    // Preparar la consulta SQL para insertar el vehículo
    $query = "INSERT INTO VEHICLES (model, categoria, preu_dia, imatge, disponible) 
              VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('ssssi', $model, $categoria, $preu_dia, $imatge, $disponible);
        if ($stmt->execute()) {
            // Redirigir a vehicles.php después de agregar el vehículo
            header('Location: vehicles.php');
            exit;
        } else {
            echo 'Error al agregar el vehículo: ' . $mysqli->error;
        }
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vehículo</title>
</head>
<body>
    <h1>Agregar nuevo vehículo</h1>

    <form action="add_vehicle.php" method="POST">
        <label for="model">Modelo:</label>
        <input type="text" name="model" required><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" required><br><br>

        <label for="preu_dia">Precio por día:</label>
        <input type="text" name="preu_dia" required><br><br>

        <label for="imatge">Imagen:</label>
        <input type="text" name="imatge" required><br><br>

        <label for="disponible">Disponible:</label>
        <input type="checkbox" name="disponible" value="1" checked><br><br>

        <input type="submit" value="Agregar Vehículo">
    </form>

</body>
</html>
