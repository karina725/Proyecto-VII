<?php
include('../config/db.php');

if (isset($_GET['id_estacionamiento'])) {
    $id_estacionamiento = $_GET['id_estacionamiento'];
    $query = "DELETE FROM reservas WHERE id_estacionamiento = :id_estacionamiento";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_estacionamiento', $id_estacionamiento);

    if ($stmt->execute()) {
        header("Location: ../public/reservas.php?message=Reserva eliminada exitosamente");
    } else {
        echo "Error al eliminar la reserva.";
    }
}
?>