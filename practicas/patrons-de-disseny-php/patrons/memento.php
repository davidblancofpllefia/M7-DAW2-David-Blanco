<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Memento</h1>
    <p class="text-center">
        El patrón Memento permite guardar y restaurar el estado de un objeto sin violar su encapsulamiento.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Memento permite capturar el estado interno de un objeto y restaurarlo sin comprometer la encapsulación del mismo.
        Es útil cuando se necesitan puntos de restauración en una secuencia de operaciones.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Memento {
    private $estado;

    public function __construct($estado) {
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }
}

class Origen {
    private $estado;

    public function establecerEstado($estado) {
        $this->estado = $estado;
    }

    public function guardarEstado() {
        return new Memento($this->estado);
    }

    public function restaurarEstado(Memento $memento) {
        $this->estado = $memento->getEstado();
    }
}

$origen = new Origen();
$origen->establecerEstado("Estado inicial");

$memento = $origen->guardarEstado();
$origen->establecerEstado("Estado cambiado");

$origen->restaurarEstado($memento);

echo $origen->getEstado();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
