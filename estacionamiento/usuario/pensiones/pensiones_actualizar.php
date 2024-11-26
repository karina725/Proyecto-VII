<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los datos del formulario
    $id_pension = $_POST['id_pension'];
    $id_estacionamiento = $_POST['id_estacionamiento'];
    $fecha_reserva = limpiar_cadena_html($_POST['reserva']);
    $fecha_fin = limpiar_cadena_html($_POST['fin']);
    $espacio = limpiar_cadena_html($_POST['espacio']);
    $descripcion = limpiar_cadena_html($_POST['descripcion']);
    $placa = limpiar_cadena_html($_POST['placa']);
    $modelo = limpiar_cadena_html($_POST['modelo']);
    $seguro = limpiar_cadena_html($_POST['seguro']);

    // Iniciar transacción
    $db_con->beginTransaction();

    // Actualizar datos pension
    $stmt_update_pension = $db_con->prepare("UPDATE pensiones SET fecha_reserva = :fecha_reserva, fecha_fin = :fecha_fin, costo_total = :costo_total WHERE id_pension = :id_pension");
    $stmt_update_pension->bindParam(':id_pension', $id_pension);
    $stmt_update_pension->bindParam(':fecha_reserva', $fecha_reserva);
    $stmt_update_pension->bindParam(':fecha_fin', $fecha_fin);
    $stmt_update_pension->bindParam(':costo_total', $costo_total);

     // Calcular el tiempo total y el costo
     $inicio_timestamp = strtotime($_POST['reserva']);
     $fin_timestamp = strtotime($_POST['fin']);
 
     $total_time = ($fin_timestamp - $inicio_timestamp) / 3600;  
     $total_time = number_format((float)$total_time, 2, ".", "");
 
     $rate = 1.25;
     $costo_total = $total_time * $rate;

    $stmt_update_pension->execute();

   

    // Actualizar datos estacionamiento
    $stmt_update_estacionamiento = $db_con->prepare("UPDATE estacionamientos SET numero_espacio = :espacio, descripcion = :descripcion, placa = :placa, modelo = :modelo, seguro = :seguro WHERE id_estacionamiento = :id_estacionamiento");
    $stmt_update_estacionamiento->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt_update_estacionamiento->bindParam(':espacio', $espacio);
    $stmt_update_estacionamiento->bindParam(':descripcion', $descripcion);
    $stmt_update_estacionamiento->bindParam(':placa', $placa);
    $stmt_update_estacionamiento->bindParam(':modelo', $modelo);
    $stmt_update_estacionamiento->bindParam(':seguro', $seguro);
    $stmt_update_estacionamiento->execute();

    // Confirmar transacción
    $db_con->commit();

    // Redirigir después de la actualización
    header("Location: ../?q=pensiones/&mensaje=20"); 
    exit();
  
} else {

    header("Location: ../?q=pensiones/&mensaje=2");
    exit(); 

}

?>
