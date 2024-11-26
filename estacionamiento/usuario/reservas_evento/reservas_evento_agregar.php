<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger y limpiar los datos del formulario
    $nombre_evento = limpiar_cadena_html($_POST['nombre_evento']);
    $descripcion = limpiar_cadena_html($_POST['descripcion']);
    $fecha_evento = limpiar_cadena_html($_POST['fecha_evento']);
    $hora_inicio = limpiar_cadena_html($_POST['hora_inicio']);
    $hora_fin = limpiar_cadena_html($_POST['hora_fin']);

    // Calcular el tiempo total y el costo
    $inicio_timestamp = strtotime($_POST['hora_inicio']);
    $fin_timestamp = strtotime($_POST['hora_fin']);

    $total_time = ($fin_timestamp - $inicio_timestamp) / 3600;  // Horas
    $total_time = number_format((float)$total_time, 2, ".", "");

    $rate = 45;
    $costo_total = $total_time * $rate;

    try {

        // Insertar el nuevo registro en la tabla
        $stmt_eventos = $db_con->prepare("INSERT INTO eventos (nombre_evento, descripcion, fecha_evento, hora_inicio, hora_fin,costo_total) 
        VALUES (:nombre_evento, :descripcion, :fecha_evento, :hora_inicio, :hora_fin, :costo_total)");
        $stmt_eventos->bindParam(':nombre_evento', $nombre_evento);
        $stmt_eventos->bindParam(':descripcion', $descripcion);
        $stmt_eventos->bindParam(':fecha_evento', $fecha_evento);
        $stmt_eventos->bindParam(':hora_inicio', $hora_inicio);
        $stmt_eventos->bindParam(':hora_fin', $hora_fin);
        $stmt_eventos->bindParam(':costo_total', $costo_total);
        $stmt_eventos->execute();

        // Redirigir después de agregar
        header("Location: ../?q=reservas_evento/&mensaje=10");
        exit();

    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al agregar el evento: " . $e->getMessage() . "</div>";
    }
} else {
    header("Location: ../?q=reservas_evento/&mensaje=2");
    exit();
}
