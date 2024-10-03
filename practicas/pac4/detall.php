<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$pelicules = [
    [
        "nom" => "Deadpool y Lobezno",
        "imatge" => "https://www.ocinemagic.es//images/pelicules/6764.jpg",
        "horaris" => ["14:00", "16:30", "19:00", "21:30"],
        "sinopsi" => "Una emocionant aventura per salvar el món.",
        "durada" => "127 min",
        "director" => "Shawn Levy",
        "repartiment" => "Ryan Reynolds, Hugh Jackman, Emma Corrin, Morena Baccarin",
        "qualificacio" => "+18",
        "genere" => "Superherois",
        "trailer" => "trailer.php?id=1", 
        "valoracio" => 4, 
    ],
    [
        "nom" => "Del Revés 2",
        "imatge" => "https://www.ocinemagic.es//images/pelicules/6732.jpg",
        "horaris" => ["15:00", "17:30", "20:00"],
        "sinopsi" => "DEL REVÉS 2 (INSIDE OUT 2), de Disney i Pixar, torna a la ment de Riley, ara adolescent...",
        "durada" => "96 min",
        "director" => "Kelsey Mann",
        "repartiment" => "Javier Martínez, Paula Fernández",
        "qualificacio" => "Apta",
        "genere" => "Animació",
        "trailer" => "trailer.php?id=2", 
        "valoracio" => 4, 
    ],
    [
        "nom" => "Gru 4 - Mi Villano Favorito",
        "imatge" => "https://www.ocinemagic.es//images/pelicules/6839.jpg",
        "horaris" => ["14:00", "15:30", "18:00"],
        "sinopsi" => "En Gru s'haurà d'enfrontar a la seva nova nèmesi Maxime Le Mal...",
        "durada" => "94 min",
        "director" => "Chris Renaud",
        "repartiment" => "Javier Martínez, Paula Fernández",
        "qualificacio" => "Apta",
        "genere" => "Animació",
        "trailer" => "trailer.php?id=3", 
        "valoracio" => 3, // Nueva valoración entera
    ],
    [
        "nom" => "Spider-Man: Homecoming",
        "imatge" => "https://www.ocinemagic.es//images/pelicules/7042.jpg",
        "horaris" => ["17:00", "18:30", "21:00"],
        "sinopsi" => "Un jove Peter Parker/Spider-Man qui va fer el seu debut a CAPITÀ AMÈRICA: CIVIL WAR...",
        "durada" => "133 min",
        "director" => "Jon Watts",
        "repartiment" => "Tom Holland, Robert Downey Jr., Marisa Tomei, Michael Keaton",
        "qualificacio" => "7 anys",
        "genere" => "Acció",
        "trailer" => "trailer.php?id=4", 
        "valoracio" => 5, 
    ],
    [
        "nom" => "Oppenheimer",
        "imatge" => "https://www.guiadecadiz.com/sites/default/files/Pelicula/oppenheimer-cartel-10597.jpg",
        "horaris" => ["14:00", "17:00", "20:00"],
        "sinopsi" => "La història del físic J. Robert Oppenheimer i el desenvolupament de la bomba atòmica.",
        "durada" => "180 min",
        "director" => "Christopher Nolan",
        "repartiment" => "Cillian Murphy, Emily Blunt, Matt Damon",
        "qualificacio" => "+12",
        "genere" => "Drama",
        "trailer" => "trailer.php?id=5", 
        "valoracio" => 5, 
    ],
    [
        "nom" => "Barbie",
        "imatge" => "https://www.lahiguera.net/cinemania/pelicula/10297/barbie-cartel-11222.jpg",
        "horaris" => ["15:00", "18:00", "21:00"],
        "sinopsi" => "Barbie abandona el món de fantasia de Barbie Land per descobrir el món real.",
        "durada" => "114 min",
        "director" => "Greta Gerwig",
        "repartiment" => "Margot Robbie, Ryan Gosling, America Ferrera",
        "qualificacio" => "Apta",
        "genere" => "Comèdia",
        "trailer" => "trailer.php?id=6", 
        "valoracio" => 4, 
    ],
    [
        "nom" => "Gran Turismo",
        "imatge" => "https://www.lahiguera.net/cinemania/pelicula/10569/gran_turismo-cartel-11087.jpg",
        "horaris" => ["15:45", "18:45", "21:45"],
        "sinopsi" => "Un adolescent gamer utilitza les seves habilitats de videojoc per convertir-se en pilot de cotxes.",
        "durada" => "135 min",
        "director" => "Neill Blomkamp",
        "repartiment" => "David Harbour, Orlando Bloom, Archie Madekwe",
        "qualificacio" => "Apta",
        "genere" => "Acció",
        "trailer" => "trailer.php?id=7", 
        "valoracio" => 2, 
    ],
    [
        "nom" => "Los Asesinos de la Luna",
        "imatge" => "https://www.ecartelera.com/carteles/13000/13062/003_m.jpg",
        "horaris" => ["14:15", "18:15", "21:15"],
        "sinopsi" => "Basada en fets reals, la història de l'assassinat d'indians Osage i les investigacions que van seguir.",
        "durada" => "206 min",
        "director" => "Martin Scorsese",
        "repartiment" => "Leonardo DiCaprio, Robert De Niro, Lily Gladstone",
        "qualificacio" => "+12",
        "genere" => "Drama",
        "trailer" => "trailer.php?id=8", 
        "valoracio" => 4, 
    ],
    [
        "nom" => "La Monja II",
        "imatge" => "https://www.lahiguera.net/cinemania/pelicula/10822/la_monja_ii-cartel-11232.jpg",
        "horaris" => ["14:00", "16:30", "19:00"],
        "sinopsi" => "La història continua amb la germana Irene que s'enfronta a una nova amenaça demoníaca.",
        "durada" => "110 min",
        "director" => "Michael Chaves",
        "repartiment" => "Taissa Farmiga, Bonnie Aarons, Storm Reid",
        "qualificacio" => "+16",
        "genere" => "Horror",
        "trailer" => "trailer.php?id=9", 
        "valoracio" => 1, 
    ],
    [
        "nom" => "Elemental",
        "imatge" => "https://pics.filmaffinity.com/Elemental-546355909-large.jpg",
        "horaris" => ["13:30", "16:00", "18:30"],
        "sinopsi" => "Una història sobre el món dels elements, on el foc, l'aigua, la terra i l'aire coexisteixen.",
        "durada" => "102 min",
        "director" => "Peter Sohn",
        "repartiment" => "Leah Lewis, Mamoudou Athie",
        "qualificacio" => "Apta",
        "genere" => "Animació",
        "trailer" => "trailer.php?id=10", 
        "valoracio" => 4,
        "imatge2" => "https://lumiere-a.akamaihd.net/v1/images/p_deadpool_wolverine_snuggle_gen_v2_c251bde1.png",   
    ]
];



// Obtener el ID de la película seleccionada mediante el parámetro GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verificar que el ID sea válido
if ($id > 0 && $id <= count($pelicules)) {
    // Obtener la película según el ID
    $pelicula = $pelicules[$id - 1];
} else {
    // Si no es válido, mostrar un mensaje de error
    echo "<p>Pel·lícula no trobada.</p>";
    exit;
}

?>
<div class="detall-pelicula">
    <h1><?php echo $pelicula["nom"]; ?></h1>
    <hr>

    <div class="detall-container">
        <!-- Contenedor para imagen y tráiler -->
        <div class="detall-imatge">
            <img src="<?php echo $pelicula["imatge"]; ?>">
            <a href="<?php echo $pelicula["trailer"]; ?>" class="btn">Veure tràiler</a>
        </div>

        <!-- Contenedor para la información de la película -->
        <div class="detall-informacio">
            <p> <?php echo $pelicula["sinopsi"]; ?></p>
            <p><strong>Durada:</strong> <?php echo $pelicula["durada"]; ?></p>
            <p><strong>Director:</strong> <?php echo $pelicula["director"]; ?></p>
            <p><strong>Actors:</strong> <?php echo $pelicula["repartiment"]; ?></p>
            <p><strong>Classificació:</strong> <?php echo $pelicula["qualificacio"]; ?></p>
            <p><strong>Gènere:</strong> <?php echo $pelicula["genere"]; ?></p>
            
            <!-- Nuevo apartado de horarios con estilo similar al que has mostrado -->
            <div class="horaris">
                <p><strong>Horaris</strong></p>
                <div class="horaris-buttons">
                    <?php foreach ($pelicula["horaris"] as $index => $horari): ?>
                        <span class="hora <?php echo $index == 0 ? 'dark' : 'red'; ?>"><?php echo $horari; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="star-rating my-3">
            <span>Valoració:</span>
            <?php
                // Renderiza las estrellas según la puntuación
                $valoracio = $pelicula['valoracio'];
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $valoracio) {
                        echo '<i class="fa-solid fa-star" style="color: rgba(194, 194, 22, 0.575);"></i>';
                    } else {
                        echo '<i class="fa-solid fa-star" style="color: gray;"></i>'; // Estrellas vacías
                    }
                }
            ?>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo $pelicula["imatge2"]; ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        

<script src="https://kit.fontawesome.com/01d0323942.js" crossorigin="anonymous"></script>
</body>
</html>