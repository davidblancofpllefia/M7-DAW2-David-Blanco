<?php
include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Singleton</h1>
    <p class="text-center">
        El patrón Singleton asegura que una clase tenga una única instancia y proporciona un punto de acceso global a ella.
        Esto puede ser útil cuando necesitamos un control global sobre un recurso compartido, como una conexión a base de datos.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Singleton restringe la instanciación de una clase a un solo objeto. Esto es útil cuando se necesita exactamente una instancia de una clase
        para coordinar acciones a través del sistema.
    </p>
    <p>
        Para implementar este patrón, la clase debe contener una instancia estática de sí misma y un método público para acceder a esta instancia.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Singleton {

    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function doSomething() {
        return "¡Estoy haciendo algo!";
    }
}

$singleton = Singleton::getInstance();
echo $singleton->doSomething();
?>
    </code></pre>

    <p class="mt-4 text-center">
        Este es un ejemplo de cómo implementar el patrón Singleton en PHP. Solo se crea una instancia de la clase, incluso si se invoca múltiples veces el método <code>getInstance()</code>.
    </p>
    
    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>
