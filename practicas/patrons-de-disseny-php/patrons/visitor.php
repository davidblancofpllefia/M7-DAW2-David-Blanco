<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Visitor</h1>
    <p class="text-center">
        El patrón Visitor permite separar la lógica de operación de los objetos, permitiendo que los objetos acepten un "visitante"
        para realizar operaciones sobre ellos.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Visitor permite añadir operaciones nuevas a los objetos sin modificar su estructura. Se utiliza cuando es necesario
        realizar una serie de operaciones sobre una jerarquía de objetos, sin alterar sus clases.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
interface Elemento {
    public function aceptar(Visitante $visitante);
}

class ElementoA implements Elemento {
    public function aceptar(Visitante $visitante) {
        $visitante->visitarElementoA($this);
    }
}

class ElementoB implements Elemento {
    public function aceptar(Visitante $visitante) {
        $visitante->visitarElementoB($this);
    }
}

interface Visitante {
    public function visitarElementoA(ElementoA $elemento);
    public function visitarElementoB(ElementoB $elemento);
}

class VisitanteConcreto implements Visitante {
    public function visitarElementoA(ElementoA $elemento) {
        echo "Visitando Elemento A\n";
    }

    public function visitarElementoB(ElementoB $elemento) {
        echo "Visitando Elemento B\n";
    }
}

$elementoA = new ElementoA();
$elementoB = new ElementoB();
$visitante = new VisitanteConcreto();

$elementoA->aceptar($visitante);
$elementoB->aceptar($visitante);
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
