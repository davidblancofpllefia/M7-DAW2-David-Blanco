<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Factory Method</h1>
    <p class="text-center">
        El patrón Factory Method es un patrón creacional que proporciona una interfaz para crear objetos en una superclase,
        pero permite a las subclases alterar el tipo de objetos que se crearán.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Factory Method permite delegar la creación de objetos a las subclases. De esta manera, una clase puede
        delegar la creación de sus objetos a otras clases sin conocer sus tipos exactos.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
interface Producto {
    public function operacion();
}

class ProductoConcretoA implements Producto {
    public function operacion() {
        return "Producto A creado";
    }
}

class ProductoConcretoB implements Producto {
    public function operacion() {
        return "Producto B creado";
    }
}

abstract class Creador {
    abstract public function factoryMethod(): Producto;

    public function operar() {
        $producto = $this->factoryMethod();
        return $producto->operacion();
    }
}

class CreadorConcretoA extends Creador {
    public function factoryMethod(): Producto {
        return new ProductoConcretoA();
    }
}

class CreadorConcretoB extends Creador {
    public function factoryMethod(): Producto {
        return new ProductoConcretoB();
    }
}

$creadorA = new CreadorConcretoA();
echo $creadorA->operar();

$creadorB = new CreadorConcretoB();
echo $creadorB->operar();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
