<?php
// Función 1: generarTablaProductos
function generarTablaProductos($productos) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Nombre</th>';
    echo '<th>Precio</th>';
    echo '<th>Disponibilidad</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer los productos y mostrar una fila por cada producto
    foreach ($productos as $producto) {
        // Definir color de fila en función de la disponibilidad
        $rowClass = $producto['disponibilidad'] ? '' : 'table-danger'; // rojo si está agotado

        echo '<tr class="' . $rowClass . '">';
        echo '<td>' . ucfirst($producto['nombre']) . '</td>';
        echo '<td>' . number_format($producto['precio'], 2) . ' €</td>';
        echo '<td>' . ($producto['disponibilidad'] ? 'En stock' : 'Agotado') . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

// Función 2: muestraInfoContacto
function muestraInfoContacto($nombre, $telefono, $foto) {
    echo '<div class="alert alert-info mt-4">';
    echo '<h4>Información de contacto</h4>';
    echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>';
    echo '<p><strong>Teléfono:</strong> ' . htmlspecialchars($telefono) . '</p>';
    
    // Verificar si se ha proporcionado una foto y mostrarla
    if (!empty($foto)) {
        echo '<p><strong>Foto de perfil:</strong></p>';
        echo '<img src="' . htmlspecialchars($foto) . '" alt="Foto de perfil" class="rounded-circle" style="width: 100px; height: 100px;">';
    } else {
        echo '<p><strong>No se proporcionó foto de perfil.</strong></p>';
    }

    echo '</div>';
}
?>
