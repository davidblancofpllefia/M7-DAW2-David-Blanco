<?php
session_start();

class JocAdivinacio {
    private $numeroSecret;
    private $intents;

    public function __construct() {
        if (!isset($_SESSION['numeroSecret'])) {
            $_SESSION['numeroSecret'] = rand(1, 20);
            $_SESSION['intents'] = 0;
        }
        $this->numeroSecret = $_SESSION['numeroSecret'];
        $this->intents = $_SESSION['intents'];
    }

    public function getNumeroSecret() {
        return $this->numeroSecret;
    }

    public function getIntents() {
        return $this->intents;
    }

    public function incrementarIntents() {
        $this->intents++;
        $_SESSION['intents'] = $this->intents;
    }

    public function comprovar($num) {
        $this->incrementarIntents();
        if ($num < $this->numeroSecret) {
            return "El número és més gran.";
        } elseif ($num > $this->numeroSecret) {
            return "El número és més petit.";
        } else {
            session_destroy();
            return "Felicitat! Has endevinat el número en " . $this->intents . " intents.";
        }
    }
}

$joc = new JocAdivinacio();
$missatge = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['numero']) && is_numeric($_POST['numero'])) {
        $numero = (int)$_POST['numero'];
        $missatge = $joc->comprovar($numero);
    } else {
        $missatge = "Si us plau, introdueix un número vàlid.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc 1</title>
</head>
<body>
    <h1>Joc 1: Endevinar un número amb formulari i intents</h1>
    <form method="POST">
        <label for="numero">Introdueix un numero entre 1 i 20:</label>
        <input type="number" id="numero" name="numero" min="1" max="20" required>
        <button type="submit">Comprovar</button>
    </form>
    <a type="submit" href="../index.php" >Volver</a>
    <p><?php echo $missatge; ?></p>
</body>
</html>

