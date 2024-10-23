<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ícono de Usuario</title>
</head>
<body>

<?php

$logueado = true;


$icono = $logueado ? "https://cdn-icons-png.freepik.com/512/9769/9769450.png" : "https://cdn-icons-png.flaticon.com/512/859/859030.png";


echo "<img src='$icono' alt='Ícono de usuario' />";
?>

</body>
</html>
