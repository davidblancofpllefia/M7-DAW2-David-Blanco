<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Chain of Responsibility</h1>
    <p class="text-center">
        El patrón Chain of Responsibility permite pasar una solicitud a lo largo de una cadena de objetos hasta que uno de ellos la maneje.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Chain of Responsibility permite que varios objetos tengan la oportunidad de manejar una solicitud.
        La solicitud pasa a lo largo de la cadena hasta que uno de los objetos la maneja.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
abstract class Manejador {
    protected $siguiente;

    public function setSiguiente(Manejador $siguiente) {
        $this->siguiente = $siguiente;
    }

    abstract public function manejar($solicitud);
}

class ManejadorA extends Manejador {
    public function manejar($solicitud) {
        if ($solicitud == 'A') {
            return "Manejador A maneja la solicitud";
        } elseif ($this->siguiente) {
            return $this->siguiente->manejar($solicitud);
        }
    }
}

class ManejadorB extends Manejador {
    public function manejar($solicitud) {
        if ($solicitud == 'B') {
            return "Manejador B maneja la solicitud";
        } elseif ($this->siguiente) {
            return $this->siguiente->manejar($solicitud);
        }
    }
}

$manejadorA = new ManejadorA();
$manejadorB = new ManejadorB();

$manejadorA->setSiguiente($manejadorB);

echo $manejadorA->manejar('B');
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
