<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Composite</h1>
    <p class="text-center">
        El patrón Composite permite tratar de manera uniforme objetos individuales y composiciones de objetos.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Composite permite crear árboles de objetos, donde los nodos pueden ser tanto objetos individuales como colecciones
        de otros objetos. Permite tratarlos de la misma manera, independientemente de si son simples o compuestos.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
interface Componente {
    public function operacion();
}

class ComponenteHoja implements Componente {
    public function operacion() {
        return "Operación de hoja";
    }
}

class ComponenteCompuesto implements Componente {
    private $componentes = [];

    public function agregar(Componente $componente) {
        $this->componentes[] = $componente;
    }

    public function operacion() {
        $resultado = "Operación compuesta: ";
        foreach ($this->componentes as $componente) {
            $resultado .= $componente->operacion() . " ";
        }
        return $resultado;
    }
}

$hoja = new ComponenteHoja();
$compuesto = new ComponenteCompuesto();
$compuesto->agregar($hoja);

echo $compuesto->operacion();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
