<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Album example · Bootstrap</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">



  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>
<?php
  $idols = [
    [
        "imatge" => "https://img.a.transfermarkt.technology/portrait/big/28003-1710080339.jpg?lm=1",
        "nom" => "Lionel Andres",
        "cognoms" => "Messi Cuccitini",
        "descripcio" => "Un dels millors jugadors de futbol de tots els temps."
    ],
    [
        "imatge" => "https://img.olympics.com/images/image/private/t_1-1_300/f_auto/primary/pcxgwhoweqzzhiuqbwqw",
        "nom" => "Cristiano Ronaldo",
        "cognoms" => "dos Santos Aveiro",
        "descripcio" => "Un dels màxims golejadors de la història del futbol."
    ],
    [
        "imatge" => "https://upload.wikimedia.org/wikipedia/commons/8/83/Bra-Cos_%281%29_%28cropped%29.jpg",
        "nom" => "Neymar",
        "cognoms" => "da Silva Santos Júnior",
        "descripcio" => "Un jugador excepcional amb una habilitat tècnica impressionant."
    ],
    [
        "imatge" => "https://emprendedores.es/wp-content/uploads/rafa-nadal-que-puede-aprender-un-emprendedor-del-rey-de-roland-garros.gif",
        "nom" => "Rafa",
        "cognoms" => "Nadal",
        "descripcio" => "Considerat un dels millors tenistes de tots els temps."
    ],
    [
        "imatge" => "https://cdn.nba.com/headshots/nba/latest/1040x760/893.png",
        "nom" => "Michael Jordan",
        "cognoms" => "",
        "descripcio" => "Un dels jugadors de bàsquet més icònics i reconeguts del món."
    ],
    [
        "imatge" => "https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Usain_Bolt_after_4_%C3%97_100_m_Rio_2016.jpg/1200px-Usain_Bolt_after_4_%C3%97_100_m_Rio_2016.jpg",
        "nom" => "Usain Bolt",
        "cognoms" => "",
        "descripcio" => "Considerat el velocista més ràpid de la història."
    ]

];
$idolsHtml = '';
foreach ($idols as $idol) {
  $idolsHtml .= '<div class="col">
              <div class="card shadow-sm">
                  <img src="' . $idol['imatge'] . '" class="card-img-top" alt="' . $idol['nom'] . ' ' . $idol['cognoms'] . '" style="height: 225px; object-fit: cover;">
                  <div class="card-body">
                      <h5 class="card-title">' . $idol['nom'] . ' ' . $idol['cognoms'] . '</h5>
                      <p class="card-text">' . $idol['descripcio'] . '</p>
                      <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                          </div>
                          <small class="text-muted">9 mins</small>
                      </div>
                  </div>
              </div>
          </div>';
}

?>
  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background
              context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off
              to some social networking sites or contact information.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
            viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" /></svg>
          <strong>Album</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
            etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php echo $idolsHtml; ?>
  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
          href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>

</body>

</html>
