<?php 
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Depuración: Ver los datos recibidos
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
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
        <label for="nom">Nombre</label><br>
        <input type="text" name="nom" id="nom" required><br>

        <label for="email">Correo electrónico</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="contrasenya">Contraseña</label><br>
        <input type="password" name="contrasenya" id="contrasenya" required><br>

        <label for="imatge_perfil">Imagen de perfil</label><br>
        <input type="text" name="imatge_perfil" id="imatge_perfil"><br>

        <label for="rol">Rol</label><br>
        <input type="text" name="rol" id="rol" value="user" required><br> 

        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
