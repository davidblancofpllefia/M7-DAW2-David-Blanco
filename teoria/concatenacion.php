<?php
echo "<h1>Concatenacion</h1>";

$nombre = "David";
$pais = "España";
$edad = 20;

$frase = "Hola me llamo {$nombre} naci en ". $pais . "y tengo" . $edad . "años";
echo $frase;

echo "<br>";

echo "Hola me llamo" .  $nombre . "tengo" . $edad . "años";
echo "";

echo "<br>";
echo "Hola me llamo {$nombre} tengo {$edad} años y naci en {$pais}";
?>