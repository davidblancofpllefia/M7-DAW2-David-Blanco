<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>
    <h1>Bienvenido a la página principal</h1>

    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?>. Estás logueado como <?php echo htmlspecialchars($_SESSION['user_rol']); ?>.</p>

        <?php if ($_SESSION['user_rol'] === 'admin'): ?>
            <a href="admin.php">
                <button>Ir al Panel de Administración</button>
            </a>
        <?php endif; ?>

        <a href="vehicles.php"><button>Ver vehículos</button></a>

        <a href="logout.php"><button>Cerrar sesión</button></a>

    <?php else: ?>
        <p>No has iniciado sesión. <a href="login.php">Iniciar sesión</a></p>
        <p>Si aún no tienes cuenta, <a href="register.php">Regístrate aquí</a>.</p>
    <?php endif; ?>

</body>
</html>

