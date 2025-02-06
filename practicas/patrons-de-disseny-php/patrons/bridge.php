<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Bridge</h1>
    <p class="text-center">
        El patrón Bridge separa la abstracción de su implementación, permitiendo que ambas evolucionen independientemente.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Bridge permite separar una abstracción de su implementación. Esto ayuda a evitar la creación de clases
        concretas que combinan diferentes implementaciones con diferentes abstracciones.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
interface Implementacion {
    public function realizarOperacion();
}

class ImplementacionConcretaA implements Implementacion {
    public function realizarOperacion() {
        return "Implementación A ejecutada";
    }
}

class ImplementacionConcretaB implements Implementacion {
    public function realizarOperacion() {
        return "Implementación B ejecutada";
    }
}

abstract class Abstraccion {
    protected $implementacion;

    public function __construct(Implementacion $implementacion) {
        $this->implementacion = $implementacion;
    }

    abstract public function ejecutar();
}

class AbstraccionConcreta extends Abstraccion {
    public function ejecutar() {
        return $this->implementacion->realizarOperacion();
    }
}

$abstraccion = new AbstraccionConcreta(new ImplementacionConcretaA());
echo $abstraccion->ejecutar();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
