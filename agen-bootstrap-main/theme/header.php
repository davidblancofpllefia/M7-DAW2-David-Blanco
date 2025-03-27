<?php
require_once 'config.php'; 
?>

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="Tienda"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Tienda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
    </div>
    <!-- Zona de inicio de sesión fuera del ul -->

    <nav class="  gap-5">
    <?php if (isset($_SESSION['user_id'])): ?>
      <div class="">
        <!-- Nombre de usuario con espacio a la derecha -->
        <span class="fw-bold text-white gap-5">Bienvenido! <?= ($_SESSION['user_name']) ; ?> <?= ($_SESSION['user_surname']) ; ?></span>
        
        <img src="<?= !empty($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : 'ruta-a-imagen-por-defecto.jpg'; ?>" 
             alt="Avatar de <?= ($_SESSION['user_name']); ?>" 
             class="rounded-circle me-3" 
             style="width: 60px; height: 60px; object-fit: cover;">
        
        <!-- Icono de administrador (si tiene el rol de admin) con espacio a la derecha -->
        <?php if ($_SESSION['user_rol'] === 'admin') : ?>
          <a href="./admin/admin.php" class="ms-2 me-3">
         <img src="https://cdn-icons-png.flaticon.com/512/58/58308.png" class="rounded" style="width: 40px; height: 40px; object-fit: cover; filter: brightness(0) invert(1);">
        </a>
        <?php endif; ?>
        <a href="logout.php" class="btn btn-outline-danger btn-sm">Cerrar Sesión</a>
      </div>
    <?php else: ?>
      <a href="login.php" class="btn btn-primary btn-sm">Iniciar Sesión</a>
      <a href="register.php" class="btn btn-success btn-sm">Registrarse</a>
    <?php endif; ?>
  </nav>
</div>

  </nav>
    </div>
  </nav>
</header>