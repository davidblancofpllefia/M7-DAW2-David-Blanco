<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Iterator</h1>
    <p class="text-center">
        El patrón Iterator permite recorrer los elementos de un objeto agregando una forma de acceso secuencial a los mismos.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Iterator proporciona un medio para acceder a los elementos de un contenedor sin exponer su representación interna.
        Permite recorrer colecciones de objetos de forma secuencial.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Coleccion {
    private $elementos = [];

    public function agregar($elemento) {
        $this->elementos[] = $elemento;
    }

    public function crearIterador() {
        return new Iterador($this->elementos);
    }
}

class Iterador {
    private $elementos;
    private $indice = 0;

    public function __construct($elementos) {
        $this->elementos = $elementos;
    }

    public function siguiente() {
        return isset($this->elementos[$this->indice]) ? $this->elementos[$this->indice++] : null;
    }
}

$coleccion = new Coleccion();
$coleccion->agregar("Elemento 1");
$coleccion->agregar("Elemento 2");

$iterador = $coleccion->crearIterador();
echo $iterador->siguiente();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
