<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        h1{
            text-align: center;
            font-size: 50px;
        }
        .par{
            color: green;
            text-align: center;
            font-size: 35px;
        }

        .impar{
            color: red;
            text-align: center;
            font-size: 35px;
        }
    </style>
</head>
<body>
<?php
    echo "<h1>Exercici 3: Nombre aleatori parell o senar</h1>";
    $numero_aleatorio = rand(1,100);
    if ($numero_aleatorio%2==0){
        echo '<div class="par">El ' . $numero_aleatorio . ' es par</div>';
    }else{
        echo '<div class="impar">El ' . $numero_aleatorio . ' es impar</div>';
    }
?>  
</body>
</html>