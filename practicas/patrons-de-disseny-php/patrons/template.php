<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Template Method</h1>
    <p class="text-center">
        El patrón Template Method define la estructura de un algoritmo, permitiendo que las subclases implementen ciertos pasos del algoritmo.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Template Method permite definir el esqueleto de un algoritmo en un método base, dejando a las subclases
        implementar detalles específicos. Esto asegura que el algoritmo siga una estructura predefinida.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
abstract class Algoritmo {
    public function ejecutar() {
        $this->paso1();
        $this->paso2();
        $this->paso3();
    }

    abstract protected function paso1();
    abstract protected function paso2();
    abstract protected function paso3();
}

class AlgoritmoConcreto extends Algoritmo {
    protected function paso1() {
        echo "Paso 1 ejecutado\n";
    }

    protected function paso2() {
        echo "Paso 2 ejecutado\n";
    }

    protected function paso3() {
        echo "Paso 3 ejecutado\n";
    }
}

$algoritmo = new AlgoritmoConcreto();
$algoritmo->ejecutar();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
