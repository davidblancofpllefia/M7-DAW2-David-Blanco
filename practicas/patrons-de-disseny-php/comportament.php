<?php
ob_start(); 
include 'header.php';
?>

<div class="container mt-5">
    <h1 class="text-center">Patrones de Comportamiento</h1>
    <p class="text-center">
        Los patrones de comportamiento definen la comunicación entre objetos y la asignación de responsabilidades.
    </p>

    <form action="" method="GET" class="text-center mt-4">
        <label for="patron">Selecciona un patrón:</label>
        <select name="patron" id="patron" class="form-select w-50 mx-auto">
            <option value="">Selecciona un patrón</option>
            <option value="chain">Chain of Responsibility</option>
            <option value="command">Command</option>
            <option value="iterator">Iterator</option>
            <option value="mediator">Mediator</option>
            <option value="memento">Memento</option>
            <option value="observer">Observer</option>
            <option value="state">State</option>
            <option value="strategy">Strategy</option>
            <option value="strategy">Template Method</option>
            <option value="strategy">Visitor</option>
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
