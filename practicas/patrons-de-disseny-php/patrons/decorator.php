<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Decorator</h1>
    <p class="text-center">
        El patrón Decorator permite agregar funcionalidades a un objeto de forma dinámica sin alterar su estructura.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Decorator permite añadir comportamientos a un objeto de manera flexible, sin modificar su código original.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
interface Componente {
    public function operacion();
}

class ComponenteConcreto implements Componente {
    public function operacion() {
        return "Operación básica";
    }
}

class Decorador implements Componente {
    protected $componente;

    public function __construct(Componente $componente) {
        $this->componente = $componente;
    }

    public function operacion() {
        return $this->componente->operacion();
    }
}

class DecoradorConcreto extends Decorador {
    public function operacion() {
        return parent::operacion() . " con decorador agregado";
    }
}

$componente = new ComponenteConcreto();
$decorador = new DecoradorConcreto($componente);
echo $decorador->operacion();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
