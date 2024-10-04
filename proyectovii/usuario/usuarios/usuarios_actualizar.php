<?php
session_start();
require_once 'includes/php/conexion.php'; // Conexión a la base de datos
require_once 'includes/php/limpiar.php'; // Funciones de limpieza y sanitización

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $id_usuario = limpiar_cadena_html($_POST['id_usuario']);
    $nombre_usuario = limpiar_cadena_html($_POST['nombre_usuario']);
    $email = limpiar_cadena_html($_POST['email']);
    $id_rol = limpiar_cadena_html($_POST['id_rol']);
    $numero_empleado = limpiar_cadena_html($_POST['numero_empleado']);
    $nombre_completo = limpiar_cadena_html($_POST['nombre_completo']);

    try {
        // Iniciar transacción
        $db_con->beginTransaction();

        // Actualizar datos del usuario
        $stmt_update_usuario = $db_con->prepare("UPDATE usuarios SET nombre_usuario = :nombre_usuario, email = :email, id_rol = :id_rol WHERE id_usuario = :id_usuario");
        $stmt_update_usuario->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt_update_usuario->bindParam(':email', $email);
        $stmt_update_usuario->bindParam(':id_rol', $id_rol);
        $stmt_update_usuario->bindParam(':id_usuario', $id_usuario);
        $stmt_update_usuario->execute();

        // Actualizar datos del empleado
        $stmt_update_empleado = $db_con->prepare("UPDATE empleados SET numero_empleado = :numero_empleado, nombre_completo = :nombre_completo WHERE id_usuario = :id_usuario");
        $stmt_update_empleado->bindParam(':numero_empleado', $numero_empleado);
        $stmt_update_empleado->bindParam(':nombre_completo', $nombre_completo);
        $stmt_update_empleado->bindParam(':id_usuario', $id_usuario);
        $stmt_update_empleado->execute();

        // Confirmar transacción
        $db_con->commit();

        // Redirigir después de la actualización
        header("Location: ?q=usuarios/&mensaje=1"); // Éxito en la actualización
        exit();
    } catch (PDOException $e) {
        // En caso de error, hacer rollback
        $db_con->rollBack();
        echo "<div class='alert alert-danger'>Error al actualizar usuario/empleado: " . $e->getMessage() . "</div>";
    }
} else {
    header("Location: ?q=usuarios/&mensaje=2");
    exit(); // Redirigir si el acceso no es por POST
}
?>
