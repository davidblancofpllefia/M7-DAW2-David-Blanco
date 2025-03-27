<?php 
session_start();
require_once 'config.php';

// 0. Comprobar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recoger datos del formulario
    $name = $_POST['name'];
    $surname = $_POST['surname'];  // Recoger apellido
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = '';    // Variable para almacenar la ruta del avatar
    $age = $_POST['age'];          // Recoger edad

    // 2. Subir el archivo de avatar (si se ha seleccionado uno)
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Validar las extensiones permitidas
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            // Renombrar el archivo
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            // Definir la ruta de destino
            $dest_path = 'uploads/' . $newFileName;

            // Mover el archivo a la carpeta uploads/
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $avatar = $dest_path; // Asignar la ruta del archivo subido
            } else {
                echo "Error: No se pudo mover el archivo a la carpeta de destino.";
            }
        } else {
            echo "Error: Solo se permiten archivos de imagen (jpg, jpeg, png, gif).";
        }
    }

    // 3. Cifrar la contraseña con password_hash
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // 4. Preparar la consulta antes de insertar para evitar SQL injection
    $stmt = $mysqli->prepare(
        "INSERT INTO Users (name, surname, email, avatar, password, rol, age, date_register) 
         VALUES (?, ?, ?, ?, ?, 'user', ?, NOW())"
    );

    // 5. Comprobar que la preparación de la consulta tuvo éxito
    if (!$stmt) {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
        exit;
    }

    // 6. Bindear los parámetros
    $stmt->bind_param('sssssi', $name, $surname, $email, $avatar, $passwordHashed, $age);

    // 7. Ejecutar la consulta
    if ($stmt->execute()) {
        header('Location: login.php '); // Redirigir al usuario a la página de login
        exit; 
    } 


    // 8. Cerrar la declaración
    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background: linear-gradient(135deg, #160b57, #642b73);">
    <div class="bg-white p-5 rounded-4 shadow-lg" style="width: 500px;">
        <h2 class="text-center mb-4 text-dark">Registro</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label fw-bold">Apellido</label>
                <input type="text" name="surname" id="surname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label fw-bold">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label fw-bold">Edad</label>
                <input type="number" name="age" id="age" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-3">Registrarse</button>
        </form>
    </div>
</body>
</html>
