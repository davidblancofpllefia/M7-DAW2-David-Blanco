<?php

require_once 'baraja.class.php';
require_once 'jugador.class.php';

class Partida {
    private $numero_jugadores;
    private $numero_cartas;
    private $turno;
    private $baraja;
    private $carta_en_mesa;
    private $array_jugadores = [];
    private $constante_sentido = 1;

    public function __construct($numero_jugadores, $numero_cartas) {
        $this->numero_jugadores = $numero_jugadores;
        $this->numero_cartas = $numero_cartas;
        $this->baraja = new Baraja();
        $this->baraja->mezcla();
        $this->inicialitzar_jugadors();
        $this->carta_en_mesa = array_pop($this->baraja->getCartas());
        $this->turno = 0;
    }

    private function inicialitzar_jugadors() {
        for ($i = 0; $i < $this->numero_jugadores; $i++) {
            $jugador = new Jugador("Jugador " . ($i + 1));
            $jugador->rebre_cartes(array_splice($this->baraja->getCartas(), 0, $this->numero_cartas));
            $this->array_jugadores[] = $jugador;
        }
    }

    public function jugar() {
        while (true) {
            $jugador_actual = $this->array_jugadores[$this->turno];

            echo "\nTorn de: " . $jugador_actual->getNom();
            echo "\nCarta a la taula: " . $this->carta_en_mesa->getPalo() . " " . $this->carta_en_mesa->getNumero();

            $jugada = $jugador_actual->jugar_carta($this->carta_en_mesa);

            if ($jugada) {
                $this->carta_en_mesa = $jugada;
                echo "\nEl jugador ha jugat: " . $jugada->getPalo() . " " . $jugada->getNumero();

                $this->normas_uno($jugada);

                if (count($jugador_actual->getCartes()) == 0) {
                    echo "\n" . $jugador_actual->getNom() . " ha guanyat!";
                    break;
                }
            } else {
                $robada = array_splice($this->baraja->getCartas(), 0, 1);
                $jugador_actual->rebre_cartes($robada);
                echo "\nEl jugador no pot jugar i roba una carta.";
            }

            $this->cambiar_turno();
        }
    }

    private function normas_uno($carta) {
        switch ($carta->getNumero()) {
            case 'reverse':
                $this->cambiar_sentido();
                echo "\nEl sentit del joc ha canviat.";
                break;
            case 'skip':
                $this->cambiar_turno();
                echo "\nEl següent jugador perd el torn.";
                break;
            case '+2':
                $seguent = $this->getSeguentJugador();
                $cartes_robades = array_splice($this->baraja->getCartas(), 0, 2);
                $seguent->rebre_cartes($cartes_robades);
                echo "\nEl següent jugador roba 2 cartes.";
                break;
            case '+4':
                $seguent = $this->getSeguentJugador();
                $cartes_robades = array_splice($this->baraja->getCartas(), 0, 4);
                $seguent->rebre_cartes($cartes_robades);
                $this->carta_en_mesa->setPalo($this->triar_color());
                echo "\nEl següent jugador roba 4 cartes.";
                break;
        }
    }

    private function cambiar_turno() {
        $this->turno = ($this->turno + $this->constante_sentido) % $this->numero_jugadores;
        if ($this->turno < 0) {
            $this->turno += $this->numero_jugadores;
        }
    }

    private function cambiar_sentido() {
        $this->constante_sentido *= -1;
    }

    private function getSeguentJugador() {
        $seguent = ($this->turno + $this->constante_sentido) % $this->numero_jugadores;
        if ($seguent < 0) {
            $seguent += $this->numero_jugadores;
        }
        return $this->array_jugadores[$seguent];
    }

    private function triar_color() {
        $colors = ['red', 'yellow', 'blue', 'green'];
        return $colors[array_rand($colors)];
    }
}

class Jugador {
    private $id;
    private $mano = [];

    public function __construct($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getMano() {
        return $this->mano;
    }

    public function rebre_cartes($cartes_noves) {
        $this->mano = array_merge($this->mano, $cartes_noves);
    }

    public function afegir_carta($carta) {
        $this->mano[] = $carta;
    }

    public function eliminar_carta($carta) {
        foreach ($this->mano as $key => $carta_actual) {
            if ($carta_actual === $carta) {
                unset($this->mano[$key]);
                $this->mano = array_values($this->mano);
                return true;
            }
        }
        return false;
    }

    public function mostrar_ma() {
        $output = "";
        foreach ($this->mano as $carta) {
            $output .= $carta->pinta_carta();
        }
        return $output;
    }
}

?>
