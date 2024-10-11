<?php
// scripts/agregar_reserva.php
include('../config/db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empleado = $_SESSION['user_id']; 
    $id_estacionamiento = $_POST['numero_espacio']; 
    $fecha_reserva = $_POST['fecha_reserva']; 
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $descripcion = $_POST['descripcion']; 
    $estado = "Reservado"; 

    // Asegúrate de que el número de columnas coincida con el número de valores
    $query = "INSERT INTO reservas (id_empleado, id_estacionamiento, fecha_reserva, hora_inicio, hora_fin, descripcion, estado, fecha_creacion) 
              VALUES (:id_empleado, :id_estacionamiento, :fecha_reserva, :hora_inicio, :hora_fin, :descripcion, :estado, NOW())";

    // Preparar la consulta
    $stmt = $pdo->prepare($query);

    // Vincular los parámetros
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fin', $hora_fin);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':estado', $estado);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: ../public/estacionamientos.php?message=Reserva agregada exitosamente.");
        exit();
    } else {
        echo "Error al agregar la reserva.";
    }
}
?>
