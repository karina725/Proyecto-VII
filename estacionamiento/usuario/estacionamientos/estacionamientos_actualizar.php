<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los datos del formulario
    $id_estacionamiento  = $_POST['id_estacionamiento'];
    $numero_espacio = limpiar_cadena_html($_POST['numero_espacio']);
    $descripcion = limpiar_cadena_html($_POST['descripcion']);
    $placa = limpiar_cadena_html($_POST['placa']);
    $modelo = limpiar_cadena_html($_POST['modelo']);
    $seguro = limpiar_cadena_html($_POST['seguro']);
    $estado = limpiar_cadena_html($_POST['estado']);
    $db_con->beginTransaction();

    // Actualizar datos estacionamiento
    $stmt_update_estacionamiento = $db_con->prepare("UPDATE estacionamientos SET numero_espacio = :numero_espacio, descripcion = :descripcion, placa = :placa, modelo = :modelo, seguro = :seguro, estado = :estado WHERE id_estacionamiento  = :id_estacionamiento ");
        $stmt_update_estacionamiento->bindParam(':id_estacionamiento', $id_estacionamiento );
        $stmt_update_estacionamiento->bindParam(':numero_espacio', $numero_espacio);
        $stmt_update_estacionamiento->bindParam(':descripcion', $descripcion);
        $stmt_update_estacionamiento->bindParam(':placa', $placa);
        $stmt_update_estacionamiento->bindParam(':modelo', $modelo);
        $stmt_update_estacionamiento->bindParam(':seguro', $seguro);
        $stmt_update_estacionamiento->bindParam(':estado', $estado);
        $stmt_update_estacionamiento->execute();

    $db_con->commit();

    // Redirigir después de la actualización
    header("Location: ../?q=estacionamientos/&mensaje=20"); 
    exit();
  
} else {

    header("Location: ../?q=estacionamientos/&mensaje=2");
    exit(); 

}

?>
