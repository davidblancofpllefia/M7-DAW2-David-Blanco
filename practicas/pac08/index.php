<?php
session_start(); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $cognoms = $_POST['cognoms'] ?? '';
    $dificultat = $_POST['dificultat'] ?? '';
    $imagen_url = $_POST['imagen_url'] ?? ''; 


    $_SESSION['username'] = $username;
    $_SESSION['cognoms'] = $cognoms;
    $_SESSION['dificultat'] = $dificultat;
    $_SESSION['current_room'] = 1; 


    if (filter_var($imagen_url, FILTER_VALIDATE_URL)) {
        $_SESSION['imatge'] = $imagen_url; 
    } else {

        $_SESSION['imatge'] = ''; 
    }


    header("Location: room1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inici</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://basementescaperoom.com/los-angeles/template/images/room-header-bg-thebasement.jpg'); background-size:cover; background-repeat: no-repeat;">
    <div class="card p-4 bg-dark text-white" style="width: 22rem;">
        <h2 class="card-title text-center">Benvingut!</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cognoms" class="form-label">Cognoms:</label>
                <input type="text" name="cognoms" id="cognoms" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dificultat" class="form-label">Nivell de Dificultat:</label>
                <select name="dificultat" id="dificultat" class="form-select" required>
                    <option value="">Selecciona un nivell</option>
                    <option value="facil">Fàcil</option>
                    <option value="mig">Mig</option>
                    <option value="dificil">Difícil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen_url" class="form-label">URL de la Foto de Perfil:</label>
                <input type="url" name="imagen_url" id="imagen_url" class="form-control" required placeholder="Introduce la URL de tu imagen">
            </div>
            <button type="submit" class="btn btn-primary w-100">Comença el Joc</button>
        </form>
    </div>
</body>
</html>
