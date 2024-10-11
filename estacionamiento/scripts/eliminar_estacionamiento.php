<?php
// scripts/eliminar_estacionamiento.php
include('../config/db.php');

if (isset($_GET['id_estacionamiento'])) {
    $id_estacionamiento = $_GET['id_estacionamiento'];
    $query = "DELETE FROM estacionamientos WHERE id_estacionamiento = :id_estacionamiento";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_estacionamiento', $id_estacionamiento);

    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Espacio de estacionamiento eliminado exitosamente");
    } else {
        echo "Error al eliminar el espacio de estacionamiento.";
    }
}
?>