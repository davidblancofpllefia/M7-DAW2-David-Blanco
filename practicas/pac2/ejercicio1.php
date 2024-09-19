<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
         h1{
            text-align: center;
            font-size: 50px;
        }
        .cuadrados{
            display: flex;
            flex-wrap: wrap;
            flex-direction: row; 
        }
        .numeros{
            background-color: #303030;
            color: white;
            width: 50px;
            margin: 10px;
            padding: 50px;
            border: 1px solid #000;
            text-align:center;
            font: 200%;
        }
    </style>
</head>
<body>
<?php
    echo "<h1>Exercici 1: Nombres parells entre 50 i 200</h1>";
    echo '<div class="cuadrados">';
    for ($i = 50; $i <= 200; $i++){
        if ($i%2==0){
            echo '<div class="numeros">'. $i .'</div> ';
        }else{

        };
    }
    echo '</div>';

?>
 
</body>
</html>