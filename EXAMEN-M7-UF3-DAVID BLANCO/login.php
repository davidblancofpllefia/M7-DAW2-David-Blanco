<?php
session_start();
require_once 'config.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar si el usuario existe
    $result = mysqli_query($mysqli, "SELECT * FROM USUARIS WHERE email = '$email' LIMIT 1");

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar si la contraseña es correcta
        if (password_verify($password, $user['contrasenya'])) {  
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_nom'] = $user['nom']; 
            $_SESSION['user_rol'] = $user['rol'];
            $_SESSION['user_imatge_perfil'] = $user['imatge_perfil']; 
            $_SESSION['user_fecha_registro'] = $user['fecha_registro'];

            // Redirigir a la página de inicio
            header('Location: index.php');
            exit;
        } else {
            $error_message = 'Contraseña incorrecta.';
        }
    } else {
        $error_message = 'Usuario no encontrado.';
    }
}
?>

<!-- Incluyendo header -->
<?php include('header.php'); ?>

    <!-- Login Form -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>

                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                        </form>

                        <div class="text-center mt-3">
                            <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Incluyendo footer -->
<?php include('footer.php'); ?>

