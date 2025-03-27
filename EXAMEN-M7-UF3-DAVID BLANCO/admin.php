<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'Acceso denegado. Solo los administradores pueden acceder a esta página.';
    exit;
}

?>

    <?php include('header.php'); ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Panel de Administración</h1>
                        <p class="text-center">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nom']); ?>. Estás logueado como <?php echo htmlspecialchars($_SESSION['user_rol']); ?>.</p>
                        
                        <h2 class="mt-4">Gestionar:</h2>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="./admin/vehicles/admin_vehicles.php" class="btn btn-link">Gestionar Vehículos</a>
                            </li>
                            <li class="list-group-item">
                                <a href="./admin/reserves/admin_reserves.php" class="btn btn-link">Gestionar Reservas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
