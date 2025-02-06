<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Mediator</h1>
    <p class="text-center">
        El patrón Mediator permite que los objetos se comuniquen entre sí de manera indirecta a través de un mediador central.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Mediator facilita la comunicación entre objetos sin que estos interactúen directamente entre sí.
        Se usa un objeto mediador que coordina todas las interacciones.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Mediador {
    public function comunicar($mensaje) {
        return "Mediador dice: " . $mensaje;
    }
}

class Colaborador {
    private $mediador;

    public function __construct(Mediador $mediador) {
        $this->mediador = $mediador;
    }

    public function enviarMensaje($mensaje) {
        return $this->mediador->comunicar($mensaje);
    }
}

$mediador = new Mediador();
$colaborador = new Colaborador($mediador);

echo $colaborador->enviarMensaje("Hola, Mediador!");
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
