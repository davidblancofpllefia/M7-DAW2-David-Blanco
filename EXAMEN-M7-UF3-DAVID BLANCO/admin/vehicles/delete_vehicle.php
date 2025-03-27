<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'Acceso denegado. Solo los administradores pueden acceder a esta página.';
    exit;
}

if (isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];

    $stmt = $mysqli->prepare("DELETE FROM VEHICLES WHERE id = ?");
    $stmt->bind_param('i', $vehicle_id);

    if ($stmt->execute()) {
        echo 'Vehículo eliminado correctamente.';
        exit;
    } else {
        echo 'Error al eliminar el vehículo: ' . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo 'ID de vehículo no especificado.';
}
