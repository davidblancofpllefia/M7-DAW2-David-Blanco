<?php 
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1️⃣ Validar y recoger los datos
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $contrasenya = isset($_POST['contrasenya']) ? $_POST['contrasenya'] : null;
    $rol = isset($_POST['rol']) ? trim($_POST['rol']) : null;
    $imatge_perfil = isset($_POST['imatge_perfil']) ? trim($_POST['imatge_perfil']) : null;

    // 2️⃣ Verificar que los campos obligatorios no estén vacíos
    if (!$nom || !$email || !$contrasenya || !$rol) {
        echo "Error: Todos los campos obligatorios deben estar llenos.";
        exit;
    }

    // 3️⃣ Cifrar la contraseña
    $contrasenyaHashed = password_hash($contrasenya, PASSWORD_DEFAULT);
    
    // 4️⃣ Definir el rol (puedes ajustar el rol según lo que necesites)
    // En este caso, ya se pasa desde el formulario
    if (!$rol) {
        $rol = 'user'; // Asignar un rol predeterminado si no se pasa
    }

    // 5️⃣ Preparar la consulta SQL
    $stmt = $mysqli->prepare(
        "INSERT INTO USUARIS (nom, email, contrasenya, rol, imatge_perfil, fecha_registro) 
         VALUES (?, ?, ?, ?, ?, NOW())"
    );

    if (!$stmt) {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
        exit;
    }

    // 6️⃣ Bindear los parámetros
    $stmt->bind_param('sssss', $nom, $email, $contrasenyaHashed, $rol, $imatge_perfil);

    // 7️⃣ Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir al login después de registrarse correctamente
        header('Location: index.php');
        exit;
    } else {
        echo 'Error al registrar el usuario: ' . $mysqli->error;
    }

    // 8️⃣ Cerrar la declaración
    $stmt->close();
    $mysqli->close();
}
?>

<?php include('header.php'); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Registro de Usuario</h2>

                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nom" id="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasenya" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contrasenya" id="contrasenya" required>
                        </div>

                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <input type="text" name="rol" id="rol" value="user" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>

                    <div class="mt-3 text-center">
                        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
