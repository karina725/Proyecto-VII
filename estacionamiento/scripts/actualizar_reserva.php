<?php
// Incluir la configuración de la base de datos
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar si los datos necesarios están presentes
    if (isset($_POST['id_reserva']) && isset($_POST['usuario_id']) && isset($_POST['espacio_id'])) {
        $id_reserva = $_POST['id_reserva'];
        $usuario_id = $_POST['usuario_id'];
        $espacio_id = $_POST['espacio_id'];

        // Intentar ejecutar la consulta SQL
        try {
            $query = "UPDATE reservas SET usuario_id = :usuario_id, espacio_id = :espacio_id WHERE id_reserva = :id_reserva";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_reserva', $id_reserva);
            $stmt->bindParam(':usuario_id', $usuario_id);
            $stmt->bindParam(':espacio_id', $espacio_id);

            // Ejecutar la consulta y verificar el resultado
            if ($stmt->execute()) {
                // Redireccionar con un mensaje de éxito
                header("Location: ../public/reservas.php?message=Reserva actualizada exitosamente");
                exit(); // Asegurarse de que se detenga el script después de redirigir
            } else {
                echo "Error al actualizar la reserva.";
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error de base de datos: " . $e->getMessage();
        }
    } else {
        echo "Error: Datos incompletos para la actualización.";
    }
} else {
    echo "Error: Método de solicitud no válido.";
}
?>
