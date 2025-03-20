<?php 
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Depuración: Ver los datos recibidos
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // 1️⃣ Validar y recoger los datos
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $surname = isset($_POST['surname']) ? trim($_POST['surname']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $avatar = isset($_POST['avatar']) ? trim($_POST['avatar']) : null;
    $age = isset($_POST['age']) ? (int) $_POST['age'] : null;

    // 2️⃣ Verificar que los campos obligatorios no estén vacíos
    if (!$name || !$email || !$password || !$age) {
        echo "Error: Todos los campos obligatorios deben estar llenos.";
        exit;
    }

    // 3️⃣ Cifrar la contraseña
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    
    // 4️⃣ Definir el rol
    $rol = 'user';

    // 5️⃣ Preparar la consulta SQL
    $stmt = $mysqli->prepare(
        "INSERT INTO Users (name, surname, email, avatar, password, rol, age, date_register) 
         VALUES (?, ?, ?, ?, ?, ?, ?, NOW())"
    );

    if (!$stmt) {
        echo 'Error en la preparación de la consulta: ' . $mysqli->error;
        exit;
    }

    // 6️⃣ Bindear los parámetros (ahora con 7 valores correctos)
    $stmt->bind_param('sssssis', $name, $surname, $email, $avatar, $passwordHashed, $rol, $age);

    // 7️⃣ Ejecutar la consulta
    if ($stmt->execute()) {
        echo 'Usuario registrado con éxito';
    } else {
        echo 'Error al registrar el usuario: ' . $mysqli->error;
    }

    // 8️⃣ Cerrar la declaración
    $stmt->close();
    $mysqli->close();
}
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="" method="POST">
        <label for="name">Nombre</label><br>
        <input type="text" name="name" id="name" required><br>

        <label for="surname">Apellido</label><br>
        <input type="text" name="surname" id="surname" required><br>

        <label for="email">Correo electrónico</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Contraseña</label><br>
        <input type="password" name="password" id="password" required><br>

        <label for="avatar">Avatar</label><br>
        <input type="text" name="avatar" id="avatar"><br>

        <label for="age">Edad</label><br>
        <input type="number" name="age" id="age" required><br>

        <input type="submit" value="Registrarse">
    </form>
</body>