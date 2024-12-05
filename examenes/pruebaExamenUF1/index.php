<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php'); 
  exit();
}


$rol = $_SESSION['rol'] ?? 'jugador'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['configuracion'])) {
        if ($rol === 'admin') {
            header('Location: manage.php'); 
        } else {
            header('Location: login.php'); 
        }
        exit();
    } elseif (isset($_POST['jugar'])) {
        header('Location: trivial.php'); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Trivial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<header class="bg-success text-white text-center py-4">
    <h1>Bienvenido al Trivial</h1>
    <form method="post">
        <button type="submit" name="configuracion" class="btn btn-light btn-lg">⚙️</button>
    </form>
</header>

<main class="container text-center mt-5">
    <h2>¡Prepárate para jugar!</h2>
    <form method="post">
        <button type="submit" name="jugar" class="btn btn-success btn-lg mt-3">Empezar</button>
    </form>
</main>
</body>
</html>

