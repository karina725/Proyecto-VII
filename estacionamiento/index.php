<?php
// public/index.php
include('./config/db.php');
session_start();

// Mostrar errores para la depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function limpiarDato($dato) {
    return htmlspecialchars(trim($dato));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = limpiarDato($_POST['email']);
    $password = $_POST['password'];

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['contraseña'])) {
        $_SESSION['user_id'] = $usuario['id'];
        //$_SESSION['nivel_privilegios'] = $usuario['nivel_privilegios']; // Suponiendo que tienes un campo de nivel de privilegios
        header("Location: public/estacionamientos.php");
        exit();
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
    </div>
</body>

</html>