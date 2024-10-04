<?php
session_start();
require_once 'usuario/includes/php/limpiar.php';
require_once 'usuario/includes/php/conexion.php';

if (isset($_POST['btn-login'])) {
    $usuario_nombre = limpiar_cadena_html($_POST['user_email']);
    $user_password = limpiar_cadena_html($_POST['password']);

    try {
        // Consulta segura para buscar al usuario
        $stmt = $db_con->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario LIMIT 1");
        $stmt->bindParam(':usuario', $usuario_nombre);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        // Si se encuentra el usuario y la contraseña es correcta
        if ($count == 1) {
            // Verificar la contraseña utilizando password_verify
            if (password_verify($user_password, $row['user_pass'])) {
                echo "ok"; // Iniciar sesión con éxito
                $_SESSION['user_session'] = $row['email']; // Guardar el correo en la sesión
                $_SESSION['user_id'] = $row['id_usuario'];
                $_SESSION['user_nombre'] = $row['nombre_usuario'];
                $_SESSION['user_privilegios'] = $row['id_rol'];
                $_SESSION['user_pass'] = $row['user_pass']; // Almacenar la contraseña hasheada en la sesión (opcional)
            } else {
                echo "Usuario y/o Contraseña incorrecto(s)."; // Contraseña incorrecta
            }
        } else {
            echo "Usuario no encontrado o inactivo."; // Usuario no encontrado
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
