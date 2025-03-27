<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página.';
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $model = $_POST['model'];
    $categoria = $_POST['categoria'];
    $preu_dia = $_POST['preu_dia'];
    $imatge = $_POST['imatge'];
    $disponible = isset($_POST['disponible']) ? 1 : 0;  

    $query = "INSERT INTO VEHICLES (model, categoria, preu_dia, imatge, disponible) 
              VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('ssssi', $model, $categoria, $preu_dia, $imatge, $disponible);
        if ($stmt->execute()) {
            header('Location: vehicles.php');
            exit;
        } else {
            echo 'Error al agregar el vehículo: ' . $mysqli->error;
        }
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
    }

    $mysqli->close();
}
?>

<?php include('../../header.php'); ?>
<body>
    <div class="container my-5">
        <h2 class="text-center">Agregar Nuevo Vehículo</h2>
        <form action="add_vehicle.php" method="POST">
            <div class="mb-3">
                <label for="model" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="model" id="model" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="categoria" id="categoria" required>
            </div>
            <div class="mb-3">
                <label for="preu_dia" class="form-label">Precio por Día</label>
                <input type="number" class="form-control" name="preu_dia" id="preu_dia" required>
            </div>
            <div class="mb-3">
                <label for="imatge" class="form-label">Imagen (URL)</label>
                <input type="text" class="form-control" name="imatge" id="imatge" required>
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible</label>
                <select class="form-select" name="disponible" id="disponible">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Agregar Vehículo</button>
        </form>
    </div>
</body>
</html>