<?php
session_start();

if (isset($_POST['recargar'])) {
    session_unset();
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

if (!isset($_SESSION['preguntes_serialitzades'])) {
    $preguntes = [
        new Pregunta("Capital de França?", "paris"),
        new Pregunta("Resultat de 2 + 2?", "4"),
        new Pregunta("Color del cel en un dia clar?", "blau")
    ];
    $_SESSION['preguntes_serialitzades'] = serialize($preguntes);
    $_SESSION['index_pregunta'] = 0;
    $_SESSION['missatge'] = '';
}

$preguntes = unserialize($_SESSION['preguntes_serialitzades']);
$index = $_SESSION['index_pregunta'];
$missatge = $_SESSION['missatge'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resposta'])) {
    $respostaUsuari = strtolower(trim($_POST['resposta']));
    $respostaCorrecta = strtolower($preguntes[$index]->resposta);

    if ($respostaUsuari === $respostaCorrecta) {
        $missatge = "Correcte";
    } else {
        $missatge = "Incorrecte" ;
    }

    $_SESSION['missatge'] = $missatge;

    if ($index + 1 < count($preguntes)) {
        $_SESSION['index_pregunta']++;
    } else {
        $_SESSION['finalitzat'] = true;
    }

    header("Location: ex4.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 4</title>
</head>
<body>
    <h2>Exercici 4</h2>

    <?php if (!empty($missatge)): ?>
        <p><strong><?= $missatge ?></strong></p>
    <?php endif; ?>

    <?php if (!isset($_SESSION['finalitzat'])): ?>
        <form method="POST" action="ex4.php">
            <p><strong>Pregunta <?= $index + 1 ?>:</strong> <?= $preguntes[$index]->mostrar() ?></p>
            <input type="text" name="resposta" required>
            <input type="submit" value="Enviar">
        </form>
    <?php else: ?>
        <p><strong>Has respost totes les preguntes. Gràcies!</strong></p>
    <?php endif; ?>

    <form method="POST" action="ex4.php">
        <input type="hidden" name="recargar" value="1">
        <input type="submit" value="Reiniciar">
    </form>
</body>
</html>
