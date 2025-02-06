<?php
session_start();
if (isset($_POST['recargar'])) {
    session_unset(); 
    session_destroy(); 
    session_start(); 
}

class Factura {
    public $client;
    public $producte;
    public $quantitat;
    public $preuUnitari;

    function __construct($client, $producte, $quantitat, $preuUnitari) {
        $this->client = $client;
        $this->producte = $producte;
        $this->quantitat = $quantitat;
        $this->preuUnitari = $preuUnitari;
    }

    function calcularTotal() {
        return $this->quantitat * $this->preuUnitari;
    }

    function aplicarDescompte($percentatge) {
        $total = $this->calcularTotal();
        $descompte = ($total * $percentatge) / 100;
        return $total - $descompte;
    }

    function mostrarFactura() {
        $total = $this->calcularTotal();
        return [
            'client' => $this->client,
            'producte' => $this->producte,
            'quantitat' => $this->quantitat,
            'preuUnitari' => $this->preuUnitari,
            'total' => $total
        ];
    }
}

if (!isset($_SESSION['factures'])) {
    $clients = ["Joan Pérez", "Maria Garcia", "Anna Sánchez", "Miquel López", "Sergi Torres"];
    $productes = ["Cafetera", "Portàtil", "Smartphone", "Auriculars", "Televió"];
    $factures = [];

    for ($i = 0; $i < 5; $i++) {
        $client = $clients[array_rand($clients)];
        $producte = $productes[array_rand($productes)];
        $quantitat = rand(1, 5);
        $preuUnitari = rand(10, 100) / 10;  
        $factura = new Factura($client, $producte, $quantitat, $preuUnitari);
        $factures[] = $factura->mostrarFactura();
    }

    $indexDescompte = array_rand($factures);
    $percentatgeDescompte = 10; 
    $factures[$indexDescompte]['totalAmbDescompte'] = $factures[$indexDescompte]['total'] * (1 - $percentatgeDescompte / 100);

    $_SESSION['factures'] = $factures;
}

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc 4: Factures amb descompte</title>
</head>
<body>

<h2>Joc 4: Factures amb descompte</h2>

<table border="1">
    <tr>
        <th>Client</th>
        <th>Producte</th>
        <th>Quantitat</th>
        <th>Preu Unitari</th>
        <th>Total</th>
        <th>Total amb Descompte</th>
    </tr>

    <?php foreach ($_SESSION['factures'] as $factura): ?>
        <tr>
            <td><?= $factura['client'] ?></td>
            <td><?= $factura['producte'] ?></td>
            <td><?= $factura['quantitat'] ?></td>
            <td><?= number_format($factura['preuUnitari'], 2) ?> €</td>
            <td><?= number_format($factura['total'], 2) ?> €</td>
            <td>
                <?php
                if (isset($factura['totalAmbDescompte'])) {
                    echo number_format($factura['totalAmbDescompte'], 2) . " €";
                } else {
                    echo "-";
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

