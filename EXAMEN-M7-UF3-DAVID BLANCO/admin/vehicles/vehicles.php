<?php
session_start();
require_once '../../config.php';

if (isset($_SESSION['user_id'])) {
    $result = mysqli_query($mysqli, "SELECT * FROM VEHICLES");

    if ($result && mysqli_num_rows($result) > 0) {
        $vehicles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $vehicles = [];
    }
} else {
    header('Location: login.php');
    exit;
}

mysqli_close($mysqli);
?>
    <?php include('header.php'); ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Vehículos Disponibles</h1>

        <?php if ($_SESSION['user_rol'] === 'admin'): ?>
            <div class="text-center mb-4">
                <a href="add_vehicle.php" class="btn btn-success">Agregar Nuevo Vehículo</a>
            </div>
        <?php endif; ?>

        <h2>Vehículos disponibles:</h2>

        <?php if (!empty($vehicles)): ?>
            <div class="row">
                <?php foreach ($vehicles as $vehicle): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo htmlspecialchars($vehicle['imatge']); ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($vehicle['model']); ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($vehicle['model']); ?></h5>
                                <p class="card-text"><strong>Categoría:</strong> <?php echo htmlspecialchars($vehicle['categoria']); ?></p>
                                <p class="card-text"><strong>Precio por día:</strong> <?php echo htmlspecialchars($vehicle['preu_dia']); ?>€</p>
                                <p class="card-text"><strong>Disponible:</strong> <?php echo $vehicle['disponible'] ? 'Sí' : 'No'; ?></p>
                                
                                <?php if ($vehicle['disponible']): ?>
                                    <a href="reservar_vehicle.php?vehicle_id=<?php echo $vehicle['id']; ?>" class="btn btn-primary">Reservar</a>
                                <?php else: ?>
                                    <button class="btn btn-secondary" disabled>No disponible</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="alert alert-warning">No hay vehículos disponibles en este momento.</p>
        <?php endif; ?>
    </div>

    <?php include('../../footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
