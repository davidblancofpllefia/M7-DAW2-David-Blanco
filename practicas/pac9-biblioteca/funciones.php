<?php
session_start();

function inicializarLibros() {
    if (!isset($_SESSION['libros'])) {
        $_SESSION['libros'] = [
            [
                'titulo' => 'El Señor de los Anillos',
                'autor' => 'J.R.R. Tolkien',
                'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREqW3PT9_trt9JU2FZgCPlmodxov3L73iedQ&s',
                'descripcion' => 'Una famosa serie de fantasía épica.'
            ],
            [
                'titulo' => 'Los juegos del hambre',
                'autor' => 'Suzanne Collins',
                'imagen' => 'https://m.media-amazon.com/images/I/71BUB4ubNEL._UF1000,1000_QL80_.jpg',
                'descripcion' => 'Los Juegos del Hambre es el primer libro de la trilogía homónima escrita por la autora estadounidense Suzanne Collins.'
            ],
            [
                'titulo' => 'Harry Potter y la piedra filosofal',
                'autor' => 'J.K. Rowling',
                'imagen' => 'https://pictures.abebooks.com/isbn/9789500419574-es.jpg',
                'descripcion' => 'Harry Potter y la piedra filosofal, es el primer libro de la serie literaria Harry Potter.'
            ]
        ];
    }
}

function agregarLibro($titulo, $autor, $imagen, $descripcion) {
    $_SESSION['libros'][] = [
        'titulo' => $titulo,
        'autor' => $autor,
        'imagen' => $imagen,
        'descripcion' => $descripcion
    ];
}

function editarLibro($id, $titulo, $autor, $imagen, $descripcion) {
    if (isset($_SESSION['libros'][$id])) {
        $_SESSION['libros'][$id]['titulo'] = $titulo;
        $_SESSION['libros'][$id]['autor'] = $autor;
        $_SESSION['libros'][$id]['imagen'] = $imagen;
        $_SESSION['libros'][$id]['descripcion'] = $descripcion;
    }
}


function eliminarLibro($id) {
    if (isset($_SESSION['libros'][$id])) {
        unset($_SESSION['libros'][$id]);
    }
}
?>
