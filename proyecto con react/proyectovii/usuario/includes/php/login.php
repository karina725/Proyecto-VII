<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión solo si no se ha iniciado
}

// Verificar si la sesión del usuario está activa
if (!isset($_SESSION['user_session'])) {
    header("Location: ../index.php"); // Redirigir si no hay sesión activa
    exit();
}

date_default_timezone_set('UTC'); // Definir la zona horaria
$hoy = date("Y-m-d");

// Obtener el nombre de usuario desde la sesión
$usuario_nombre = $_SESSION['user_session'];

try {
    // Consulta para verificar los datos del usuario
    $stmt = $db_con->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
    $stmt->bindParam(":email", $usuario_nombre);
    $stmt->execute();

    // Obtener los datos del usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // La sesión es válida, continuar con el acceso
        $user_id = $usuario['id_usuario'];
        $user_nombre = $usuario['nombre_usuario'];
        $user_privilegios_id = $usuario['id_rol'];

        // Actualizar la sesión con la información obtenida si es necesario
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_nombre'] = $user_nombre;
        $_SESSION['user_privilegios'] = $user_privilegios_id;

    } else {
        // Usuario no encontrado: destruir la sesión y redirigir
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Error en la verificación de la sesión: " . $e->getMessage();
    exit();
}
?>
