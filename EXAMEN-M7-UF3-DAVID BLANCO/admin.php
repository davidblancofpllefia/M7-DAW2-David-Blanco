<?php
session_start();
require_once 'config.php';

// Verificar si el usuario está logueado y si es admin
if (isset($_SESSION['user_id']) && $_SESSION['user_rol'] === 'admin') {

    // Obtener los detalles del usuario logueado
    $user_id = $_SESSION['user_id'];
    $result_user = mysqli_query($mysqli, "SELECT * FROM USUARIS WHERE id = '$user_id' LIMIT 1");

    if ($result_user && mysqli_num_rows($result_user) > 0) {
        $user = mysqli_fetch_assoc($result_user);
    } else {
        echo "Usuario no encontrado.";
        exit;
    }

    // Agregar vehículo (si el formulario es enviado)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $model = $_POST['model'];
        $categoria = $_POST['categoria'];
        $preu_dia = $_POST['preu_dia'];
        $imatge = $_POST['imatge'];
        $disponible = isset($_POST['disponible']) ? 1 : 0;

        // Validar que los campos no estén vacíos
        if (!empty($model) && !empty($categoria) && !empty($preu_dia) && !empty($imatge)) {
            // Insertar el nuevo vehículo en la base de datos
            $query = "INSERT INTO VEHICLES (model, categoria, preu_dia, imatge, disponible) 
                      VALUES ('$model', '$categoria', '$preu_dia', '$imatge', '$disponible')";
            if (mysqli_query($mysqli, $query)) {
                echo "Vehículo agregado correctamente.";
            } else {
                echo "Error al agregar el vehículo: " . mysqli_error($mysqli);
            }
        } else {
            echo "Por favor, complete todos los campos.";
        }
    }
} else {
    // Si no es admin o no está logueado, redirigir a login
    header('Location: login.php');
    exit;
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>

    <p>Hola, <?php echo htmlspecialchars($user['nom']); ?>. Estás logueado como <?php echo htmlspecialchars($user['rol']); ?>.</p>

    <h2>Agregar un nuevo vehículo</h2>
    <form action="admin.php" method="POST">
        <label for="model">Modelo:</label><br>
        <input type="text" name="model" required><br>

        <label for="categoria">Categoría:</label><br>
        <input type="text" name="categoria" required><br>

        <label for="preu_dia">Precio por día:</label><br>
        <input type="text" name="preu_dia" required><br>

        <label for="imatge">Imagen (URL):</label><br>
        <input type="text" name="imatge" required><br>

        <label for="disponible">Disponible:</label>
        <input type="checkbox" name="disponible"><br>

        <input type="submit" value="Agregar vehículo">
    </form>
</body>
</html>

