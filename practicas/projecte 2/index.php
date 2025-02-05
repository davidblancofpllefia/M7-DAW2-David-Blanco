<?php
require_once 'carta.class.php';
require_once 'baraja.class.php';

$baraja = new Baraja();
$cartas = $baraja->getCartas(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar todas las cartas</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        .cartas-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .carta {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Todas las cartas</h1>
    <div class="cartas-container">
    <img src="./cartas_uno/2_red.png" alt="Carta red 1" class="carta">

        <?php foreach ($cartas as $carta): ?>
            <?php echo $carta->pinta_carta(); ?>
        <?php endforeach; ?>
    </div>
</body>
</html>
