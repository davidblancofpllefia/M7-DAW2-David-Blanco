<?php

    $estudiantes = array('Didac', 'David', 'Lucia');
    $lista = array("Suleiman","Brian", "Danny");

    //var_dump($lista);
    print_r($lista);

    $lista2 = ["Didac", "David", "Lucia", 87, 32];

    echo $lista2[1];

    $colores = ["rojo", "azul", "verde"];
    $colores[]="Naranja";
    print_r($colores);

    $tutor = [
        "nombre" => "David",
        "apellidos" => "Blanco Fernandez",
        "edad" => 36
    ];

    echo $tutor["apellidos"];
    $tutor["edad"] = 18;

    $numeros = [1,2,3,4,5,6,7,8,9];
    for ($i = 0; $i < count($numeros); $i++){
         echo $numeros[$i] . "<br>";
    }

    foreach($numeros as $num){
        echo ($num * 2) . ' ';
    }

    $ciudades = [
        "Paris" => "Francia",
        "Barcelona" => "Espanya",
        "Londres" => "Reino Unido"
    ];

    foreach($ciudades as $ciudad => $pais ){
        echo ;
    }
?>