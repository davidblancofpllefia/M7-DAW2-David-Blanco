<?php
session_start();


function crearBaralla() {
    $colors = ["vermell", "blau", "groc", "verd"];
    $valors = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+2", "Reverse", "Skip"];
    $baralla = [];

    foreach ($colors as $color) {
        foreach ($valors as $valor) {
            $baralla[] = ["color" => $color, "valor" => $valor];
            if ($valor !== "0") {
                $baralla[] = ["color" => $color, "valor" => $valor]; 
            }
        }
    }


    $especials = ["Wild", "Wild +4"];
    foreach ($especials as $especial) {
        for ($i = 0; $i < 4; $i++) {
            $baralla[] = ["color" => "negre", "valor" => $especial];
        }
    }

    return $baralla;
}


function barrejarBaralla(&$baralla) {
    shuffle($baralla);
}


function assignarCartes(&$baralla, $numJugadors, $cartesPerJugador) {
    $jugadors = [];

    for ($i = 0; $i < $numJugadors; $i++) {
        $jugadors[$i] = array_splice($baralla, 0, $cartesPerJugador);
    }

    return $jugadors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numJugadors = (int)$_POST['num_jugadors'];
    $cartesPerJugador = (int)$_POST['cartes_per_jugador'];


    $baralla = crearBaralla();
    barrejarBaralla($baralla);


    $jugadors = assignarCartes($baralla, $numJugadors, $cartesPerJugador);


    $cartaInicial = array_shift($baralla);


    $_SESSION['jugadors'] = $jugadors;
    $_SESSION['carta_inicial'] = $cartaInicial;
    $_SESSION['baralla'] = $baralla;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc UNO</title>
</head>
<body>
    <?php if (!isset($_SESSION['jugadors'])): ?>
        <form method="POST">
            <label for="num_jugadors">Nombre de jugadors:</label>
            <input type="number" id="num_jugadors" name="num_jugadors" min="2" max="10" required>

            <label for="cartes_per_jugador">Nombre de cartes per jugador:</label>
            <input type="number" id="cartes_per_jugador" name="cartes_per_jugador" min="1" max="10" required>

            <button type="submit">Inicia la partida</button>
        </form>
    <?php else: ?>
        <h2>Partida en marxa</h2>

        <h3>Carta inicial sobre la taula:</h3>
        <p><?php echo $_SESSION['carta_inicial']['color'] . ' ' . $_SESSION['carta_inicial']['valor']; ?></p>

        <?php foreach ($_SESSION['jugadors'] as $index => $ma): ?>
            <h4>Jugador <?php echo $index + 1; ?>:</h4>
            <ul>
                <?php foreach ($ma as $carta): ?>
                    <li><?php echo $carta['color'] . ' ' . $carta['valor']; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
