<?php
session_start();  

$usuario_valido = "admin";
$contraseña_valida = "1234";

$usuario = $contraseña = $foto_url = "";
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $foto_url = $_POST["foto_url"];

    if ($usuario == $usuario_valido && $contraseña == $contraseña_valida) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["foto_url"] = $foto_url;

        header("Location: bienvenida.php");
        exit(); 
    } else {

        $mensaje_error = "Usuario o contraseña incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
</head>
<body>

<h2>Formulario de Login</h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="usuario">Nombre de usuario:</label><br>
    <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>"><br><br>

    <label for="contraseña">Contraseña:</label><br>
    <input type="password" id="contraseña" name="contraseña"><br><br>

    <label for="foto_url">Foto (URL):</label><br>
    <input type="text" id="foto_url" name="foto_url" value="<?php echo $foto_url; ?>"><br><br>

    <input type="submit" value="Iniciar sesión">
</form>

<?php

if ($mensaje_error) {
    echo "<p style='color:red;'>$mensaje_error</p>";
}
?>

</body>
</html>
