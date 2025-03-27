<?php
session_start();
require_once '../../config.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'Acceso denegado. Solo los administradores pueden acceder a esta página.';
    exit;
}

$query = "SELECT r.id, r.data_inici, r.data_fi, r.estat, u.nom AS user_name, v.model AS vehicle_model 
          FROM RESERVES r
          JOIN USUARIS u ON r.id_usuari = u.id
          JOIN VEHICLES v ON r.id_vehicle = v.id";
$result = mysqli_query($mysqli, $query);

$reserves = [];
if ($result && mysqli_num_rows($result) > 0) {
    $reserves = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($mysqli);
?>

    <?php include('header.php'); ?>

    <div class="container my-5">
        <h2>Gestión de Reservas</h2>

        <?php if (count($reserves) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Reserva</th>
                        <th>Usuario</th>
                        <th>Vehículo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reserves as $reserve): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($reserve['id']); ?></td>
                            <td><?php echo htmlspecialchars($reserve['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($reserve['vehicle_model']); ?></td>
                            <td><?php echo htmlspecialchars($reserve['data_inici']); ?></td>
                            <td><?php echo htmlspecialchars($reserve['data_fi']); ?></td>
                            <td><?php echo htmlspecialchars($reserve['estat']); ?></td>
                            <td>
                                <a href="edit_reserve.php?id=<?php echo $reserve['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="delete_reserve.php?id=<?php echo $reserve['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay reservas registradas.</p>
        <?php endif; ?>
    </div>

</body>
</html>
