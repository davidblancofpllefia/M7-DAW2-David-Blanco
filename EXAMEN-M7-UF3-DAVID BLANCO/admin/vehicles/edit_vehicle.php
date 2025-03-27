<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'Acceso denegado. Solo los administradores pueden acceder a esta página.';
    exit;
}

if (isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];

    $result = mysqli_query($mysqli, "SELECT * FROM VEHICLES WHERE id = '$vehicle_id' LIMIT 1");
    $vehicle = mysqli_fetch_assoc($result);

    if (!$vehicle) {
        echo 'Vehículo no encontrado.';
        exit;
    }
} else {
    echo 'ID de vehículo no especificado.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'];
    $categoria = $_POST['categoria'];
    $preu_dia = $_POST['preu_dia'];
    $imatge = $_POST['imatge'];
    $disponible = $_POST['disponible'];

    $stmt = $mysqli->prepare("UPDATE VEHICLES SET model = ?, categoria = ?, preu_dia = ?, imatge = ?, disponible = ? WHERE id = ?");
    $stmt->bind_param('ssdsbi', $model, $categoria, $preu_dia, $imatge, $disponible, $vehicle_id);

    if ($stmt->execute()) {
        echo 'Vehículo actualizado correctamente.';
        exit;
    } else {
        echo 'Error al actualizar el vehículo: ' . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>

<<?php include('header.php'); ?>
<body>
    <div class="container my-5">
        <h2 class="text-center">Editar Vehículo</h2>
        <form action="edit_vehicle.php?vehicle_id=<?php echo $vehicle['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="model" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="model" id="model" value="<?php echo htmlspecialchars($vehicle['model']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo htmlspecialchars($vehicle['categoria']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="preu_dia" class="form-label">Precio por Día</label>
                <input type="number" class="form-control" name="preu_dia" id="preu_dia" value="<?php echo htmlspecialchars($vehicle['preu_dia']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="imatge" class="form-label">Imagen (URL)</label>
                <input type="text" class="form-control" name="imatge" id="imatge" value="<?php echo htmlspecialchars($vehicle['imatge']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible</label>
                <select class="form-select" name="disponible" id="disponible">
                    <option value="1" <?php echo $vehicle['disponible'] ? 'selected' : ''; ?>>Sí</option>
                    <option value="0" <?php echo !$vehicle['disponible'] ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Actualizar Vehículo</button>
        </form>
    </div>
</body>
</html>

