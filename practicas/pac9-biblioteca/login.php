<?php
session_start();

$usuarios = [
    ["username" => "admin", "password" => "adminpass", "role" => "admin"],
    ["username" => "reader", "password" => "readerpass", "role" => "lector"]
];

$mensajeError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $fotoPerfil = $_POST['profile_picture'] ?? '';

    if (filter_var($fotoPerfil, FILTER_VALIDATE_URL) === false) {
        $mensajeError = 'La URL de la foto de perfil no es válida.';
    } else {
        foreach ($usuarios as $user) {
            if ($user['username'] === $usuario && $user['password'] === $password) {
                $_SESSION['username'] = $usuario;
                $_SESSION['role'] = $user['role'];
                $_SESSION['logged_in'] = true;
                $_SESSION['profile_picture'] = $fotoPerfil; 

                header('Location: home.php');
                exit;
            }
        }
        $mensajeError = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <!-- Elementos de fondo decorativos -->
        <?php for ($i = 0; $i < 180; $i++): ?>
            <span></span>
        <?php endfor; ?>

        <!-- Sección de inicio de sesión -->
        <div class="signin">
            <div class="content text-center">
                <h2>Inicia sesión</h2>
                <form method="POST" action="login.php">
                    <div class="inputBox">
                        <input class="p-2 m-2" placeholder="Nombre de usuario" type="text" name="username" required>
                    </div>
                    <div class="inputBox">
                        <input class="p-2 m-2" placeholder="Contraseña" type="password" name="password" required>
                    </div>
                    <div class="inputBox">
                        <input class="p-2 m-2" placeholder="URL de tu foto de perfil" type="url" name="profile_picture" required>
                    </div>
                    
                    <?php if (!empty($mensajeError)) : ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($mensajeError) ?></div>
                    <?php endif; ?>
                    
                    <div class="inputBox">
                        <input class="bg-warning btn mt-2" type="submit" value="Iniciar">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
