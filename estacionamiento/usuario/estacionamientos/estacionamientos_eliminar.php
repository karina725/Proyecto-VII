<?php
// Verificar si se ha proporcionado un ID de usuario para eliminar
if (isset($_GET['id_estacionamiento'])) {

    $id_estacionamiento = $_GET['id_estacionamiento'];

    // Iniciar transacción
    $db_con->beginTransaction();

    // Eliminar el registro de estacionamientos
    $stmt_eliminar_estacionamientos = $db_con->prepare("DELETE FROM estacionamientos WHERE id_estacionamiento = :id_estacionamiento");
    $stmt_eliminar_estacionamientos->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt_eliminar_estacionamientos->execute();

    // Confirmar transacción
    $db_con->commit();

    // Redirigir después de la eliminacion
    header("Location: ../?q=estacionamientos/&mensaje=20"); 
    exit();

} else {

    header("Location: ../?q=estacionamientos/&mensaje=2");
    exit();

}
