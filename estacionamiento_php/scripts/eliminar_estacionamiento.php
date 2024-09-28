<?php
// scripts/eliminar_estacionamiento.php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM estacionamientos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Espacio de estacionamiento eliminado exitosamente");
    } else {
        echo "Error al eliminar el espacio de estacionamiento.";
    }
}
