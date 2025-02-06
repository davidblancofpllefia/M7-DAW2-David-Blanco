<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Builder</h1>
    <p class="text-center">
        El patrón Builder permite construir un objeto complejo paso a paso. 
        Se usa cuando el proceso de creación debe ser independiente de las partes que lo componen.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Builder permite separar la construcción de un objeto de su representación final. Este patrón es útil
        cuando la creación de un objeto es compleja y se desea construir de diferentes maneras.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Producto {
    public $partes = [];

    public function mostrar() {
        return implode(", ", $this->partes);
    }
}

interface Constructor {
    public function reset();
    public function construirParteA();
    public function construirParteB();
    public function obtenerProducto();
}

class ConstructorConcreto implements Constructor {
    private $producto;

    public function __construct() {
        $this->reset();
    }

    public function reset() {
        $this->producto = new Producto();
    }

    public function construirParteA() {
        $this->producto->partes[] = "Parte A";
    }

    public function construirParteB() {
        $this->producto->partes[] = "Parte B";
    }

    public function obtenerProducto() {
        return $this->producto;
    }
}

class Director {
    private $constructor;

    public function __construct(Constructor $constructor) {
        $this->constructor = $constructor;
    }

    public function construirProductoCompleto() {
        $this->constructor->construirParteA();
        $this->constructor->construirParteB();
    }
}

$constructor = new ConstructorConcreto();
$director = new Director($constructor);
$director->construirProductoCompleto();
$producto = $constructor->obtenerProducto();
echo $producto->mostrar();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
