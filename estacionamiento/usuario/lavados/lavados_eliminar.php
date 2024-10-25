<?php

// Verificar si se ha proporcionado un ID de usuario para eliminar
if (isset($_GET['id_lavado'])) {

    $id_lavado = $_GET['id_lavado'];

    // Iniciar transacción
    $db_con->beginTransaction();

    // Eliminar el registro de lavados
    $stmt_eliminar_lavados = $db_con->prepare("DELETE FROM lavados WHERE id_lavado = :id_lavado");
    $stmt_eliminar_lavados->bindParam(':id_lavado', $id_lavado);
    $stmt_eliminar_lavados->execute();

    // Confirmar transacción
    $db_con->commit();

    // Redirigir después de la eliminacion
    header("Location:../?q=lavados/&mensaje=30"); 
    exit();

} else {

    header("Location:../?q=lavados/&mensaje=2");
    exit();

}
