<?php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_reserva = $_POST['id_reserva'];  
    $usuario_id = $_POST['usuario_id'];
    $espacio_id = $_POST['espacio_id'];

    $query = "UPDATE reservas SET usuario_id = :usuario_id, espacio_id = :espacio_id WHERE id_reserva = :id_reserva"; 
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_reserva', $id_reserva);  
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->bindParam(':espacio_id', $espacio_id);

    if ($stmt->execute()) {
        header("Location: ../public/reservas.php?message=Reserva actualizada exitosamente");
    } else {
        echo "Error al actualizar la reserva.";
    }
}
?>
