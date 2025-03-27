<?php
session_start();
?>
<?php include('header.php'); ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Examen UF3</h1>

                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="alert alert-success text-center" role="alert">
                                Hola, <strong><?php echo htmlspecialchars($_SESSION['user_nom']); ?></strong>. Estás logueado como <strong><?php echo htmlspecialchars($_SESSION['user_rol']); ?></strong>.
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-4">
                                <?php if ($_SESSION['user_rol'] === 'admin'): ?>
                                    <a href="admin.php" class="btn btn-primary btn-lg">Ir al Panel de Administración</a>
                                <?php endif; ?>

                                <a href="./admin/vehicles/vehicles.php" class="btn btn-success btn-lg">Ver vehículos</a>
                                <a href="logout.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning text-center" role="alert">
                                No has iniciado sesión.
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-4">
                                <a href="login.php" class="btn btn-primary btn-lg">Iniciar sesión</a>
                                <a href="register.php" class="btn btn-secondary btn-lg">Regístrate aquí</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>

</body>
</html>



