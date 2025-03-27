<?php
session_start();
require_once 'config.php';

// Verificar si el usuario está logueado
if (isset($_SESSION['user_id'])) {
    // Obtener la lista de vehículos
    $result = mysqli_query($mysqli, "SELECT * FROM VEHICLES");

    if ($result && mysqli_num_rows($result) > 0) {
        $vehicles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $vehicles = [];
    }
} else {
    // Si no está logueado, redirigir al login
    header('Location: login.php');
    exit;
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos Disponibles</title>
</head>
<body>
    <h1>Lista de Vehículos</h1>

    <?php if ($_SESSION['user_rol'] === 'admin'): ?>
        <!-- Solo los administradores pueden ver el botón para agregar vehículos -->
        <a href="add_vehicle.php">
            <button>Agregar Nuevo Vehículo</button>
        </a>
    <?php endif; ?>

    <h2>Vehículos disponibles:</h2>

    <?php if (!empty($vehicles)): ?>
        <ul>
            <?php foreach ($vehicles as $vehicle): ?>
                <li>
                    <strong>Modelo:</strong> <?php echo htmlspecialchars($vehicle['model']); ?><br>
                    <strong>Categoría:</strong> <?php echo htmlspecialchars($vehicle['categoria']); ?><br>
                    <strong>Precio por día:</strong> <?php echo htmlspecialchars($vehicle['preu_dia']); ?><br>
                    <strong>Imagen:</strong> <img src="<?php echo htmlspecialchars($vehicle['imatge']); ?>" alt="Imagen de <?php echo htmlspecialchars($vehicle['model']); ?>" width="100"><br>
                    <strong>Disponible:</strong> <?php echo $vehicle['disponible'] ? 'Sí' : 'No'; ?><br>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hay vehículos disponibles en este momento.</p>
    <?php endif; ?>
</body>
</html>
