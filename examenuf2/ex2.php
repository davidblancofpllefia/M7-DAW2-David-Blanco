<?php
session_start();

class Llibre {
    public $titol;
    public $autor;
    public $any;

    function __construct($titol, $autor, $any) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->any = $any;
    }

    function mostrar() {
        return "Títol: $this->titol, Autor: $this->autor, Any: $this->any";
    }
}

$llibres = [];
if (isset($_SESSION['llibres_serialitzats'])) {
    $llibres = unserialize($_SESSION['llibres_serialitzats']);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titol = trim($_POST['titol'] ?? '');
    $autor = trim($_POST['autor'] ?? '');
    $any = $_POST['any'] ?? '';


    if (empty($titol) || empty($autor) || empty($any)) {
        $error = "Tots els camps són obligatoris.";
    } elseif (!is_numeric($any)) {
        $error = "L'any ha de ser un número.";
    } else {
        $nouLlibre = new Llibre($titol, $autor, $any);
        $llibres[] = $nouLlibre;
        $_SESSION['llibres_serialitzats'] = serialize($llibres);
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 2</title>
</head>
<body>
    <h2>Exercici 2</h2>

    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'><strong>Error:</strong> $error</p>";
    }
    ?>

    <form method="POST" action="ex2.php">
        <label for="titol">Títol:</label>
        <input type="text" id="titol" name="titol" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="any">Any de publicació:</label>
        <input type="number" id="any" name="any" required><br><br>

        <input type="submit" value="Afegir llibre">
    </form>

    <h2>Llista de llibres</h2>
    <?php if (!empty($llibres)): ?>
        <ul>
            <?php foreach ($llibres as $llibre): ?>
                <li><?= htmlspecialchars($llibre->mostrar()) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hi ha llibres afegits encara.</p>
    <?php endif; ?>
</body>
</html>
