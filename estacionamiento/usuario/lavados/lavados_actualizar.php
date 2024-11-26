<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los datos del formulario
    $id_lavado = $_POST['id_lavado'];
    $id_estacionamiento = $_POST['id_estacionamiento'];
    $modelo_auto = limpiar_cadena_html($_POST['modelo_auto']);
    $fecha_lavado = limpiar_cadena_html($_POST['fecha_lavado']);
    $hora_lavado = limpiar_cadena_html($_POST['hora_lavado']);
    $especificaciones_lavado = limpiar_cadena_html($_POST['especificaciones_lavado']);
    //$tipo_lavado = limpiar_cadena_html($_POST['tipo_lavado']);
    $tipo_servicio = limpiar_cadena_html($_POST['tipo_servicio']);
    $porciones = explode("-", $tipo_servicio);
    $tipo_lavado = $porciones[0]; 
    $costo = $porciones[1];

    $db_con->beginTransaction();

    // Actualizar datos lavados
    $stmt_update_lavado = $db_con->prepare("UPDATE lavados SET modelo_auto = :modelo_auto, fecha_lavado = :fecha_lavado,especificaciones_lavado = :especificaciones_lavado,tipo_lavado = :tipo_lavado, costo = :costo WHERE id_lavado = :id_lavado");
    $stmt_update_lavado->bindParam(':id_lavado', $id_lavado);
    $stmt_update_lavado->bindParam(':modelo_auto', $modelo_auto);
    $stmt_update_lavado->bindParam(':fecha_lavado', $fecha_lavado);
    $stmt_update_lavado->bindParam(':especificaciones_lavado', $especificaciones_lavado);
    $stmt_update_lavado->bindParam(':tipo_lavado', $tipo_lavado);
    $stmt_update_lavado->bindParam(':costo', $costo);
    $stmt_update_lavado->execute();

   

    // Confirmar transacción
    $db_con->commit();

    // Redirigir después de la actualización
    header("Location: ../?q=lavados/&mensaje=20"); 
    exit();
  
} else {

    header("Location: ../?q=lavados/&mensaje=2");
    exit(); 

}

?>