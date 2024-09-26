<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu fruta favorita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .seleccionada {
            background-color: #c8e6c9; 
        }
    </style>
</head>
<body>
<?php
$frutas = [
    [
        "imagen" => "https://comedelahuerta.com/wp-content/uploads/2019/09/MANZANA-ROYAL-GALA-ECOLOGICO-COMEDELAHUERTA-1.jpg",
        "nombre" => "Manzana",
    ],
    [
        "imagen" => "https://platanosruiz.com/wp-content/uploads/2023/02/platano-montaje.jpg",
        "nombre" => "Platano",
    ],
    [
        "imagen" => "https://www.ammarket.com/wp-content/uploads/2021/12/NARANJA_MESA_AMMARKET.COM_2.jpg",
        "nombre" => "Naranja",
    ],
    [
        "imagen" => "https://libbys.es/wordpress/wp-content/uploads/2018/05/fresas.jpg",
        "nombre" => "Fresa",
    ],
    [
        "imagen" => "https://frutasbollo.es/wp-content/uploads/2021/12/kiwi.png",
        "nombre" => "Kiwi",
    ],
];

// Obtener la fruta seleccionada
$frutaSeleccionada = isset($_GET['fruta']) ? $_GET['fruta'] : null;

// Generar HTML para la tarjeta de la fruta seleccionada
$tarjetaHtml = '';
if ($frutaSeleccionada) {
    foreach ($frutas as $fruta) {
        if ($fruta['nombre'] === $frutaSeleccionada) {
            $tarjetaHtml .= '
                <div class="card mt-4 w-25 shadow-lg">
                    <img src="' . $fruta['imagen'] . '" class="card-img-top img-fluid" alt="' . $fruta['nombre'] . '">
                    <div class="card-body bg-warning">
                        <h5 class="card-title">' . $fruta['nombre'] . '</h5>
                        <p class="card-text">¡Esta es tu fruta favorita!</p>
                    </div>
                </div>';
        }
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center">Selecciona tu fruta favorita</h1>

    <table class="table table-bordered mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Fruta</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frutas as $fruta): ?>
                <tr class="<?php echo ($fruta['nombre'] === $frutaSeleccionada) ? 'seleccionada' : 'table-danger'; ?>">
                    <td><?php echo $fruta['nombre']; ?></td>
                    <td><?php echo ($fruta['nombre'] === $frutaSeleccionada) ? '✔️ Seleccionada' : '✖ No seleccionada'; ?></td>
                    <td>
                        <form method="GET" action="">
                            <input type="hidden" name="fruta" value="<?php echo $fruta['nombre']; ?>">
                            <button type="submit" class="btn btn-primary">Seleccionar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Mostrar tarjeta de la fruta seleccionada -->
    <div class="row mt-4">
        <?php if ($tarjetaHtml): ?>
            <?php echo $tarjetaHtml; ?>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
