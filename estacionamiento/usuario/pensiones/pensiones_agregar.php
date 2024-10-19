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
    $estado_estacionamiento = limpiar_cadena_html('OCUPADO');
    $estado_pension = limpiar_cadena_html('ACTIVO');

    try {

        // Insertar el nuevo estacionamiento
        $stmt_estacionamiento = $db_con->prepare("INSERT INTO estacionamientos (numero_espacio, descripcion, placa, modelo, seguro, estado) VALUES (:numero_espacio, :descripcion, :placa, :modelo, :seguro, :estado_estacionamiento)");
        $stmt_estacionamiento->bindParam(':numero_espacio', $estacionamiento);
        $stmt_estacionamiento->bindParam(':descripcion', $descripcion);
        $stmt_estacionamiento->bindParam(':placa', $placa);
        $stmt_estacionamiento->bindParam(':modelo', $modelo);
        $stmt_estacionamiento->bindParam(':seguro', $seguro);
        $stmt_estacionamiento->bindParam(':estado_estacionamiento', $estado_estacionamiento);
        $stmt_estacionamiento->execute();

        // Obtener el ID del nuevo estacionamiento
        $id_estacionamiento = $db_con->lastInsertId();

        // Insertar el nuevo empleado en la tabla empleados
        $stmt_pension = $db_con->prepare("INSERT INTO pensiones (id_usuario, id_estacionamiento, fecha_reserva, fecha_fin, estado) VALUES (:id_usuario, :id_estacionamiento, :fecha_reserva, :fecha_fin, :estado_pension)");
        $stmt_pension->bindParam(':id_usuario', $usuario);
        $stmt_pension->bindParam(':id_estacionamiento', $id_estacionamiento);
        $stmt_pension->bindParam(':fecha_reserva', $inicio);
        $stmt_pension->bindParam(':fecha_fin', $fin);
        $stmt_pension->bindParam(':estado_pension', $estado_pension);
        $stmt_pension->execute();

        // Redirigir después de agregar
        header("Location: ?q=pensiones/&mensaje=10");
        exit();

    } catch (PDOException $e) {

        echo "<div class='alert alert-danger'>Error al agregar pension: " . $e->getMessage() . "</div>";

    }
    
} else {

    header("Location: ?q=usuarios/&mensaje=2");
    exit();

}
