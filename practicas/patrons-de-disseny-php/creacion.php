<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Patrones Creacionales</h1>
    <p class="text-center">
        Los patrones creacionales se centran en la forma en que se crean los objetos, mejorando la flexibilidad
        y reutilización del código.
    </p>

    <form action="patron.php" method="GET" class="text-center mt-4">
        <label for="patron">Selecciona un patrón:</label>
        <select name="patron" id="patron" class="form-select w-50 mx-auto">
            <option value="singleton">Singleton</option>
            <option value="fabricamethod">Fábrica Método</option>
            <option value="prototipo">Prototipo</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Ver información</button>
    </form>
</div>

