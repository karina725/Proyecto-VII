<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger y limpiar los datos del formulario
    $usuario = limpiar_cadena_html($_POST['usuario']);
    $estacionamiento = limpiar_cadena_html($_POST['estacionamiento']);
    $descripcion = limpiar_cadena_html($_POST['descripcion']);
    $placa = limpiar_cadena_html($_POST['placa']);
    $modelo = limpiar_cadena_html($_POST['modelo']);
    $seguro = limpiar_cadena_html($_POST['seguro']);
    $inicio = limpiar_cadena_html($_POST['inicio']);
    $fin = limpiar_cadena_html($_POST['fin']);
    $estado_estacionamiento = 'OCUPADO';
    $estado_pension = 'ACTIVO';

    // Calcular el tiempo total y el costo
    $inicio_timestamp = strtotime($_POST['inicio']);
    $fin_timestamp = strtotime($_POST['fin']);

    $total_time = ($fin_timestamp - $inicio_timestamp) / 3600;  // Horas
    $total_time = number_format((float)$total_time, 2, ".", "");

    $rate = 1.25;
    $costo_total = $total_time * $rate;

    // Insertar el nuevo registro en la tabla estacionamientos
    $stmt_estacionamiento = $db_con->prepare("INSERT INTO estacionamientos (numero_espacio, descripcion, placa, modelo, seguro, estado) VALUES (:numero_espacio, :descripcion, :placa, :modelo, :seguro, :estado)");
    $stmt_estacionamiento->bindParam(':numero_espacio', $estacionamiento);
    $stmt_estacionamiento->bindParam(':descripcion', $descripcion);
    $stmt_estacionamiento->bindParam(':placa', $placa);
    $stmt_estacionamiento->bindParam(':modelo', $modelo);
    $stmt_estacionamiento->bindParam(':seguro', $seguro);
    $stmt_estacionamiento->bindParam(':estado', $estado_estacionamiento);
    $stmt_estacionamiento->execute();

    // Obtener el ID del nuevo registro de estacionamiento
    $id_estacionamiento = $db_con->lastInsertId();

    // Insertar el nuevo registro en la tabla pensiones
    $stmt_pension = $db_con->prepare("INSERT INTO pensiones (id_usuario, id_estacionamiento, fecha_reserva, fecha_fin, estado, costo_total) VALUES (:id_usuario, :id_estacionamiento, :fecha_reserva, :fecha_fin, :estado, :costo_total)");
    $stmt_pension->bindParam(':id_usuario', $usuario);
    $stmt_pension->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt_pension->bindParam(':fecha_reserva', $_POST['inicio']);
    $stmt_pension->bindParam(':fecha_fin', $_POST['fin']);
    $stmt_pension->bindParam(':estado', $estado_pension);
    $stmt_pension->bindParam(':costo_total', $costo_total);
    $stmt_pension->execute();

    // Redirigir después de agregar
    header("Location: ../?q=pensiones/&mensaje=10");
    exit();

} else {
    header("Location: ../?q=pensiones/&mensaje=2");
    exit();
}


