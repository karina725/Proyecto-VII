<?php

// Verificar si se ha proporcionado un ID de usuario para eliminar
if (isset($_GET['id_evento'])) {

    $id_evento = $_GET['id_evento'];

    // Iniciar transacción
    $db_con->beginTransaction();

    // Eliminar el registro de lavados
    $stmt_eliminar_eventos = $db_con->prepare("DELETE FROM eventos WHERE id_evento = :id_evento");
    $stmt_eliminar_eventos->bindParam(':id_evento', $id_evento);
    $stmt_eliminar_eventos->execute();

    // Confirmar transacción
    $db_con->commit();

    // Redirigir después de la eliminacion
    header("Location: ?q=reservas_evento/&mensaje=30"); 
    exit();

} else {

    header("Location: ?q=reservas_evento/&mensaje=2");
    exit();
}
