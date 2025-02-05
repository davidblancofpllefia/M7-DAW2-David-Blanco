<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Patrones Estructurales</h1>
    <p class="text-center">
        Los patrones estructurales explican cómo se organizan y relacionan las clases y objetos
        para formar estructuras más grandes y reutilizables.
    </p>

    <form action="patron.php" method="GET" class="text-center mt-4">
        <label for="patron">Selecciona un patrón:</label>
        <select name="patron" id="patron" class="form-select w-50 mx-auto">
            <option value="adaptador">Adaptador</option>
            <option value="decorador">Decorador</option>
            <option value="fachada">Fachada</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Ver información</button>
    </form>
</div>

