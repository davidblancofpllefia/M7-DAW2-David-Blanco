<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'Acceso denegado. Solo los administradores pueden acceder a esta página.';
    exit;
}

if (isset($_GET['id'])) {
    $id_reserve = $_GET['id'];

    $query = "SELECT * FROM RESERVES WHERE id = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('i', $id_reserve);
        $stmt->execute();
        $result = $stmt->get_result();
        $reserve = $result->fetch_assoc();
        $stmt->close();

        if (!$reserve) {
            echo 'Reserva no encontrada.';
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inici = $_POST['data_inici'];
    $data_fi = $_POST['data_fi'];
    $estat = $_POST['estat'];

    $update_query = "UPDATE RESERVES SET data_inici = ?, data_fi = ?, estat = ? WHERE id = ?";
    if ($stmt = $mysqli->prepare($update_query)) {
        $stmt->bind_param('sssi', $data_inici, $data_fi, $estat, $id_reserve);
        if ($stmt->execute()) {
            echo 'Reserva actualizada con éxito.';
            exit;
        } else {
            echo 'Error al actualizar la reserva.';
        }
        $stmt->close();
    }
}

mysqli_close($mysqli);
?>

    <?php include('header.php'); ?>

    <div class="container my-5">
        <h2>Editar Reserva</h2>

        <form action="edit_reserve.php?id=<?php echo $reserve['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="data_inici" class="form-label">Fecha de Inicio</label>
                <input type="date" name="data_inici" id="data_inici" class="form-control" value="<?php echo htmlspecialchars($reserve['data_inici']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="data_fi" class="form-label">Fecha de Fin</label>
                <input type="date" name="data_fi" id="data_fi" class="form-control" value="<?php echo htmlspecialchars($reserve['data_fi']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="estat" class="form-label">Estado</label>
                <select name="estat" id="estat" class="form-control" required>
                    <option value="pendiente" <?php echo ($reserve['estat'] === 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="confirmada" <?php echo ($reserve['estat'] === 'confirmada') ? 'selected' : ''; ?>>Confirmada</option>
                    <option value="cancelada" <?php echo ($reserve['estat'] === 'cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        </form>
    </div>
</body>
</html>
