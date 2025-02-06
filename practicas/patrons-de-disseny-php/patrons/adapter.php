<?php
include '../header.php';
include '../nav.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Adapter</h1>
    <p class="text-center">
        El patrón Adapter permite que dos interfaces incompatibles colaboren entre sí. Se utiliza para adaptar la interfaz de una clase
        a una interfaz esperada por el cliente.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Adapter convierte la interfaz de una clase en otra interfaz que el cliente espera. Es útil cuando
        se quiere usar una clase existente, pero su interfaz no se ajusta a las necesidades del sistema.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Cliente {
    public function pedirOperacion(AdaptadorInterface $adaptador) {
        return $adaptador->realizarOperacion();
    }
}

interface AdaptadorInterface {
    public function realizarOperacion();
}

class AdaptadorA implements AdaptadorInterface {
    public function realizarOperacion() {
        return "Operación A ejecutada";
    }
}

$cliente = new Cliente();
$adaptadorA = new AdaptadorA();
echo $cliente->pedirOperacion($adaptadorA);
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
>