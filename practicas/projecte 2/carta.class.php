<?php

// Clase Carta
class Carta {
    private $palo; 
    private $numero; 
    private $index; 

    // Constructor de la clase
    public function __construct($palo, $numero, $index) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    // Getter para el palo
    public function getPalo() {
        return $this->palo;
    }

    // Getter para el número
    public function getNumero() {
        return $this->numero;
    }

    // Getter para el índice
    public function getIndex() {
        return $this->index;
    }

    // Método para mostrar la carta como imagen
    public function pinta_carta() {
        $imgSrc = "./cartas_uno/" . $this->palo . "_" . $this->numero . ".png"; 
        return "<img src='$imgSrc' alt='Carta $this->palo $this->numero' class='carta'>";
    }    
    

    // Método para mostrar la carta como enlace (interactivo)
    public function pinta_carta_link($url) {
        $imgSrc = "./cartas_uno/" . $this->palo . "_" . $this->numero . ".png"; 
        return "<a href='$url?carta=$this->index'><img src='$imgSrc' alt='Carta $this->palo $this->numero' class='carta'></a>";
    }

    // Método para mostrar la carta girada (parte posterior)
    public function pinta_carta_girada() {
        $imgSrc = "./cartas_uno/back.png"; 
        return "<img src='$imgSrc' alt='Carta girada' class='carta'>";
    }
}

?>
