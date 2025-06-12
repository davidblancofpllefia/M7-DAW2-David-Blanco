<?php
session_start();

if (isset($_POST['recargar'])) {
    session_destroy();
    session_start();
}

class Pregunta {
    public $enunciat;
    public $resposta;

    function __construct($enunciat, $resposta) {
        $this->enunciat = $enunciat;
        $this->resposta = $resposta;
    }
    
    function mostrar() {
        return $this->enunciat;
    }
}

if (!isset($_SESSION['preguntes'])) {
    $preguntes = [
        new Pregunta("Capital de França?", "paris"),
        new Pregunta("Resultat de 2 + 2?", "4"),
        new Pregunta("Color del cel en un dia clar?", "blau")
    ];
    $_SESSION['preguntes'] = serialize($preguntes);
    $_SESSION['index'] = 0;
    $_SESSION['missatge'] = '';
}

$preguntes = unserialize($_SESSION['preguntes']);
$index = $_SESSION['index'];
$missatge = $_SESSION['missatge'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['resposta'])) {
    $resposta = strtolower(trim($_POST['resposta']));
    $correcta = strtolower($preguntes[$index]->resposta);

    if ($resposta == $correcta) {
        $_SESSION['missatge'] = "Correcte";
    } else {
        $_SESSION['missatge'] = "Incorrecte";
    }

    if ($index + 1 < count($preguntes)) {
        $_SESSION['index']++;
    } else {
        $_SESSION['finalitzat'] = true;
    }

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 4 Simplificat</title>
</head>
<body>
    <h2>Exercici 4</h2>

    <?php if ($missatge != '') echo "<p><b>$missatge</b></p>"; ?>

    <?php if (!isset($_SESSION['finalitzat'])): ?>
        <form method="post">
            <p><b>Pregunta <?= $index + 1 ?>:</b> <?= $preguntes[$index]->mostrar() ?></p>
            <input type="text" name="resposta" required>
            <input type="submit" value="Enviar">
        </form>
    <?php else: ?>
        <p><b>Has respost totes les preguntes. Gràcies!</b></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="recargar" value="1">
        <input type="submit" value="Reiniciar">
    </form>
</body>
</html>

