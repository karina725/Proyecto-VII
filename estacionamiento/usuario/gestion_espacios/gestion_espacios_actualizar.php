<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_estacionamiento = limpiar_cadena($_POST['id_estacionamiento'], $mysqli);
    $numero_espacio = limpiar_cadena($_POST['numero_espacio'], $mysqli);
    $estado = limpiar_cadena($_POST['estado'], $mysqli);
    $descripcion = limpiar_cadena($_POST['descripcion'], $mysqli);
    $placa = limpiar_cadena($_POST['placa'], $mysqli);
    $modelo = limpiar_cadena($_POST['modelo'], $mysqli);
    $seguro = limpiar_cadena($_POST['seguro'], $mysqli);

    // Consulta para actualizar el registro
    $sql = "UPDATE estacionamientos SET 
            numero_espacio = '$numero_espacio', 
            estado = '$estado', 
            descripcion = '$descripcion', 
            placa = '$placa', 
            modelo = '$modelo', 
            seguro = '$seguro' 
            WHERE id_estacionamiento = $id_estacionamiento";

    // Ejecutar la consulta y verificar si se ejecutó correctamente
    if ($mysqli->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">
                Registro actualizado correctamente.
              </div>';
        header("Location: ?q=gestion-espacios/"); // Redirigir a la página de gestión
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error al actualizar el registro: ' . $mysqli->error . '
              </div>';
    }
}
