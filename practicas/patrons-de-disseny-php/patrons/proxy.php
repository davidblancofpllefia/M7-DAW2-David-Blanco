<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Proxy</h1>
    <p class="text-center">
        El patrón Proxy proporciona un objeto que actúa como sustituto de otro objeto, controlando el acceso a él.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Proxy se usa cuando se quiere controlar el acceso a un objeto. Puede actuar como intermediario para
        realizar tareas como control de acceso, gestión de recursos o retraso en la creación de objetos costosos.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class RealSubject {
    public function hacerOperacion() {
        return "Operación realizada";
    }
}

class Proxy {
    private $realSubject;

    public function hacerOperacion() {
        if (!$this->realSubject) {
            $this->realSubject = new RealSubject();
        }
        return $this->realSubject->hacerOperacion();
    }
}

$proxy = new Proxy();
echo $proxy->hacerOperacion();
?>
    </code></pre>

    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
