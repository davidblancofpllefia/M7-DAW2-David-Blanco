<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 2</title>
    <style>
        .disponible {
            color: green;
        }
        .agotado {
            color: red;
        }
    </style>
</head>
<body>

<?php

$stock = 10; 
$stock2 = -1;

if ($stock > 0) {
    echo '<p class="disponible">Producto disponible</p>';
} else {
    echo '<p class="agotado">Producto agotado</p>';
}

if ($stock2 > 0) {
    echo '<p class="disponible">Producto disponible</p>';
} else {
    echo '<p class="agotado">Producto agotado</p>';
}
?>

</body>
</html>
