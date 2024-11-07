<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombrero Seleccionador de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Benvinguts a Hogwarts</h1>
        <h1>Introduïu les vostres dades</h1>
        <form action="bienvenida.php" method="POST">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="cognoms">Cognoms:</label>
            <input type="text" id="cognoms" name="cognoms" required><br><br>

            <input type="submit" value="Enviar">
        </form>
</div>
</body>
</html>