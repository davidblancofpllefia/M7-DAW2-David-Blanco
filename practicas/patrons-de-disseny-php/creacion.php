<?php
ob_start(); 
include 'header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrones Creacionales</h1>
    <p class="text-center">
        Los patrones creacionales se centran en la forma en que se crean los objetos, mejorando la flexibilidad
        y reutilización del código.
    </p>

    <form action="" method="GET" class="text-center mt-4">
        <label for="patron">Selecciona un patrón:</label>
        <select name="patron" id="patron" class="form-select w-50 mx-auto">
            <option value="">Selecciona un patrón</option>
            <option value="method">Factory Method</option>
            <option value="factory">Abstract Factory</option>
            <option value="builder">Builder</option>
            <option value="prototype">Prototype</option>
            <option value="singleton">Singleton</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Ver información</button>
    </form>
</div>

<?php

if (isset($_GET['patron']) && $_GET['patron'] != "") {
    $patron = $_GET['patron'];
    header("Location: patrons/{$patron}.php");
    exit();
}
?>

<?php
ob_end_flush(); 
?>
