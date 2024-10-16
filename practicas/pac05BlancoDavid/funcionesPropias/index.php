<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones con parámetros</title>
</head>
<body>
    <h1>Funciones con parámetros</h1>
    <h2>Generar saludo personalizado</h2>
    <?php
        function generarSaludo($nombre) {
            return "<p>¡Hola, " . ($nombre) . "!</p>";
        }
    
        echo generarSaludo("Juan");
    ?>
    <h2>Calcular el precio total de un producto</h2>
    <?php
        function calcularTotal($precio, $cantidad, $impuesto) {
        $subtotal = $precio * $cantidad;
        $totalImpuesto = $subtotal * ($impuesto / 100);
        $total = $subtotal + $totalImpuesto;
        return $total;
        }

        $precio = rand(10, 100);           
        $cantidad = rand(1, 10);         
        $impuesto = 15;      

        echo "El precio total es: $" . calcularTotal($precio, $cantidad, $impuesto);
    ?>
    <h2>Generar un resumen acortado</h2>
    <?php
        function generarResumen($texto, $limite) {
            if (strlen($texto) <= $limite) {
                return $texto;
            }

   
            $resumen = substr($texto, 0, $limite) . "...";
            return $resumen;
        }


        $texto = "texto largo texto largo texto largo texto largo texto largo.";
        $limite = 50;

echo generarResumen($texto, $limite);
?>
<h2>Conversión de temperaturas</h2>
<?php
function convertirTemperatura($temperatura, $escala) {
    if ($escala == "C") {
        
        return ($temperatura - 32) * 5 / 9;
    } elseif ($escala == "F") {
        
        return ($temperatura * 9 / 5) + 32;
    } else {
        
        return "Escala no válida. Usa 'C' para Celsius o 'F' para Fahrenheit.";
    }
}


$temperatura = 100;  
$escala = "C";       

echo "La temperatura convertida es: " . convertirTemperatura($temperatura, $escala);
?>
<h2>Cálculo de edad a partir del año de nacimiento</h2>
<?php
function calcularEdad($anoNacimiento) {
    $anoActual = date("Y");
    $edad = $anoActual - $anoNacimiento;
    return $edad;
}


$anoNacimiento = 2004;
echo "La edad actual es: " . calcularEdad($anoNacimiento);
?>
<h2>Determinar si un número es par o impar</h2>
<?php
function esPar($numero) {
    return $numero % 2 == 0;
}


$numero = rand(1, 100);

if (esPar($numero)) {
    echo "$numero es un número par.";
} else {
    echo "$numero es un número impar.";
}
?>
<h2>Generar enlace de descarga</h2>
<?php
function generarEnlaceDescarga($archivo) {
    return "<a href='$archivo' download>Descargar</a>";
}

$archivo = "./Currículum desarrollo de aplicaciones web.pdf";  
echo generarEnlaceDescarga($archivo);
?>
<h2>Calcular descuento aplicado</h2>
<?php
function calcularDescuento($precioOriginal, $descuento) {
    $montoDescuento = ($precioOriginal * $descuento) / 100;
    $precioFinal = $precioOriginal - $montoDescuento;
    return $precioFinal;
}


$precioOriginal = rand(50, 500);
$descuento = 15;  

echo "El precio original es: $" . $precioOriginal . "<br>";
echo "El precio final con descuento es: $" . calcularDescuento($precioOriginal, $descuento);
?>
<h2>Calcular descuento aplicado</h2>
<?php
function convertirHorasMinutos($horas) {
    return $horas * 60;
}

$horas = rand(1, 100); 
echo "$horas horas son " . convertirHorasMinutos($horas) . " minutos.";
?>
<h1>Manipulación de strings y arrays</h1>
<h2>Convertir texto a mayúsculas</h2>
<?php
function convertirMayusculas($texto) {
    return strtoupper($texto);
}


$texto = "Hola, Albert!";  

echo "Texto original: $texto <br>";
echo "Texto en mayúsculas: " . convertirMayusculas($texto);
?>
<h2>Contar palabras en un texto</h2>
<?php
function contarPalabras($texto) {
    return str_word_count($texto);
}

$texto = "Este es un ejemplo de texto para contar palabras.";  
echo  $texto;
echo " El texto contiene " . contarPalabras($texto) . " palabras.";
?>
<h2>Reemplazar palabras en una frase</h2>
<?php
function reemplazarPalabras($texto, $buscar, $reemplazar) {
    return str_replace($buscar, $reemplazar, $texto);
}

$texto = "Me llamo Pablo.";  
$buscar = "Pablo"; 
$reemplazar = "David";  

echo "Texto original: $texto <br>";
echo "Texto corregido: " . reemplazarPalabras($texto, $buscar, $reemplazar);
?>
<h2>Invertir una cadena de texto</h2>
<?php
function invertirTexto($texto) {
    return strrev($texto);
}

$texto = "Hola, Albert!";  

echo "Texto original: $texto <br>";
echo "Texto invertido: " . invertirTexto($texto);
?>
<h2>Comparar dos strings</h2>
<?php
function compararStrings($cadena1, $cadena2) {
    return $cadena1 === $cadena2;
}

$cadena1 = "Hola, mundo!";
$cadena2 = "Hola, mundo!";

if (compararStrings($cadena1, $cadena2)) {
    echo "Las cadenas son iguales.";
} else {
    echo "Las cadenas son diferentes.";
}
?>
<h2>Eliminar espacios en blanco</h2>
<?php
function eliminarEspacios($texto) {
    return trim($texto);
}

$texto = "   Hola,   Albert!   ";  
echo "Texto original: '$texto' <br>";
echo "Texto sin espacios: '" . eliminarEspacios($texto) . "'";
?>
<h2>Contar ocurrencias de una palabra en un texto</h2>
<?php
function contarOcurrencias($texto, $palabra) {
    return substr_count($texto, $palabra);
}

$texto = "Hola, Albert! El Albert es mi profesor de PHP."; 
$palabra = "Albert";  
echo $texto;
$ocurrencias = contarOcurrencias($texto, $palabra);
echo " La palabra '$palabra' aparece $ocurrencias veces en el texto.";
?>
<h2>Dividir una cadena en palabras</h2>
<?php
function dividirPalabras($texto) {
    return explode(" ", $texto);
}

$texto = "Este es un ejemplo de texto para dividir en palabras.";  // Texto de ejemplo

$palabras = dividirPalabras($texto);
echo "Las palabras son: <br>";
echo implode(", ", $palabras);  
?>


</body>
</html>