<?php
ob_start(); 
?>

<div class="container mt-5">
    <h1 class="text-center">Ex2. Mini-jocs</h1>

    <form action="" method="GET" class="text-center mt-4">
        <label for="joc">Selecciona un joc:</label>
        <select name="joc" id="joc" class="form-select w-50 mx-auto">
            <option value="">Selecciona un joc</option>
            <option value="joc1">Joc 1</option>
            <option value="joc2">Joc 2</option>
            <option value="joc3">Joc 3</option>
            <option value="joc4">Joc 4</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Jugar</button>
    </form>
</div>

<?php

if (isset($_GET['joc']) && $_GET['joc'] != "") {
    $joc = $_GET['joc'];  
    header("Location: jocs/{$joc}.php");
    exit();
}
?>

<?php
ob_end_flush(); 
?>
