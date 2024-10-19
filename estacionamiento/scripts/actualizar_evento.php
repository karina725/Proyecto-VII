<?php
// scripts/actualizar_evento.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_evento = $_POST['id_evento'];
    $nombre_evento = $_POST['nombre_evento'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE eventos SET nombre_evento = :nombre_evento, descripcion = :descripcion WHERE id_evento = :id_evento";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_evento', $id_evento);
    $stmt->bindParam(':nombre_evento', $nombre_evento);
    $stmt->bindParam(':descripcion', $descripcion);

    if ($stmt->execute()) {
        header("Location: ../public/crear_evento.php?message=Evento actualizado exitosamente");
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error al actualizar el evento.";
    }
}
?>