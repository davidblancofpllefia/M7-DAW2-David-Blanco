<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a la teva casa de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $cognoms = htmlspecialchars($_POST['cognoms']);


    $casas_info = [
        "Gryffindor" => [
            "background_color" => "#740001",
            "text_color" => "#FFD700",
            "welcome_message" => "Coratge, valor i determinació. Benvingut a Gryffindor, $nom $cognoms!",
            "message_background" => "#D3A625",
            "image" => "https://1000marcas.net/wp-content/uploads/2021/11/Gryffindor-Logo.png"
        ],
        "Hufflepuff" => [
            "background_color" => "#FFDB00",
            "text_color" => "#60605B",
            "welcome_message" => "Lleialtat, paciència i treball dur. Benvingut a Hufflepuff, $nom $cognoms!",
            "message_background" => "#EEE117",
            "image" => "https://c3.klipartz.com/pngpicture/903/648/sticker-png-hufflepuff-logo-badge-print-thumbnail.png"
        ],
        "Ravenclaw" => [
            "background_color" => "#0E1A40",
            "text_color" => "#946B2D",
            "welcome_message" => "Intel·ligència, creativitat i saviesa. Benvingut a Ravenclaw, $nom $cognoms!",
            "message_background" => "#5D5D5D",
            "image" => "https://e7.pngegg.com/pngimages/585/130/png-clipart-ravenclaw-illustration-harry-potter-sorting-hat-helena-ravenclaw-ravenclaw-house-hogwarts-horned-icon-logo-helga-hufflepuff.png"
        ],
        "Slytherin" => [
            "background_color" => "#1A472A",
            "text_color" => "#AAAAAA",
            "welcome_message" => "Ambició, astúcia i lideratge. Benvingut a Slytherin, $nom $cognoms!",
            "message_background" => "#5D5D5D",
            "image" => "https://upload.wikimedia.org/wikipedia/commons/3/34/Slytherin.png"
        ]
    ];


    $casas = array_keys($casas_info);
    $casa_seleccionada = $casas[array_rand($casas)];

    $color_fons = $casas_info[$casa_seleccionada]['background_color'];
    $color_text = $casas_info[$casa_seleccionada]['text_color'];
    $missatge_benvinguda = $casas_info[$casa_seleccionada]['welcome_message'];
    $color_missatge = $casas_info[$casa_seleccionada]['message_background'];
    $escut_casa = $casas_info[$casa_seleccionada]['image'];


    echo "<style>
            body {
                background-color: $color_fons;
                color: $color_text;
            }
            .welcome-message {
                background-color: $color_missatge;
                color: $color_text;
                padding: 20px;
                border-radius: 10px;
            }
          </style>";
?>

<div class="container text-center">
    <h1>¡Benvingut a <?php echo $casa_seleccionada; ?>!</h1>
    <div class="welcome-message mt-4">
        <?php echo $missatge_benvinguda; ?>
    </div>
    <div class="mt-4">
        <img src="<?php echo $escut_casa; ?>" alt="Escut de <?php echo $casa_seleccionada; ?>" class="img-fluid" style="max-width: 200px;">
    </div>
</div>

<?php
} else {
    echo "<div class='container text-center'><h1>No s'han enviat dades correctament.</h1></div>";
}
?>

</body>
</html>
