<?php

include_once 'funciones.php';

$productos = [
    ['nombre' => 'Camiseta', 'precio' => 15.99, 'descripcion' => 'Camiseta de algodón'],
    ['nombre' => 'Zapatillas', 'precio' => 49.99, 'descripcion' => 'Zapatillas deportivas'],
    ['nombre' => 'Reloj', 'precio' => 129.99, 'descripcion' => 'Reloj caro'],
    ['nombre' => 'Mochila', 'precio' => 34.50, 'descripcion' => 'Mochila para viajes'],
    ['nombre' => 'Auriculares', 'precio' => 79.99, 'descripcion' => 'Auriculares inalámbricos']
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['descripcion'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        agregar_producto($nombre, $precio, $descripcion);
    } elseif (isset($_POST['eliminar'])) {
        $indice = $_POST['eliminar'];
        eliminar_producto($indice);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>

<h2>Ejercicio 2</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($productos as $indice => $producto) {
            echo "<tr>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $producto['precio'] . "€</td>";
            echo "<td>" . $producto['descripcion'] . "</td>";
            echo "<td>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='eliminar' value='$indice'>
                        <input type='submit' value='Eliminar'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<h3>Agregar Nuevo Producto</h3>
<form method="POST">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" step="0.01" required><br><br>

    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion" required></textarea><br><br>

    <input type="submit" value="Agregar Producto">
</form>

</body>
</html>
