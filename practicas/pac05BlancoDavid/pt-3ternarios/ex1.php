<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 1</title>
</head>
<body>
<?php

    $autenticado = true; 
    
    if ($autenticado) {
        echo "<h2>Bienvenido al sistema</h2>";
    } else {
        echo "<h2>Por favor, inicie sesión</h2>";
    }
    
?>
</body>
</html>
