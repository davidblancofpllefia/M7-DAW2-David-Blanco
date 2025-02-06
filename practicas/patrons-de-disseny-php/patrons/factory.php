<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Abstract Factory</h1>
    <p class="text-center">
        El patrón Abstract Factory proporciona una interfaz para crear familias de objetos relacionados o dependientes
        sin especificar sus clases concretas.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Abstract Factory permite crear productos de diferentes familias sin conocer sus clases concretas.
        Así se pueden crear diferentes tipos de productos relacionados entre sí.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
interface AbstractFactory {
    public function crearProductoA();
    public function crearProductoB();
}

class FabricaConcreta1 implements AbstractFactory {
    public function crearProductoA() {
        return new ProductoA1();
    }
    public function crearProductoB() {
        return new ProductoB1();
    }
}

class FabricaConcreta2 implements AbstractFactory {
    public function crearProductoA() {
        return new ProductoA2();
    }
    public function crearProductoB() {
        return new ProductoB2();
    }
}

interface ProductoA {
    public function operacionA();
}

class ProductoA1 implements ProductoA {
    public function operacionA() {
        return "Producto A1 creado";
    }
}

class ProductoA2 implements ProductoA {
    public function operacionA() {
        return "Producto A2 creado";
    }
}

interface ProductoB {
    public function operacionB();
}

class ProductoB1 implements ProductoB {
    public function operacionB() {
        return "Producto B1 creado";
    }
}

class ProductoB2 implements ProductoB {
    public function operacionB() {
        return "Producto B2 creado";
    }
}

$fabrica1 = new FabricaConcreta1();
echo $fabrica1->crearProductoA()->operacionA();
echo $fabrica1->crearProductoB()->operacionB();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
