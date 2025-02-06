<?php
session_start();

class Usuari {
    public $nom;
    public $edat;
    public $correu;

    function __construct($nom, $edat, $correu) {
        $this->nom = $nom;
        $this->edat = $edat;
        $this->correu = $correu;
    }

    function validarDades() {
        if (!is_numeric($this->edat)) {
            return "L'edat ha de ser un número vàlid.";
        }

        return "Les dades són vàlides.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $edat = $_POST['edat'];
    $correu = $_POST['correu'];

    $usuari = new Usuari($nom, $edat, $correu);

    $missatgeValidacio = $usuari->validarDades();

    if ($missatgeValidacio == "Les dades són vàlides.") {
        $_SESSION['usuari'] = [
            'nom' => $usuari->nom,
            'edat' => $usuari->edat,
            'correu' => $usuari->correu
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc 3</title>
</head>
<body>
    <h2>Joc 3: Formulari d'inscripció amb validació</h2>

    <form action="joc3.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="edat">Edat:</label>
        <input type="number" id="edat" name="edat" required><br><br>

        <label for="correu">Correu electrònic:</label>
        <input type="text" id="correu" name="correu" required><br><br>

        <input type="submit" value="Envia">
    </form>

    <?php
    if (isset($missatgeValidacio)) {
        echo "<h3>$missatgeValidacio</h3>";
    }

    if (isset($_SESSION['usuari'])) {
        echo "<h3>L'usuari ha estat creat correctament:</h3>";
        echo "Nom: " . $_SESSION['usuari']['nom'] . "<br>";
        echo "Edat: " . $_SESSION['usuari']['edat'] . "<br>";
        echo "Correu: " . $_SESSION['usuari']['correu'] . "<br>";
    }
    ?>
</body>
</html>



