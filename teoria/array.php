<?php
//1.1 Array escalar indexado
$lista= array("Suleiman","Brian","Dany");
$estudiantes= array("Suleiman","Brian","Dany");
//var_dump($lista);

print_r($lista); //Para mostrar una lista completa muy especificada

//Desde la version 5.4 php

$lista2=["Didac", "Kevin", "David"];

echo $lista2[1];

//Sustituir un elemento 
$lista2[2]="Yehor";
print_r($lista2);

//añadir elementos a un array 
$colores= ["rojo","azul","verde"];
$colores[]="Naranja";
print_r($colores);

//2.Array Asociativo
$tutor= [
    "nombre"=> "Albert",
    "Apellidos"=> "Arrebola Sans",
    "Edad"=> 36
];
//cambiar valor de un elemetno del array asociativo
$tutor["Edad"]=30;
echo $tutor["Edad"];

//Recorrer array con un for
$numeros=[1,2,3,4,5,6,7,8,9];
for($i=0;$i < count($numeros);$i++ ){
    echo $numeros[$i] . "<br>"; 
}

//Recorrer Array con un Foreach
foreach($numeros as $num){  //Foreach recorre el numero y lo vuelve uno y lo multiplica
    echo ($num * 2) . '' . "<br>";
}

$ciudades = [
    "Paris" => "Francia",
    "Barcelona" => "Espanya", 
     "Londres" => "Reino Unido"
];

foreach($ciudades as $ciudad => $pais){
    //echo"la ciudad de $ciudad esta en $pais";
    if($ciudad == "Barcelona"){
        echo "la ciudad de $ciudad esta en $pais";
    }
    
}

//Crea un array multidimensional de estudiantes y sus notas, recorre cada estudiante con Foreach para mostrar sus datos

$estudiantes= [
    ["nombre" => "Anna", "nota" => 10, "genero" => "m"],
    ["nombre" => "Dani", "nota" => 10, "genero" => "h"],
    ["nombre" => "Yehor", "nota" => 11, "genero"=> "h"],
    ["nombre" => "Lucia", "nota" => 9, "genero"=> "m"],
    ["nombre" => "David", "nota" => 12, "genero" => "h"]
];

foreach($estudiantes as $estudiante){
    echo"El estudiante: {$idol[""]} ha sacado un {$estudiante["nota"]}<br>";

}



?>