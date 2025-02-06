<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Flyweight</h1>
    <p class="text-center">
        El patrón Flyweight permite compartir objetos que son costosos de crear y almacenar, para reducir el consumo de memoria.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Flyweight permite compartir objetos comunes, en lugar de crear una nueva instancia para cada solicitud.
        Es útil cuando tenemos muchos objetos similares que requieren muchos recursos.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Flyweight {
    private $estado;

    public function __construct($estado) {
        $this->estado = $estado;
    }

    public function operacion() {
        return $this->estado;
    }
}

class FlyweightFactory {
    private $flyweights = [];

    public function getFlyweight($estado) {
        if (!isset($this->flyweights[$estado])) {
            $this->flyweights[$estado] = new Flyweight($estado);
        }
        return $this->flyweights[$estado];
    }
}

$factory = new FlyweightFactory();
$flyweight1 = $factory->getFlyweight("Estado A");
$flyweight2 = $factory->getFlyweight("Estado A");

echo $flyweight1->operacion();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
