<?php
// scripts/agregar_usuario.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = limpiarDato($_POST['nombre']);
    $email = limpiarDato($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (:nombre, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header("Location: ../public/usuarios.php?message=Usuario registrado exitosamente");
    } else {
        echo "Error al registrar el usuario.";
    }
}
