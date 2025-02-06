<?php
include '../header.php';
include '../nav.php';
?>
<div class="container mt-5">
    <h1 class="text-center">Patrón State</h1>
    <p class="text-center">
        El patrón State permite cambiar el comportamiento de un objeto cuando cambia su estado interno.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón State permite a un objeto cambiar su comportamiento cuando su estado interno cambia.
        Es útil para representar estados diferentes y cambiar de comportamiento basado en el estado actual.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Estado {
    public function hacerOperacion() {}
}

class EstadoA extends Estado {
    public function hacerOperacion() {
        return "Operación realizada en Estado A";
    }
}

class Contexto {
    private $estado;

    public function __construct(Estado $estado) {
        $this->estado = $estado;
    }

    public function setEstado(Estado $estado) {
        $this->estado = $estado;
    }

    public function hacerOperacion() {
        return $this->estado->hacerOperacion();
    }
}

$contexto = new Contexto(new EstadoA());
echo $contexto->hacerOperacion();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
