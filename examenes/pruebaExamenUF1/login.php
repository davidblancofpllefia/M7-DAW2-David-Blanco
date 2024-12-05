<?php
session_start();

if (isset($_SESSION['usuario'])) {
    $rol = $_SESSION['rol'] ?? 'jugador';
    if ($rol === 'admin') {
        header('Location: manage.php'); 
        exit();
    } else {
        header('Location: trivial.php'); 
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarios = [
        'admin' => ['contraseña' => '1234', 'rol' => 'admin'],
        'jugador' => ['contraseña' => '1234', 'rol' => 'jugador'],
    ];

    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';


    if (isset($usuarios[$usuario]) && $usuarios[$usuario]['contraseña'] === $contraseña) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $usuarios[$usuario]['rol']; 

        if ($_SESSION['rol'] === 'admin') {
            header('Location: manage.php');
            exit();
        } else {
            header('Location: trivial.php');
            exit();
        }
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Trivial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<header class="bg-success text-white text-center py-4">
    <h1>Iniciar Sesión</h1>
</header>

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Bienvenido</h5>

                    <form method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>

                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>