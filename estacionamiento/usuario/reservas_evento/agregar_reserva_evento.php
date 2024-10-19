<?php

session_start();

require_once '../includes/php/conexion.php'; 
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger y limpiar los datos del formulario
    $nombre_usuario = limpiar_cadena_html($_POST['nombre_usuario']);
    $email = limpiar_cadena_html($_POST['email']);
    $password = password_hash(limpiar_cadena_html($_POST['password']), PASSWORD_BCRYPT); // Encriptar la contraseña
    $id_rol = $_POST['id_rol'];
    $numero_empleado = limpiar_cadena_html($_POST['numero_empleado']);
    $nombre_completo = limpiar_cadena_html($_POST['nombre_completo']);

    try {
        // Verificar si el número de empleado ya existe
        $stmt_check = $db_con->prepare("SELECT * FROM empleados WHERE numero_empleado = :numero_empleado");
        $stmt_check->bindParam(':numero_empleado', $numero_empleado);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            header("Location: ?q=usuarios/&mensaje=10");
        } else {
            // Insertar el nuevo usuario en la tabla usuarios
            $stmt_usuario = $db_con->prepare("INSERT INTO usuarios (nombre_usuario, email, contraseña, id_rol) VALUES (:nombre_usuario, :email, :contraseña, :id_rol)");
            $stmt_usuario->bindParam(':nombre_usuario', $nombre_usuario);
            $stmt_usuario->bindParam(':email', $email);
            $stmt_usuario->bindParam(':contraseña', $password);
            $stmt_usuario->bindParam(':id_rol', $id_rol);
            $stmt_usuario->execute();

            // Obtener el ID del nuevo usuario
            $id_usuario = $db_con->lastInsertId();

            // Insertar el nuevo empleado en la tabla empleados
            $stmt_empleado = $db_con->prepare("INSERT INTO empleados (numero_empleado, nombre_completo, id_usuario) VALUES (:numero_empleado, :nombre_completo, :id_usuario)");
            $stmt_empleado->bindParam(':numero_empleado', $numero_empleado);
            $stmt_empleado->bindParam(':nombre_completo', $nombre_completo);
            $stmt_empleado->bindParam(':id_usuario', $id_usuario);
            $stmt_empleado->execute();

            // Redirigir después de agregar
            header("Location: ?q=usuarios/&mensaje=10");
            exit();
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al agregar usuario/empleado: " . $e->getMessage() . "</div>";
    }
} else {
    header("Location: ?q=usuarios/&mensaje=2");
    exit(); // Redirigir si el acceso no es por POST
}
