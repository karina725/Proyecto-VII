<?php
// scripts/actualizar_estacionamiento.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $numero_espacio = $_POST['numero_espacio'];
    $estado = $_POST['estado'];

    $query = "UPDATE estacionamientos SET numero_espacio = :numero_espacio, estado = :estado WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':numero_espacio', $numero_espacio);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Espacio actualizado exitosamente");
    } else {
        echo "Error al actualizar el espacio de estacionamiento.";
    }
}
