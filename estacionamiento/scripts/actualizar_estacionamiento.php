<?php
// scripts/actualizar_estacionamiento.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estacionamiento = $_POST['id_estacionamiento'];
    $numero_espacio = $_POST['numero_espacio'];
    $estado = $_POST['estado'];

    $query = "UPDATE estacionamientos SET numero_espacio = :numero_espacio, estado = :estado WHERE id_estacionamiento = :id_estacionamiento";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt->bindParam(':numero_espacio', $numero_espacio);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Espacio actualizado exitosamente");
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error al actualizar el espacio de estacionamiento.";
    }
}
?>