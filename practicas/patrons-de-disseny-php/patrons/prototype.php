<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Prototype</h1>
    <p class="text-center">
        El patrón Prototype permite copiar objetos existentes sin que el código dependa de sus clases.
        Se usa cuando la creación de objetos es costosa y queremos evitar la instanciación repetida.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Prototype permite crear nuevas instancias de objetos basados en objetos existentes, utilizando el
        mecanismo de clonación para evitar la creación manual de nuevos objetos.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Prototipo {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function __clone() {
    }
}

$persona1 = new Prototipo("Juan", 30);
$persona2 = clone $persona1;
$persona2->nombre = "Pedro";

echo "Persona 1: " . $persona1->nombre . ", " . $persona1->edad . " años<br>";
echo "Persona 2: " . $persona2->nombre . ", " . $persona2->edad . " años";
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
