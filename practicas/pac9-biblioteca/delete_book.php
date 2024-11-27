<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['libros'][$id])) {
        unset($_SESSION['libros'][$id]);
        $_SESSION['libros'] = array_values($_SESSION['libros']);  // Reindexar el array
    }
}

header('Location: home.php');
exit;
?>
