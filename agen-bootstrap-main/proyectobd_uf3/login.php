<?php
session_start();
require_once '/workspaces/2425-M7-DavidHenrique/UF3/MasterWebs(CRUD)/theme/config.php';

// 1. Comprobar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2. Recoger datos del formulario en variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 3. Ejecutar la consulta
    $result = mysqli_query($mysqli, "SELECT * FROM Users WHERE email = '$email' LIMIT 1");

    // 4. Comprobar si hay resultados
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // 5. Comprobar si la contraseña es correcta
        if (password_verify($password, $user['password'])) {
            // 6. Guardar el usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_rol'] = $user['rol'];
            $_SESSION['user_age'] = $user['age'];
            $_SESSION['user_date_register'] = $user['date_register'];

            // 7. Redirigir al usuario a la página de inicio
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
<h1>Inicio de Sesion</h1>
    <form action="" method="POST">
        <label for="email">Correo electrónico</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Contraseña</label><br>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
    
</body>
</html>