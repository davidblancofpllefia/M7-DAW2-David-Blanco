<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones Arrays</title>
</head>
<body>
<h1>Funciones de Arrays</h1>
<h2>Sumar valores de un array</h2>
<?php
function sumarArray($numeros) {
    return array_sum($numeros);
}

$numeros = [10, 20, 30, 40, 50];  

$sumaTotal = sumarArray($numeros);
echo " La suma total del array es: $sumaTotal";
?>
<h2>Ordenar un array alfabéticamente</h2>
<?php
function ordenarArrayAlfabetico($nombres) {
    sort($nombres);
    return $nombres;  
}

$nombres = ["Juan", "Ana", "Pedro", "María", "Luis"]; 
$nombresOrdenados = ordenarArrayAlfabetico($nombres);
echo "Nombres ordenados alfabéticamente: <br>";
echo implode(", ", $nombresOrdenados); 
?>
<h2>Filtrar elementos mayores a un valor</h2>
<?php
function filtrarMayores($numeros, $valor) {
    return array_filter($numeros, function($numero) use ($valor) {
        return $numero > $valor;
    });
}


$numeros = [10, 20, 5, 30, 15, 25];  
$valor = 15;  

$numerosMayores = filtrarMayores($numeros, $valor);
echo "Números mayores que $valor: <br>";
echo implode(", ", $numerosMayores);  
?>
<h2>Buscar un valor en un array</h2>
<?php
function buscarEnArray($array, $valor) {
    return in_array($valor, $array);
}

$array = ["David", "Albert", "Carlos", "Andrea"];  
$valor = "Albert"; 

if (buscarEnArray($array, $valor)) {
    echo "El valor '$valor' se encuentra en el array.";
} else {
    echo "El valor '$valor' NO se encuentra en el array.";
}
?>
<h2>Contar elementos de un array</h2>
<?php
function contarElementos($array) {
    return count($array);
}

$array = ["David", "Albert", "Carlos", "Andrea"];  

$cantidadElementos = contarElementos($array);
echo "El array contiene $cantidadElementos elementos.";
?>
<h2>Obtener el valor máximo de un array</h2>
<?php
function obtenerMaximo($numeros) {
    return max($numeros);
}

$numeros = [10, 20, 5, 30, 15, 25];  

$maximo = obtenerMaximo($numeros);
echo "El valor máximo en el array es: $maximo";
?>
<h2>Obtener el valor mínimo de un array</h2>
<?php
function obtenerMinimo($numeros) {
   
    return min($numeros);
}

$numeros = [10, 20, 5, 30, 15, 25];  

$minimo = obtenerMinimo($numeros);
echo "El valor mínimo en el array es: $minimo";
?>
<h2>Eliminar duplicados de un array</h2>
<?php
function eliminarDuplicados($array) {
    
    return array_unique($array);
}


$arrayConDuplicados = ["manzana", "banana", "naranja", "kiwi", "manzana", "banana"]; 

$arraySinDuplicados = eliminarDuplicados($arrayConDuplicados);
echo "Array con duplicados: <br>";
echo implode(", ", $arrayConDuplicados) . "<br>";  

echo "Array sin duplicados: <br>";
echo implode(", ", $arraySinDuplicados); 
?>
<h2>Combinar dos arrays</h2>
<?php
function combinarArrays($array1, $array2) {
   
    return array_merge($array1, $array2);
}

$array1 = ["manzana", "banana", "naranja"]; 
$array2 = ["kiwi", "fresa", "piña"];        

$arrayCombinado = combinarArrays($array1, $array2);


echo "Primer array: <br>";
echo implode(", ", $array1) . "<br>";  

echo "Segundo array: <br>";
echo implode(", ", $array2) . "<br>";  


echo "Array combinado: <br>";
echo implode(", ", $arrayCombinado);  
?>
<h2>Dividir un array en fragmentos</h2>
<?php
function dividirArray($array, $tamanio) {
    // Usar array_chunk() para dividir el array en fragmentos
    return array_chunk($array, $tamanio);
}


$arrayOriginal = ["manzana", "banana", "naranja", "kiwi", "fresa", "piña", "mango", "pera"];  
$tamano = 3; 

$arrayDividido = dividirArray($arrayOriginal, $tamano);


echo "Array original: <br>";
echo implode(", ", $arrayOriginal) . "<br>";  


echo "Array dividido en fragmentos de tamaño $tamano: <br>";
foreach ($arrayDividido as $fragmento) {
    echo "" . implode(", ", $fragmento) . "<br>";  
}
?>

</body>
</html>