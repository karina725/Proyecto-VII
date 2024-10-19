<?php
// Importar la conexión a la base de datos
require 'db.php';

// Verificar si la placa ha sido enviada vía POST
if (isset($_POST['placa'])) {
    $placa = trim($_POST['placa']);

    // Consulta para verificar si la placa existe en la base de datos
    $stmt = $conn->prepare("SELECT * FROM vehiculos WHERE placa = :placa");
    $stmt->bindParam(':placa', $placa);
    $stmt->execute();
    
    // Comprobar si hay coincidencias
    if ($stmt->rowCount() > 0) {
        echo "Acceso permitido: La placa " . htmlspecialchars($placa) . " está registrada.";
    } else {
        echo "Acceso denegado: La placa " . htmlspecialchars($placa) . " no está registrada.";
    }
}
?>
