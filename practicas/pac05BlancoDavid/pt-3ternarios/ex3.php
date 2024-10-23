<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3</title>
</head>
<body>
<?php

$nombre = ""; 


$valorNombre = !empty($nombre) ? $nombre : "Ingrese su nombre";
?>

<form action="procesar_contacto.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $valorNombre; ?>">
    <br><br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>