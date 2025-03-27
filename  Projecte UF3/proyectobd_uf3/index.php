<?php 
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online - Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Descubre los mejores productos</h1>
                <p>Calidad y precio en un solo lugar.</p>
                <a href="productos.php" class="btn btn-primary">Ver productos</a>
            </div>
        </section>

        <!-- Sección de Productos Destacados -->
        <section class="productos">
            <h2>Productos Destacados</h2>
            <div class="productos-grid">
                <?php 
                // Obtener productos de la base de datos (ejemplo)
                $result = $mysqli->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
                while ($row = $result->fetch_assoc()) :
                ?>
                    <div class="producto">
                        <img src="assets/img/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                        <h3><?= htmlspecialchars($row['name']) ?></h3>
                        <p><?= htmlspecialchars($row['description']) ?></p>
                        <span class="precio">€<?= number_format($row['price'], 2) ?></span>
                        <a href="producto.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Ver detalles</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

        <!-- Beneficios -->
        <section class="beneficios">
            <div class="beneficio">
                <img src="assets/icons/envio.png" alt="Envío Rápido">
                <h3>Envío Rápido</h3>
                <p>Recibe tu pedido en 24-48 horas.</p>
            </div>
            <div class="beneficio">
                <img src="assets/icons/garantia.png" alt="Garantía">
                <h3>Garantía de Calidad</h3>
                <p>Devolución sin problemas.</p>
            </div>
            <div class="beneficio">
                <img src="assets/icons/soporte.png" alt="Soporte">
                <h3>Atención al Cliente</h3>
                <p>Soporte 24/7 para ayudarte.</p>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>
