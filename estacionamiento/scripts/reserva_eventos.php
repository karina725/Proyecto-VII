<?php
include('../config/db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_evento = $_POST['id_evento'];
    $id_usuario = $_POST['id_usuario'];
    $espacio_id = $_POST['espacio_id'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $estado = "Reservado";

    $query = "INSERT INTO reservas_evento (id_evento, id_usuario, espacio_id, fecha_reserva, hora_inicio, hora_fin, estado)
              VALUES (:id_evento, :id_usuario, :espacio_id, :fecha_reserva, :hora_inicio, :hora_fin, :estado)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_evento', $id_evento);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':espacio_id', $espacio_id);
    $stmt->bindParam(':fecha_reserva', $fecha_reserva);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fin', $hora_fin);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        echo "Espacio reservado exitosamente para el evento.";
    } else {
        echo "Error al reservar el espacio.";
    }
}
?>
