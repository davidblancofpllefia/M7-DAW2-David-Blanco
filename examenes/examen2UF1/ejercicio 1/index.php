<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['nombre'] = $_POST['nombre'];  
    $_SESSION['apellido'] = $_POST['apellido']; 
}
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>

<h1>Bienvenido a la página de inicio</h1>

<form method="POST" action="index.php">
    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" name="apellido" id="apellido" required><br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>
