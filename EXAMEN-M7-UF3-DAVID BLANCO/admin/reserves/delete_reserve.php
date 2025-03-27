<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'Acceso denegado. Solo los administradores pueden acceder a esta página.';
    exit;
}

if (isset($_GET['id'])) {
    $id_reserve = $_GET['id'];

    $delete_query = "DELETE FROM RESERVES WHERE id = ?";
    if ($stmt = $mysqli->prepare($delete_query)) {
        $stmt->bind_param('i', $id_reserve);
        if ($stmt->execute()) {
            echo 'Reserva eliminada con éxito.';
            exit;
        } else {
            echo 'Error al eliminar la reserva.';
        }
        $stmt->close();
    }
}

mysqli_close($mysqli);
?>
