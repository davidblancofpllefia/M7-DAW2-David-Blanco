<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$pregunta = '';
$opciones = ['', '', '', ''];
$respuesta_correcta = '';

if (isset($_GET['id'])) {
    $id_editar = $_GET['id'];
    foreach ($_SESSION['preguntas'] as $p) {
        if ($p['id'] == $id_editar) {
            $pregunta = $p['pregunta'];
            $opciones = $p['opciones'];
            $respuesta_correcta = $p['respuesta_correcta'];
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pregunta_nueva = $_POST['pregunta'];
    $opciones_nuevas = [$_POST['opcion_1'], $_POST['opcion_2'], $_POST['opcion_3'], $_POST['opcion_4']];
    $respuesta_correcta_nueva = $_POST['respuesta_correcta'];

    if (isset($_GET['id'])) {
        foreach ($_SESSION['preguntas'] as &$p) {
            if ($p['id'] == $id_editar) {
                $p['pregunta'] = $pregunta_nueva;
                $p['opciones'] = $opciones_nuevas;
                $p['respuesta_correcta'] = $respuesta_correcta_nueva;
                break;
            }
        }
    } else {
        $nuevo_id = count($_SESSION['preguntas']) + 1;
        $_SESSION['preguntas'][] = [
            'id' => $nuevo_id,
            'pregunta' => $pregunta_nueva,
            'opciones' => $opciones_nuevas,
            'respuesta_correcta' => $respuesta_correcta_nueva
        ];
    }

    header('Location: manage.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_GET['id']) ? 'Editar' : 'Añadir'; ?> Pregunta - Trivial</title>
    <!-- Vincular Bootstrap desde CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-primary text-white p-4">
    <h1 class="text-center"><?php echo isset($_GET['id']) ? 'Editar' : 'Añadir'; ?> Pregunta</h1>
    <a href="manage.php" class="btn btn-secondary">Volver a Gestión</a>
</header>

<main class="container mt-4">
    <form method="POST">
        <div class="form-group">
            <label for="pregunta">Pregunta:</label>
            <input type="text" id="pregunta" name="pregunta" class="form-control" value="<?php echo $pregunta; ?>" required>
        </div>

        <div class="form-group">
            <label for="opcion_1">Opción 1:</label>
            <input type="text" id="opcion_1" name="opcion_1" class="form-control" value="<?php echo $opciones[0]; ?>" required>
        </div>

        <div class="form-group">
            <label for="opcion_2">Opción 2:</label>
            <input type="text" id="opcion_2" name="opcion_2" class="form-control" value="<?php echo $opciones[1]; ?>" required>
        </div>

        <div class="form-group">
            <label for="opcion_3">Opción 3:</label>
            <input type="text" id="opcion_3" name="opcion_3" class="form-control" value="<?php echo $opciones[2]; ?>" required>
        </div>

        <div class="form-group">
            <label for="opcion_4">Opción 4:</label>
            <input type="text" id="opcion_4" name="opcion_4" class="form-control" value="<?php echo $opciones[3]; ?>" required>
        </div>

        <div class="form-group">
            <label for="respuesta_correcta">Respuesta Correcta:</label>
            <select id="respuesta_correcta" name="respuesta_correcta" class="form-control" required>
                <option value="opcion_1" <?php echo $respuesta_correcta == 'opcion_1' ? 'selected' : ''; ?>>Opción 1</option>
                <option value="opcion_2" <?php echo $respuesta_correcta == 'opcion_2' ? 'selected' : ''; ?>>Opción 2</option>
                <option value="opcion_3" <?php echo $respuesta_correcta == 'opcion_3' ? 'selected' : ''; ?>>Opción 3</option>
                <option value="opcion_4" <?php echo $respuesta_correcta == 'opcion_4' ? 'selected' : ''; ?>>Opción 4</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo isset($_GET['id']) ? 'Guardar Cambios' : 'Añadir Pregunta'; ?></button>
    </form>
</main>

<!-- Vincular jQuery y Bootstrap desde CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
