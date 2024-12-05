<?php
session_start();
include 'data.php'; 


if (!isset($_SESSION['pregunta_actual'])) {
    $_SESSION['pregunta_actual'] = 0; 
}

$pregunta_actual = $preguntas[$_SESSION['pregunta_actual']];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuesta_usuario = $_POST['respuesta'];

  
    if ($respuesta_usuario === $pregunta_actual['answer']) {
        $_SESSION['pregunta_actual']++; 
        if ($_SESSION['pregunta_actual'] >= count($preguntas)) {
            echo "<div class='alert alert-success text-center mt-4'>¡Felicidades, has terminado el trivial!</div>";
            session_unset();
            session_destroy();
        }
    } else {
        echo "<div class='alert alert-danger text-center mt-4'>Respuesta incorrecta. Intenta de nuevo.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Trivial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4"><?php echo $pregunta_actual['question']; ?></h2>

                    <form method="post">
                        <div class="mb-3">
                            <?php foreach ($pregunta_actual['options'] as $opcion): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="<?php echo $opcion; ?>" name="respuesta" value="<?php echo $opcion; ?>" required>
                                    <label class="form-check-label" for="<?php echo $opcion; ?>"><?php echo $opcion; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Responder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
