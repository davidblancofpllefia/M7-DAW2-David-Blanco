<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Facade</h1>
    <p class="text-center">
        El patrón Facade proporciona una interfaz unificada que facilita la interacción con un conjunto de interfaces
        más complejas.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Facade proporciona una interfaz simplificada para subsistemas complejos. Este patrón ayuda a reducir la complejidad
        al ocultar la interacción con los componentes internos de un sistema.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class SubSistemaA {
    public function operacionA() {
        return "Operación A";
    }
}

class SubSistemaB {
    public function operacionB() {
        return "Operación B";
    }
}

class Facade {
    private $subA;
    private $subB;

    public function __construct() {
        $this->subA = new SubSistemaA();
        $this->subB = new SubSistemaB();
    }

    public function operacionFacil() {
        return $this->subA->operacionA() . " y " . $this->subB->operacionB();
    }
}

$facade = new Facade();
echo $facade->operacionFacil();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
