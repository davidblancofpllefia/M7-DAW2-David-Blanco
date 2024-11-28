<?php

function agregar_producto($nombre, $precio, $descripcion) {
    global $productos; 
    $producto_nuevo = array('nombre' => $nombre, 'precio' => $precio, 'descripcion' => $descripcion);
    $productos[] = $producto_nuevo; 
}

function eliminar_producto($indice) {
    global $productos;
    if (isset($productos[$indice])) {
        unset($productos[$indice]);  
        $productos = array_values($productos);
    }
}
?>
