<?php
session_start();

class Producte {
    private $nom;
    private $preu;

    public function __construct($nom, $preu) {
        $this->nom = $nom;
        $this->preu = $preu;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPreu() {
        return $this->preu;
    }
}

class CarretCompra {
    private $productes = [];

    public function afegirProducte(Producte $producte) {
        $this->productes[] = $producte;
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productes as $producte) {
            $total += $producte->getPreu();
        }
        return $total;
    }

    public function mostrarProductes() {
        foreach ($this->productes as $producte) {
            echo "<tr>
                    <td>" . $producte->getNom() . "</td>
                    <td>" . number_format($producte->getPreu(), 2) . "€</td>
                  </tr>";
        }
    }

    public function getProductes() {
        return $this->productes;
    }

    public function buidarCarret() {
        $this->productes = [];
    }
}

if (!isset($_SESSION['carret']) || !is_string($_SESSION['carret'])) {
    $_SESSION['carret'] = serialize(new CarretCompra());
}

$carret = unserialize($_SESSION['carret']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom'], $_POST['preu']) && !empty($_POST['nom']) && is_numeric($_POST['preu'])) {
        $nom = $_POST['nom'];
        $preu = (float) $_POST['preu'];

        $producte = new Producte($nom, $preu);
        $carret->afegirProducte($producte);

        $_SESSION['carret'] = serialize($carret);
    }

    if (isset($_POST['buidar'])) {
        $carret->buidarCarret();
        $_SESSION['carret'] = serialize($carret);
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Afegir Productes al Carret</h1>

        <form method="POST" class="text-center mt-4">
            <div class="form-group">
                <label for="nom">Nom del Producte:</label>
                <input type="text" id="nom" name="nom" class="form-control w-50 mx-auto" required>
            </div>
            <div class="form-group">
                <label for="preu">Preu del Producte (€):</label>
                <input type="number" id="preu" name="preu" class="form-control w-50 mx-auto" step="0.01" min="0" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Afegir Producte</button>
        </form>

        <form method="POST" class="text-center mt-4">
            <button type="submit" name="buidar" class="btn btn-danger">Buidar Carret</button>
        </form>

        <hr>

        <h3>Productes al Carret:</h3>

        <?php
        if (count($carret->getProductes()) > 0) {
            echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Nom del Producte</th>
                            <th>Preu (€)</th>
                        </tr>
                    </thead>
                    <tbody>";

            $carret->mostrarProductes();

            $total = $carret->calcularTotal();
            echo "</tbody></table>";
            echo "<h4>Total de la compra: " . number_format($total, 2) . "€</h4>";
        } else {
            echo "<p>El carret està buit.</p>";
        }
        ?>
        <a type="submit" href="../index.php">Volver</a>
    </div>
</body>
</html>

