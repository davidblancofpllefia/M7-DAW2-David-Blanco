<?php
session_start();
session_destroy(); 

ob_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Final del Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="alert alert-success mt-3">¡Felicidades! ¡Has completado el juego!</div>
    <a href="index.php" class="btn btn-primary w-100">Volver al inicio</a>
</body>
</html>

<?php
ob_end_flush(); 
?>




