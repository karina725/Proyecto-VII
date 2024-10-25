<?php

// Verificar si se ha proporcionado un ID de usuario para eliminar
if (isset($_GET['id_pension'])) {

    $id_pension = $_GET['id_pension'];

    // Iniciar transacción
    $db_con->beginTransaction();

    // Eliminar el registro de pensiones
    $stmt_eliminar_pensiones = $db_con->prepare("DELETE FROM pensiones WHERE id_pension = :id_pension");
    $stmt_eliminar_pensiones->bindParam(':id_pension', $id_pension);
    $stmt_eliminar_pensiones->execute();

    // Confirmar transacción
    $db_con->commit();

    // Redirigir después de la eliminacion
    header("Location: ../?q=pensiones/&mensaje=30"); 
    exit();

} else {

    header("Location: ../?q=pensiones/&mensaje=2");
    exit();

}
