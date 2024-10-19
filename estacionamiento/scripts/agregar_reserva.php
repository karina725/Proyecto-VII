<?php
// scripts/agregar_reserva.php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar si los datos necesarios están presentes
    if (isset($_POST['id_reserva']) && isset($_POST['id_empleado']) && isset($_POST['id_estacionamiento']) &&
        isset($_POST['fecha_reserva']) && isset($_POST['hora_inicio']) && isset($_POST['hora_fin']) && isset($_POST['estado'])) {

        $id_reserva = $_POST['id_reserva'];
        $id_empleado = $_POST['id_empleado'];
        $id_estacionamiento = $_POST['id_estacionamiento'];
        $fecha_reserva = $_POST['fecha_reserva'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        $estado = $_POST['estado'];

        // Intentar ejecutar la consulta SQL
        try {
            $query = "UPDATE reservas 
                      SET id_empleado = :id_empleado, 
                          id_estacionamiento = :id_estacionamiento, 
                          fecha_reserva = :fecha_reserva, 
                          hora_inicio = :hora_inicio, 
                          hora_fin = :hora_fin, 
                          estado = :estado 
                      WHERE id_reserva = :id_reserva";
            
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_reserva', $id_reserva);
            $stmt->bindParam(':id_empleado', $id_empleado);
            $stmt->bindParam(':id_estacionamiento', $id_estacionamiento);
            $stmt->bindParam(':fecha_reserva', $fecha_reserva);
            $stmt->bindParam(':hora_inicio', $hora_inicio);
            $stmt->bindParam(':hora_fin', $hora_fin);
            $stmt->bindParam(':estado', $estado);

            // Ejecutar la consulta y verificar el resultado
            if ($stmt->execute()) {
                // Redireccionar con un mensaje de éxito
                header("Location: ../public/reservas.php?message=Reserva actualizada exitosamente");
                exit(); // Detener el script después de redirigir
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