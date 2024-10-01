<?php
// scripts/agregar_reserva.php
include('../config/db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empleado = $_SESSION['user_id']; 
    $id_estacionamiento = $_POST['numero_espacio']; 
    $fecha_reserva = $_POST['fecha_reserva']; 
    $horario_inicio = $_POST['horario_inicio']; 
    $estado = "Reservado"; 

    $query = "INSERT INTO reservas (id_empleado, id_estacionamiento, fecha_reserva, horario_inicio, estado, fecha_creacion) 
              VALUES (:id_empleado, :id_estacionamiento, :fecha_reserva, :horario_inicio, :estado, NOW())";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva);
    $stmt->bindParam(':horario_inicio', $horario_inicio);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Reserva agregada exitosamente.");
        exit();
    } else {
        echo "Error al agregar la reserva.";
    }
}
?>
