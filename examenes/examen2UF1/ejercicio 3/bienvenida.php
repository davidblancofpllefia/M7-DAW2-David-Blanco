<?php
session_start();  

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");  
    exit();
}

$usuario = $_SESSION["usuario"];
$foto_url = $_SESSION["foto_url"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>

<h2>Bienvenido, <?php echo $usuario; ?>!</h2>

<?php if ($foto_url): ?>
    <p><img src="<?php echo $foto_url; ?>" alt="Foto de perfil" width="100"></p>
<?php endif; ?>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>
