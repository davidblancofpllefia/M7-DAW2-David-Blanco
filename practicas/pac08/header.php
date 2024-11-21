<?php if (isset($_SESSION['username'], $_SESSION['dificultat'], $_SESSION['imatge'])): ?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <img src="<?= htmlspecialchars($_SESSION['imatge']); ?>" alt="Foto de perfil" class="rounded-circle me-2" style="width: 40px; height: 40px;">
            <span class="navbar-text text-white">
                <?= htmlspecialchars($_SESSION['username']) . ' ' . htmlspecialchars($_SESSION['cognoms']); ?> | Dificultat: <?= htmlspecialchars($_SESSION['dificultat']); ?>
            </span>
        </div>
    </div>
</nav>
<?php endif; ?>
