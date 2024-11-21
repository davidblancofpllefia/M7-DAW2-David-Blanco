<?php
session_start();
ob_start(); 


if (!isset($_SESSION['username'], $_SESSION['dificultat'], $_SESSION['current_room'])) {
    header('Location: index.php'); 
    exit;
}

include('endevinalles.php'); 


$dificultat = $_SESSION['dificultat'];
$current_room = $_SESSION['current_room'] - 1; 


if (!isset($endevinalles[$dificultat][$current_room])) {
    header('Location: fin.php'); 
    exit;
}


$pregunta_actual = $endevinalles[$dificultat][$current_room]['pregunta'];
$resposta_actual = $endevinalles[$dificultat][$current_room]['resposta'];


$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuesta_usuario = strtolower(trim($_POST['answer'])); 

    
    if ($respuesta_usuario === strtolower($resposta_actual)) {
        $_SESSION['current_room']++; 


        if ($_SESSION['current_room'] > count($endevinalles[$dificultat])) {
            header('Location: fin.php'); 
            exit;
        }

        
        header('Location: room' . $_SESSION['current_room'] . '.php'); 
        exit;
    } else {
        
        $message = '<p class="text-danger text-center mt-3">Resposta incorrecta! Torna-ho a intentar.</p>';
    }
}

ob_end_flush(); 
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitació 1</title>
</head>
<body class="d-flex flex-column vh-100">
    <?php include 'header.php'; ?> 
    <main class="d-flex justify-content-center align-items-center flex-grow-1">
        <div class="card p-4" style="width: 22rem;">
            <h2 class="card-title text-center">Habitació 1</h2>
            <p class="card-text"><?= htmlspecialchars($pregunta_actual); ?></p>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="answer" class="form-control" required placeholder="Resposta">
                </div>
                <button type="submit" class="btn btn-success w-100">Enviar</button>
            </form>
            <?= $message; ?> 
        </div>
    </main>
</body>
</html>
