<?php

require_once 'carta.class.php'; // Incluir la clase Carta

class Baraja {
    private $cartas = [];

    // Constructor que inicializa la baraja
    public function __construct() {
        $palos = ['red', 'yellow', 'blue', 'green'];  // Los colores de las cartas
        $numeros = range(1, 10);  // Los números de las cartas

        // Crear cartas para cada combinación de palo y número
        $index = 0;
        foreach ($palos as $palo) {
            foreach ($numeros as $numero) {
                $this->cartas[] = new Carta($palo, $numero, $index);
                $index++;
            }
        }
    }

    // Obtener todas las cartas
    public function getCartas() {
        return $this->cartas;
    }
}

?>
