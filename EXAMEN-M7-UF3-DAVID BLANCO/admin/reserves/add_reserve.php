<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    echo 'Debes estar logueado para hacer una reserva.';
    exit;
}

$user_id = $_SESSION['user_id']; 

if (isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];

    $result_vehicle = mysqli_query($mysqli, "SELECT * FROM VEHICLES WHERE id = '$vehicle_id' LIMIT 1");
    $vehicle = mysqli_fetch_assoc($result_vehicle);

    if (!$vehicle) {
        echo 'Vehículo no encontrado.';
        exit;
    }
} else {
    echo 'No se ha seleccionado un vehículo.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inici = $_POST['data_inici'];
    $data_fi = $_POST['data_fi'];
    $estat = 'pendiente'; 

    $query = "INSERT INTO RESERVES (data_inici, data_fi, estat, id_usuari, id_vehicle) 
              VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('ssssi', $data_inici, $data_fi, $estat, $user_id, $vehicle_id);
        if ($stmt->execute()) {
            echo 'Reserva realizada con éxito.';
            exit;
        } else {
            echo 'Error al realizar la reserva: ' . $mysqli->error;
        }
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
    }
}

mysqli_close($mysqli);
?>

<?php include('header.php'); ?>

    <div class="container my-5">
        <h1 class="text-center mb-4">Reserva de Vehículo</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Detalles del Vehículo</h2>
                        <p><strong>Modelo:</strong> <?php echo htmlspecialchars($vehicle['model']); ?></p>
                        <p><strong>Categoría:</strong> <?php echo htmlspecialchars($vehicle['categoria']); ?></p>
                        <p><strong>Precio por día:</strong> <?php echo htmlspecialchars($vehicle['preu_dia']); ?>€</p>
                        <img src="<?php echo htmlspecialchars($vehicle['imatge']); ?>" class="img-fluid mb-4" alt="Imagen de <?php echo htmlspecialchars($vehicle['model']); ?>">

                        <h3 class="mb-3">Selecciona las fechas de la reserva</h3>

                        <form action="reservar_vehicle.php?vehicle_id=<?php echo $vehicle['id']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="data_inici" class="form-label">Fecha de inicio:</label>
                                <input type="date" name="data_inici" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="data_fi" class="form-label">Fecha de fin:</label>
                                <input type="date" name="data_fi" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Reservar Vehículo</button>
                            <a href="vehicles.php" class="btn btn-secondary btn-lg">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../../footer.php'); ?>
</body>
</html>
