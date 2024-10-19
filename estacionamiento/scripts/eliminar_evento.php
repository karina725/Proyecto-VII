<?php
// scripts/eliminar_evento.php
include('../config/db.php'); 

if (isset($_GET['id_evento'])) {
    $id_evento = $_GET['id_evento']; 
    
    $query = "DELETE FROM eventos WHERE id_evento = :id_evento"; 
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_evento', $id_evento);
    
    if ($stmt->execute()) {
        header("Location: ../public/crear_evento.php?message=Evento eliminado exitosamente");
        exit(); 
    } else {
        echo "Error al eliminar el evento.";
    }
} else {
    echo "No se proporcionó un nombre de evento.";
}
?>
