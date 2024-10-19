<?php
// scripts/agregar_empleado.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = limpiarDato($_POST['nombre']);
    $email = limpiarDato($_POST['email']);
    $posicion = limpiarDato($_POST['posicion']);

    $query = "INSERT INTO empleados (nombre, email, posicion) VALUES (:nombre, :email, :posicion)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':posicion', $posicion);

    if ($stmt->execute()) {
        header("Location: ../public/empleados.php?message=Empleado registrado exitosamente");
    } else {
        echo "Error al registrar el empleado.";
    }
}
