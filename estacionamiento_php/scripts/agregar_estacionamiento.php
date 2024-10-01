<?php
// scripts/agregar_estacionamiento.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_espacio = limpiarDato($_POST['numero_espacio']);
    $estado = limpiarDato($_POST['estado']);

    $query = "INSERT INTO estacionamientos (numero_espacio, estado) VALUES (:numero_espacio, :estado)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':numero_espacio', $numero_espacio);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Espacio de estacionamiento agregado exitosamente");
    } else {
        echo "Error al agregar el espacio de estacionamiento.";
    }
}
