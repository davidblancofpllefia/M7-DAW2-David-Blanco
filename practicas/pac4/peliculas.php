<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="font-weight-light text-danger">Cartellera</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $pelicules = [
                    [
                        "nom" => "Deadpool y Lobezno",
                        "imatge" => "https://www.ocinemagic.es/images/pelicules/6764.jpg",
                        "horaris" => ["14:00", "16:30", "19:00", "21:30"],
                        "trailer" => "trailer.php?id=1",
                        "detall" => "detall.php?id=1"
                    ],
                    [
                        "nom" => "Del Revés 2",
                        "imatge" => "https://www.ocinemagic.es/images/pelicules/6732.jpg",
                        "horaris" => ["15:00", "17:30", "20:00"],
                        "trailer" => "trailer.php?id=2",
                        "detall" => "detall.php?id=2"
                    ],
                    [
                        "nom" => "Gru 4 - Mi Villano Favorito",
                        "imatge" => "https://www.ocinemagic.es/images/pelicules/6839.jpg",
                        "horaris" => ["14:00", "15:30", "18:00"],
                        "trailer" => "trailer.php?id=3",
                        "detall" => "detall.php?id=3"
                    ],
                    [
                        "nom" => "Spider-Man: Homecoming",
                        "imatge" => "https://www.ocinemagic.es/images/pelicules/7042.jpg",
                        "horaris" => ["17:00", "18:30", "21:00"],
                        "trailer" => "trailer.php?id=4",
                        "detall" => "detall.php?id=4"
                    ],
                    [
                        "nom" => "Oppenheimer",
                        "imatge" => "https://www.guiadecadiz.com/sites/default/files/Pelicula/oppenheimer-cartel-10597.jpg",
                        "horaris" => ["14:00", "17:00", "20:00"],
                        "trailer" => "trailer.php?id=5",
                        "detall" => "detall.php?id=5"
                    ],
                    [
                        "nom" => "Barbie",
                        "imatge" => "https://www.lahiguera.net/cinemania/pelicula/10297/barbie-cartel-11222.jpg",
                        "horaris" => ["15:00", "18:00", "21:00"],
                        "trailer" => "trailer.php?id=6",
                        "detall" => "detall.php?id=6"
                    ],
                    [
                        "nom" => "Gran Turismo",
                        "imatge" => "https://www.lahiguera.net/cinemania/pelicula/10569/gran_turismo-cartel-11087.jpg",
                        "horaris" => ["15:45", "18:45", "21:45"],
                        "trailer" => "trailer.php?id=7",
                        "detall" => "detall.php?id=7"
                    ],
                    [
                        "nom" => "Los Asesinos de la Luna",
                        "imatge" => "https://www.ecartelera.com/carteles/13000/13062/003_m.jpg",
                        "horaris" => ["14:15", "18:15", "21:15"],
                        "trailer" => "trailer.php?id=8",
                        "detall" => "detall.php?id=8"
                    ],
                    [
                        "nom" => "La Monja II",
                        "imatge" => "https://www.lahiguera.net/cinemania/pelicula/10822/la_monja_ii-cartel-11232.jpg",
                        "horaris" => ["14:00", "16:30", "19:00"],
                        "trailer" => "trailer.php?id=9",
                        "detall" => "detall.php?id=9"
                    ],
                    [
                        "nom" => "Elemental",
                        "imatge" => "https://pics.filmaffinity.com/Elemental-546355909-large.jpg",
                        "horaris" => ["13:30", "16:00", "18:30"],
                        "trailer" => "trailer.php?id=10",
                        "detall" => "detall.php?id=10"
                    ]
                ];

                foreach ($pelicules as $pelicula): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="<?php echo $pelicula["detall"]; ?>"><img src="<?php echo $pelicula["imatge"]; ?>" class="card-img-top" style="height: 600px; object-fit: cover;"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $pelicula["nom"]; ?></h5>
                                <p class="card-text"><strong>Horaris:</strong> <?php echo implode(", ", $pelicula["horaris"]); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?php echo $pelicula["trailer"]; ?>" class="btn btn-sm btn-outline-danger">Veure tràiler</a>
                                        <a href="<?php echo $pelicula["detall"]; ?>" class="btn btn-sm btn-outline-danger">Veure més informació</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-right"><a href="#">Tornar amunt</a></p>
        <p>&copy; 2024 Cartellera de pel·lícules. Tots els drets reservats.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
