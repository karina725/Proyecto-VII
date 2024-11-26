<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los datos del formulario
    $id_evento = $_POST['id_evento'];
    $nombre_evento = limpiar_cadena_html($_POST['nombre_evento']);
    $descripcion = limpiar_cadena_html($_POST['descripcion']);
    $fecha_evento = limpiar_cadena_html($_POST['fecha_evento']);
    $hora_inicio = limpiar_cadena_html($_POST['hora_inicio']);
    $hora_fin = limpiar_cadena_html($_POST['hora_fin']);
    $db_con->beginTransaction();

    // Actualizar datos eventos
    $stmt_update_eventos = $db_con->prepare("UPDATE eventos SET nombre_evento = :nombre_evento, descripcion = :descripcion, fecha_evento = :fecha_evento, hora_inicio = :hora_inicio, hora_fin = :hora_fin, costo_total = :costo_total WHERE id_evento = :id_evento");
    $stmt_update_eventos->bindParam(':id_evento', $id_evento);
    $stmt_update_eventos->bindParam(':nombre_evento', $nombre_evento);
    $stmt_update_eventos->bindParam(':descripcion', $descripcion);
    $stmt_update_eventos->bindParam(':fecha_evento', $fecha_evento);
    $stmt_update_eventos->bindParam(':hora_inicio', $hora_inicio);
    $stmt_update_eventos->bindParam(':hora_fin', $hora_fin);
    $stmt_update_eventos->bindParam(':costo_total', $costo_total);

    // Calcular el tiempo total y el costo
    $inicio_timestamp = strtotime($_POST['hora_inicio']);
    $fin_timestamp = strtotime($_POST['hora_fin']);

    $total_time = ($fin_timestamp - $inicio_timestamp) / 3600;  // Horas
    $total_time = number_format((float)$total_time, 2, ".", "");

    $rate = 45;
    $costo_total = $total_time * $rate;
    $stmt_update_eventos->execute();

    $db_con->commit();

    // Redirigir después de la actualización
    header("Location: ../?q=reservas_evento/&mensaje=20"); 
    exit();
  
} else {

    header("Location: ../?q=reservas_evento/&mensaje=2");
    exit(); 

}

?>
