<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM reservas WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: ../public/reservas.php?message=Reserva eliminada exitosamente");
    } else {
        echo "Error al eliminar la reserva.";
    }
}
