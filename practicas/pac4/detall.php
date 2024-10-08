<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 4</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        "imatge2" => "https://lumiere-a.akamaihd.net/v1/images/p_deadpool_wolverine_snuggle_gen_v2_c251bde1.png",
        "imatge3" => "https://es.web.img3.acsta.net/img/3f/2e/3f2efc609e5e23d748f1d44231bf6b2f.jpg",
        "imatge4" => "https://www.mubis.es/media/users/12828/325713/posible-logo-oficial-para-deadpool-3-original.jpg"
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
        "imatge2" => "https://www.lebrija.es/export/sites/lebrija/.galleries/imagenes-eventos/DEL-REVES-PORTADA.jpg",
        "imatge3" => "https://imagenes.20minutos.es/files/image_990_556/uploads/imagenes/2024/07/18/del-reves-2-inside-out-2.jpeg",
        "imatge4" => "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgpY0tJkPJpPg_fI0tPZmUqchQj5bc1hXTNCefcvJ0ih0lW4ImxuqWKnnWN7pt7mwK9PbIOUxf3AqT2PsdKxr4Ike7SAlSqH3S98qsDEI83-H9cMYqpy2rttfE-3FfgkSvKnjjxPsCzrQHT9pkWmgG0LCIC7r5u4iMKF79M9H_uU6Mu2L3vK9iiA4957cs/s1600/inside-out-2.2.webp"
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
        "valoracio" => 3,
        "imatge2" => "https://img2.rtve.es/i/?w=1600&i=01719566831758.jpg",
        "imatge3" => "https://pics.filmaffinity.com/Gru_4_Mi_villano_favorito-551473536-large.jpg",
        "imatge4" => "https://img.rtve.es/imagenes/fotograma-gru-4-villano-favorito/01719566504393.jpg"
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
        "imatge2" => "https://hips.hearstapps.com/hmg-prod/images/reboot-spiderman-homecoming-1533191985.jpg?crop=0.5625xw:1xh;center,top&resize=1200:*",
        "imatge3" => "https://i.blogs.es/9d89b1/cartel-homecoming-spiderman/650_1200.jpg",
        "imatge4" => "https://wallpapers.com/images/featured/spider-man-homecoming-3ra4dpth4ip0ha5n.jpg"
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
        "imatge2" => "https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2023/07/26/16903611735943.jpg",
        "imatge3" => "https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2023/07/18/16896829116146.jpg",
        "imatge4" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_-2pu4m5VyW4E7jIWiXxORQUQdUdWQc8ywA&s"
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
        "imatge2" => "https://image.europafm.com/clipping/cmsimages01/2023/07/11/D9FB4137-D5F0-41C6-AA13-7E7BAA504095/margot-robbie-protagonista-pelicula-barbie_103.jpg?crop=1539,1154,x259,y0&width=1200&height=900&optimize=low&format=webply",
        "imatge3" => "https://media.revistagq.com/photos/64ae57646d65adfb0f3a6316/master/pass/pelicula-barbie-ken-ryan-gosling.jpeg",
        "imatge4" => "https://phantom-elmundo.unidadeditorial.es/3287d0ce05b1de53315291d36468b462/crop/0x0/1500x1000/resize/1200/f/webp/assets/multimedia/imagenes/2023/09/12/16945119224336.jpg"
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
        "imatge2" => "https://cdn-9.motorsport.com/images/amp/6l9zMqx0/s1000/archie-madekwe-and-david-harbo.jpg",
        "imatge3" => "https://sm.ign.com/t/ign_es/photo/default/df-05832-1691605472791_a24n.1080.jpg",
        "imatge4" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR27I_tJhmKIgfueK9pDytdB6LE5DQDRWTl0huAwf10lgV91D3F2HxvIiM0Ix-51C1l0KI&usqp=CAU"
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
        "imatge2" => "https://i.ytimg.com/vi/xSL4pV9lJcE/maxresdefault.jpg",
        "imatge3" => "https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2023/09/asesinos-luna-killers-flower-moon-3133788.jpg?tf=3840x",
        "imatge4" => "https://pics.filmaffinity.com/killers_of_the_flower_moon-638151511-large.jpg"
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
        "imatge2" => "https://fotografias.antena3.com/clipping/cmsimages02/2023/09/08/EB7F4770-0484-4367-99CC-F9E1EE2A0564/monja_103.jpg?crop=960,720,x241,y0&width=1200&height=900&optimize=low&format=webply",
        "imatge3" => "https://imagenes.20minutos.es/files/image_1920_1080/uploads/imagenes/2023/09/15/la-monja-ii.jpeg",
        "imatge4" => "https://i0.wp.com/eldiadeescobar.com.ar/wp-content/uploads/2023/09/La-monja-2.jpg?fit=1000%2C625&ssl=1"
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
        "imatge2" => "https://lumiere-a.akamaihd.net/v1/images/image_20a410a4.jpeg?region=0,0,640,480",
        "imatge3" => "https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2023/07/12/16891762471389.jpg",
        "imatge4" => "https://www.gamereactor.es/media/66/elemental_4056603b.jpg"
 
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
        <a href="index.php" class="btn-back mb-3">Tornar a la cartellera</a>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicadores -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Slides del carrusel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo htmlspecialchars($pelicula['imatge2'], ENT_QUOTES, 'UTF-8'); ?>" class="d-block w-100" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="<?php echo htmlspecialchars($pelicula['imatge3'], ENT_QUOTES, 'UTF-8'); ?>" class="d-block w-100" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="<?php echo htmlspecialchars($pelicula['imatge4'], ENT_QUOTES, 'UTF-8'); ?>" class="d-block w-100" alt="Slide 3">
    </div>
  </div>

  <!-- Controles prev y next -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        

<script src="https://kit.fontawesome.com/01d0323942.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>