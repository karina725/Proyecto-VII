<?php
include('./config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usuario_id = $_POST['usuario_id'];
    $espacio_id = $_POST['espacio_id'];
    $fecha_reserva = $_POST['fecha_reserva'];

    $query = "UPDATE reservas SET usuario_id = :usuario_id, espacio_id = :espacio_id, fecha_reserva = :fecha_reserva WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->bindParam(':espacio_id', $espacio_id);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva);

    if ($stmt->execute()) {
        header("Location: ../public/reservas.php?message=Reserva actualizada exitosamente");
    } else {
        echo "Error al actualizar la reserva.";
    }
}