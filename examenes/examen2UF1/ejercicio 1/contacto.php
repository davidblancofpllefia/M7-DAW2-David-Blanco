<?php
session_start();
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>

<h1>Bienvenido a la página de contacto</h1>

<form method="POST" action="contacto.php">
    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre" id="nombre"><br><br>

    <label for="apellido">Apellido:</label><br>
    <input type="text" name="apellido" id="apellido"><br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>

