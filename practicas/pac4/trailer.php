<?php
// Array simplificado de películas
$pelicules = [
    [
        "nom" => "Deadpool y Lobezno",
        "trailer" => "https://www.youtube.com/embed/tTM5weeCFvQ" 
    ],
    [
        "nom" => "Del Revés 2",
        "trailer" => "https://www.youtube.com/embed/ahogVfXzqs4"
    ],
    [
        "nom" => "Gru 4 - Mi Villano Favorito",
        "trailer" => "https://www.youtube.com/embed/zUFt9_WOoPc"
    ],
    [
        "nom" => "Spider-Man: Homecoming",
        "trailer" => "https://www.youtube.com/embed/grusgXCahH8"
    ],
    [
        "nom" => "Oppenheimer",
        "trailer" => "https://www.youtube.com/embed/JpUd4BS7yI0"
    ],
    [
        "nom" => "Barbie",
        "trailer" => "https://www.youtube.com/embed/vsJgLu3PIno"
    ],
    [
        "nom" => "Gran Turismo",
        "trailer" => "https://www.youtube.com/embed/f5IRCGKZgJY"
    ],
    [
        "nom" => "Los Asesinos de la Luna",
        "trailer" => "https://www.youtube.com/embed/HyyWd2XI1EE"
    ],
    [
        "nom" => "La Monja II",
        "trailer" => "https://www.youtube.com/embed/pdrPvHulyUY"
    ],
    [
        "nom" => "Elemental",
        "trailer" => "https://www.youtube.com/embed/Rp20svf0qpA"
    ]
];

// Recoger el ID de la película desde la URL (si no se proporciona, será 1 por defecto)
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1; // Cambiamos el valor por defecto a 1

// Asegurarse de que el ID es válido y la película existe en el array
if ($id < 1 || $id > count($pelicules)) {
    echo "Pel·lícula no trobada.";
    exit;
}

// Obtener los datos de la película correspondiente al ID
$pelicula = $pelicules[$id - 1]; // Restamos 1 porque los índices del array empiezan en 0
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tràiler de <?php echo $pelicula["nom"]; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .video-container {
            width: 80%;
            max-width: 800px;
        }

        .btn-back {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #d32f2f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>

    <h1>Tràiler de <?php echo $pelicula["nom"]; ?></h1>

    <div class="video-container">
        <!-- Vídeo del tràiler que se reproduce automáticamente -->
        <iframe width="100%" height="450" src="<?php echo $pelicula["trailer"]; ?>?autoplay=1" 
            title="Tràiler de <?php echo $pelicula['nom']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

    <!-- Botón para regresar a la cartelera (index.php) -->
    <a href="peliculas.php" class="btn-back">Tornar a la cartellera</a>

</body>
</html>
