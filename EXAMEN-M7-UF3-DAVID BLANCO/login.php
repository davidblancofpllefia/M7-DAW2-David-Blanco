<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $result = mysqli_query($mysqli, "SELECT * FROM USUARIS WHERE email = '$email' LIMIT 1");


    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['contrasenya'])) {  

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_nom'] = $user['nom']; 
            $_SESSION['user_rol'] = $user['rol'];
            $_SESSION['user_imatge_perfil'] = $user['imatge_perfil']; 
            $_SESSION['user_fecha_registro'] = $user['fecha_registro'];


            header('Location: index.php');
            exit;
        } else {
            echo 'Contraseña incorrecta.';
        }
    } else {
        echo 'Usuario no encontrado.';
    }
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Inicio de Sesión</h1>
    <form action="" method="POST">
        <label for="email">Correo electrónico</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Contraseña</label><br>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
