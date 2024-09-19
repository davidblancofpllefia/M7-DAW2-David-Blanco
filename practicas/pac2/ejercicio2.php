<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
         h1{
            text-align: center;
            font-size: 50px;
        }

        .tablas{
            display: flex;
            flex-wrap: wrap;
        }
        .tabla{
            background-color: #303030;
            color: white;
            width: 120px;
            margin: 10px;
            padding: 50px;
            border: 1px solid #000;
        }
        .multiplicaciones{
            font-size: 25px;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1>Exercici 2: Taules de multiplicar</h1>";
        echo '<div class="tablas">';
        echo '<div class="tabla">';
        $multiplicando= 1;
        $i;
        echo "<h1>Tabla del 1</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 2;
        $i;
        echo "<h1>Tabla del 2</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 3;
        $i;
        echo "<h1>Tabla del 3</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 4;
        $i;
        echo "<h1>Tabla del 4</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 5;
        $i;
        echo "<h1>Tabla del 5</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 6;
        $i;
        echo "<h1>Tabla del 6</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 7;
        $i;
        echo "<h1>Tabla del 7</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 8;
        $i;
        echo "<h1>Tabla del 8</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 9;
        $i;
        echo "<h1>Tabla del 9</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        
        echo '<div class="tabla">';
        $multiplicando= 10;
        $i;
        echo "<h1>Tabla del 10</h1>";
        for ($i=1; $i <=10 ; $i++) { 
            echo '<div class="multiplicaciones">';
            echo "$multiplicando" . " X " . $i . " = " . $multiplicando * $i;
             echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    ?>
</body>
</html>