<?php

session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger y limpiar los datos del formulario
    $usuario = limpiar_cadena_html($_POST['usuario']);
    $estacionamiento = limpiar_cadena_html($_POST['estacionamiento']);
    $fecha_lavado = limpiar_cadena_html($_POST['fecha_lavado']);
    $hora_lavado = limpiar_cadena_html($_POST['hora_lavado']);
    $modelo_auto = limpiar_cadena_html($_POST['modelo_auto']);
    $especificaciones_lavado = limpiar_cadena_html($_POST['especificaciones_lavado']);
    $tipo_lavado = limpiar_cadena_html($_POST['tipo_lavado']);

    try {
        // Insertar el nuevo estacionamiento
        $stmt_estacionamiento = $db_con->prepare("INSERT INTO estacionamientos (numero_espacio, estado) VALUES (:numero_espacio, 'disponible')");
        $stmt_estacionamiento->bindParam(':numero_espacio', $estacionamiento);
        $stmt_estacionamiento->execute();

        // Obtener el ID del nuevo estacionamiento
        $id_estacionamiento = $db_con->lastInsertId();

        // Insertar el nuevo lavado en la tabla lavados
        $stmt_lavados = $db_con->prepare("INSERT INTO lavados (id_usuario, id_estacionamiento, fecha_lavado, hora_lavado, modelo_auto, especificaciones_lavado, tipo_lavado) VALUES (:id_usuario, :id_estacionamiento, :fecha_lavado, :hora_lavado, :modelo_auto, :especificaciones_lavado, :tipo_lavado)");
        $stmt_lavados->bindParam(':id_usuario', $usuario);
        $stmt_lavados->bindParam(':id_estacionamiento', $id_estacionamiento);
        $stmt_lavados->bindParam(':fecha_lavado', $fecha_lavado);
        $stmt_lavados->bindParam(':hora_lavado', $hora_lavado);
        $stmt_lavados->bindParam(':modelo_auto', $modelo_auto);
        $stmt_lavados->bindParam(':especificaciones_lavado', $especificaciones_lavado);
        $stmt_lavados->bindParam(':tipo_lavado', $tipo_lavado);
        $stmt_lavados->execute();

        // Redirigir después de agregar
        header("Location: ../?q=lavados/&mensaje=10");
        exit();

    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al agregar el lavado: " . $e->getMessage() . "</div>";
    }
} else {
    header("Location: ../?q=lavados/&mensaje=2");
    exit();
}
