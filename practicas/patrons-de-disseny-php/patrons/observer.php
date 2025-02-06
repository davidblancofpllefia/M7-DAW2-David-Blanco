<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Observador</h1>
    <p class="text-center">
        El patrón Observador define una dependencia de uno a muchos entre objetos, de modo que cuando un objeto cambia de estado, todos sus dependientes son notificados automáticamente.
    </p>

    <h3 class="mt-4">Explicación teórica</h3>
    <p>
        El patrón Observador es útil cuando un objeto (el sujeto) necesita notificar a otros objetos (los observadores) sobre cambios de estado sin conocer quién o cuántos son esos objetos.
    </p>
    <p>
        Este patrón promueve un diseño desacoplado, ya que el sujeto no necesita saber nada acerca de los observadores, solo tiene que notificarles de los cambios.
    </p>

    <h3 class="mt-4">Ejemplo de código PHP</h3>
    <pre><code class="php">
<?php
class Subject {
    private $observers = [];

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function notifyObservers($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}


class Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update($message) {
        echo $this->name . " recibió el mensaje: " . $message . "<br>";
    }
}


$subject = new Subject();
$observer1 = new Observer("Observador 1");
$observer2 = new Observer("Observador 2");

$subject->addObserver($observer1);
$subject->addObserver($observer2);

$subject->notifyObservers("¡Cambio de estado detectado!");
?>
    </code></pre>

    <p class="mt-4 text-center">
        En este ejemplo, el sujeto notifica a todos sus observadores cuando ocurre un cambio. Cada observador recibe el mensaje y lo procesa.
    </p>
    
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>


