<?php
// public/registro.php
include('./config/db.php');
session_start();

// Definir la función limpiarDato si no está en db.php
function limpiarDato($dato) {
    $dato = trim($dato); 
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato); 
    return $dato;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = limpiarDato($_POST['nombre_usuario']);
    $email = limpiarDato($_POST['email']);
    $password = $_POST['password'];
    $id_rol = 1; // Asignar un rol predeterminado (usuario regular, por ejemplo)

    // Registrar el nuevo usuario
    $query = "INSERT INTO usuarios (nombre_usuario, email, contraseña, id_rol) VALUES (:nombre_usuario, :email, :password, :id_rol)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindParam(':id_rol', $id_rol);

    if ($stmt->execute()) {
        $id_usuario = $pdo->lastInsertId(); // Obtener el ID del nuevo usuario

        // Registrar automáticamente como empleado
        $numero_empleado = rand(1000, 9999); // Generar un número de empleado aleatorio
        $queryEmpleado = "INSERT INTO empleados (numero_empleado, nombre_completo, id_usuario) VALUES (:numero_empleado, :nombre_completo, :id_usuario)";
        $stmtEmpleado = $pdo->prepare($queryEmpleado);
        $stmtEmpleado->bindParam(':numero_empleado', $numero_empleado);
        $stmtEmpleado->bindParam(':nombre_completo', $nombre_usuario); // Usamos el nombre del usuario para el nombre completo del empleado
        $stmtEmpleado->bindParam(':id_usuario', $id_usuario);

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
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" required>
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