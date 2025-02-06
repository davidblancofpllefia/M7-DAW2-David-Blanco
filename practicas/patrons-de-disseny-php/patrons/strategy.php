<?php

include '../header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrón Strategy</h1>
    
    <p>
        El patrón <b>Strategy</b> permite definir una familia de algoritmos, encapsular cada uno en una clase separada 
        y hacerlos intercambiables en tiempo de ejecución. Este patrón es útil cuando tienes múltiples formas de realizar 
        una tarea y deseas cambiar entre ellas sin modificar el código del cliente.
    </p>

    <h3>Ejemplo en PHP</h3>
    
    <pre>
    <code>
    <?php

    interface EstrategiaPago {
        public function pagar($cantidad);
    }


    class PagoTarjeta implements EstrategiaPago {
        public function pagar($cantidad) {
            return "Pagando $cantidad € con tarjeta de crédito.";
        }
    }


    class PagoPayPal implements EstrategiaPago {
        public function pagar($cantidad) {
            return "Pagando $cantidad € con PayPal.";
        }
    }


    class CarritoCompra {
        private $metodoPago;

        public function setMetodoPago(EstrategiaPago $metodoPago) {
            $this->metodoPago = $metodoPago;
        }

        public function procesarPago($cantidad) {
            return $this->metodoPago->pagar($cantidad);
        }
    }


    $carrito = new CarritoCompra();


    $carrito->setMetodoPago(new PagoTarjeta());
    echo $carrito->procesarPago(100) . "<br>";


    $carrito->setMetodoPago(new PagoPayPal());
    echo $carrito->procesarPago(50);
    ?>
    </code>
    </pre>

</div>
