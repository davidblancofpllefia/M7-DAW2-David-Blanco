<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Biblioteca Virtual</h1>
        
        <?php
        class Libro {
            public $titulo;
            public $autor;
            public $anoPublicacion;
            public $foto;

            public function __construct($titulo, $autor, $anoPublicacion, $foto) {
                $this->titulo = $titulo;
                $this->autor = $autor;
                $this->anoPublicacion = $anoPublicacion;
                $this->foto = $foto;
            }

            public function obtenerDetalles() {
                return "<strong>Título:</strong> $this->titulo<br><strong>Autor:</strong> $this->autor<br><strong>Año:</strong> $this->anoPublicacion";
            }
        }

        class Biblioteca {
            private $libros = [];

            public function agregarLibro($libro) {
                $this->libros[] = $libro;
            }

            public function mostrarLibros() {
                return $this->libros;
            }

            public function buscarLibro($titulo) {
                return array_filter($this->libros, function($libro) use ($titulo) {
                    return stripos($libro->titulo, $titulo) !== false;
                });
            }
        }

        if (!isset($_SESSION['biblioteca'])) {
            $biblioteca = new Biblioteca();
            $biblioteca->agregarLibro(new Libro("El Señor de los Anillos", "J.R.R. Tolkien", 1954, "https://example.com/senyor.jpg"));
            $biblioteca->agregarLibro(new Libro("Cien años de soledad", "Gabriel García Márquez", 1967, "https://example.com/cien.jpg"));
            $_SESSION['biblioteca'] = serialize($biblioteca);
        } else {
            $biblioteca = unserialize($_SESSION['biblioteca']);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregarLibro'])) {
            $nuevoLibro = new Libro($_POST['titulo'], $_POST['autor'], $_POST['anoPublicacion'], $_POST['foto']);
            $biblioteca->agregarLibro($nuevoLibro);
            $_SESSION['biblioteca'] = serialize($biblioteca);
        }


        $resultados = [];
        if (isset($_GET['buscar'])) {
            $resultados = $biblioteca->buscarLibro($_GET['titulo']);
        }
        ?>


        <form method="POST" class="mb-4">
            <h2>Agregar un nuevo libro</h2>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" id="autor" name="autor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="anoPublicacion" class="form-label">Año de Publicación</label>
                <input type="number" id="anoPublicacion" name="anoPublicacion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">URL de la Foto</label>
                <input type="url" id="foto" name="foto" class="form-control">
            </div>
            <button type="submit" name="agregarLibro" class="btn btn-primary">Agregar Libro</button>
        </form>

        <form method="GET" class="mb-4">
            <h2>Buscar un libro</h2>
            <div class="mb-3">
                <label for="tituloBusqueda" class="form-label">Título</label>
                <input type="text" id="tituloBusqueda" name="titulo" class="form-control">
            </div>
            <button type="submit" name="buscar" class="btn btn-secondary">Buscar</button>
        </form>

        <h2>Libros en la biblioteca</h2>
        <div class="row">
            <?php foreach ($biblioteca->mostrarLibros() as $libro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $libro->foto ?>" class="card-img-top" alt="Imagen del libro">
                        <div class="card-body">
                            <p class="card-text">
                                <?= $libro->obtenerDetalles() ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($resultados)): ?>
            <h2>Resultados de la búsqueda</h2>
            <div class="row">
                <?php foreach ($resultados as $libro): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= $libro->foto ?>" class="card-img-top" alt="Imagen del libro">
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $libro->obtenerDetalles() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
