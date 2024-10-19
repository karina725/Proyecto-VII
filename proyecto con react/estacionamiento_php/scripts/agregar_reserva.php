<?php
// scripts/agregar_reserva.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['usuario_id'];
    $espacio_id = $_POST['espacio_id'];
    $fecha_reserva = $_POST['fecha_reserva'];

    $query = "INSERT INTO reservas (usuario_id, espacio_id, fecha_reserva) VALUES (:usuario_id, :espacio_id, :fecha_reserva)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->bindParam(':espacio_id', $espacio_id);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva);

    if ($stmt->execute()) {
        header("Location: ../public/reservas.php?message=Reserva creada exitosamente");
    } else {
        echo "Error al crear la reserva.";
    }
}
