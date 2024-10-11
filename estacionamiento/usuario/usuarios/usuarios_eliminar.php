<?php

// Verificar si se ha proporcionado un ID de usuario para eliminar
if (isset($_GET['id_usuario'])) {
    $id_usuario = limpiar_cadena_html($_GET['id_usuario']); // Limpiar el ID del usuario

    try {
        // Iniciar transacción
        $db_con->beginTransaction();

        // Eliminar el empleado asociado al usuario en la tabla 'empleados'
        $stmt_eliminar_empleado = $db_con->prepare("DELETE FROM empleados WHERE id_usuario = :id_usuario");
        $stmt_eliminar_empleado->bindParam(':id_usuario', $id_usuario);
        $stmt_eliminar_empleado->execute();

        // Luego eliminar el usuario en la tabla 'usuarios'
        $stmt_eliminar_usuario = $db_con->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
        $stmt_eliminar_usuario->bindParam(':id_usuario', $id_usuario);
        $stmt_eliminar_usuario->execute();

        // Confirmar transacción
        $db_con->commit();

        // Redirigir a la página de gestión con un mensaje de éxito
        header("Location: ?q=usuarios/&mensaje=1");
        exit();
    } catch (PDOException $e) {
        // Si ocurre algún error, hacer rollback
        $db_con->rollBack();
        echo "<div class='alert alert-danger'>Error al eliminar usuario/empleado: " . $e->getMessage() . "</div>";
    }
} else {
    // Si no se proporciona un ID, redirigir a la página de gestión de usuarios
    header("Location: ?q=usuarios/&mensaje=2");
    exit();
}
