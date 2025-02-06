<?php
ob_start(); 
include 'header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrones Estructurales</h1>
    <p class="text-center">
        Los patrones estructurales explican cómo se organizan y relacionan las clases y objetos
        para formar estructuras más grandes y reutilizables.
    </p>

    <form action="" method="GET" class="text-center mt-4">
        <label for="patron">Selecciona un patrón:</label>
        <select name="patron" id="patron" class="form-select w-50 mx-auto">
            <option value="">Selecciona un patrón</option>
            <option value="adapter">Adapter</option>
            <option value="bridge">Bridge</option>
            <option value="composite">Composite</option>
            <option value="decorator">Decorator</option>
            <option value="facade">Facade</option>
            <option value="flyweight">Flyweight</option>
            <option value="proxy">Proxy</option>
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



