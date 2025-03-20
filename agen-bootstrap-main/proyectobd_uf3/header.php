<?php 
session_start();
?>
<header>
    <h1>Tienda Online</h1>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="contacto.php">Contacto</a></li>

            <?php if (isset($_SESSION['user_id'])) : ?>
                <li>
                    <a href="perfil.php">
                        <img src="<?= htmlspecialchars($_SESSION['user_avatar'] ?? 'assets/img/default-avatar.png') ?>" 
                             alt="Avatar de usuario" 
                             style="width: 40px; height: 40px; border-radius: 50%;">
                        <?= htmlspecialchars($_SESSION['user_name'] ?? 'Usuario') ?>
                    </a>
                </li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php else : ?>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="registro.php">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
