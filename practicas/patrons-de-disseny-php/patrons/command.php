<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Command</h1>
    <p class="text-center">
        El patrón Command convierte una solicitud en un objeto, permitiendo parametrizar objetos con solicitudes y ejecutar operaciones de manera ordenada.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Command convierte las peticiones en objetos. Este patrón es útil para descomponer solicitudes y permitir la
        ejecución de operaciones a distancia sin que el receptor sepa qué solicitud está ejecutando.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Receptor {
    public function ejecutarOperacion() {
        return "Operación ejecutada";
    }
}

class Comando {
    protected $receptor;

    public function __construct(Receptor $receptor) {
        $this->receptor = $receptor;
    }

    public function ejecutar() {
        return $this->receptor->ejecutarOperacion();
    }
}

$receptor = new Receptor();
$comando = new Comando($receptor);
echo $comando->ejecutar();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
