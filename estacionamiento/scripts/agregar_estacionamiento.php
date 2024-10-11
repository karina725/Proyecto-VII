<?php
// scripts/agregar_estacionamiento.php
include('../config/db.php'); // Incluir configuración de base de datos
session_start(); // Iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_espacio = $_POST['numero_espacio'];
    $estado = $_POST['estado'];

    // Consulta para agregar el espacio de estacionamiento
    $query = "INSERT INTO estacionamientos (numero_espacio, estado) VALUES (:numero_espacio, :estado)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':numero_espacio', $numero_espacio);
    $stmt->bindParam(':estado', $estado);
    $stmt->execute();

    // Redireccionar de vuelta a la página de estacionamientos
    header("Location: ./public/estacionamientos.php");
    exit();
}
?>
