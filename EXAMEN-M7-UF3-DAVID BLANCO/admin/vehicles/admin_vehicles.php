<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    echo 'Debes estar logueado para acceder a esta página.';
    exit;
}

$result = mysqli_query($mysqli, "SELECT * FROM VEHICLES");

if ($result && mysqli_num_rows($result) > 0) {
    $vehicles = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $vehicles = [];
}

mysqli_close($mysqli);
?>

<?php include('header.php'); ?>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Lista de Vehículos</h2>
        
        <a href="add_vehicle.php" class="btn btn-success mb-3">Agregar Nuevo Vehículo</a>

        <?php if (!empty($vehicles)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Categoría</th>
                        <th>Precio por Día</th>
                        <th>Disponible</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehicles as $vehicle): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vehicle['model']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['categoria']); ?></td>
                            <td><?php echo htmlspecialchars($vehicle['preu_dia']); ?> €</td>
                            <td><?php echo $vehicle['disponible'] ? 'Sí' : 'No'; ?></td>
                            <td>
                                <a href="edit_vehicle.php?vehicle_id=<?php echo $vehicle['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="delete_vehicle.php?vehicle_id=<?php echo $vehicle['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este vehículo?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay vehículos disponibles.</p>
        <?php endif; ?>
    </div>
</body>
</html>
