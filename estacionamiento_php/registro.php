<?php
// public/registro.php
include('../config/db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = limpiarDato($_POST['nombre']);
    $email = limpiarDato($_POST['email']);
    $password = $_POST['password'];
    $nivel_privilegios = "usuario"; // Asignar un nivel de privilegio predeterminado para los nuevos usuarios

    // Registrar el nuevo usuario
    $query = "INSERT INTO usuarios (nombre, email, contraseña, nivel_privilegios) VALUES (:nombre, :email, :password, :nivel_privilegios)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindParam(':nivel_privilegios', $nivel_privilegios);

    if ($stmt->execute()) {
        $usuario_id = $pdo->lastInsertId(); // Obtener el ID del nuevo usuario

        // Registrar automáticamente como empleado
        $queryEmpleado = "INSERT INTO empleados (usuario_id, nombre, email) VALUES (:usuario_id, :nombre, :email)";
        $stmtEmpleado = $pdo->prepare($queryEmpleado);
        $stmtEmpleado->bindParam(':usuario_id', $usuario_id);
        $stmtEmpleado->bindParam(':nombre', $nombre);
        $stmtEmpleado->bindParam(':email', $email);

        if ($stmtEmpleado->execute()) {
            header("Location: index.php?message=Registro exitoso. Ahora puedes iniciar sesión.");
            exit();
        } else {
            echo "Error al registrar como empleado.";
        }
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form action="registro.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a>.</p>
    </div>
</body>

</html>