<?php
session_start();

require_once '../includes/php/conexion.php';
require_once '../includes/php/limpiar.php'; 
include_once("../includes/php/login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger y limpiar los datos del formulario
    $usuario = limpiar_cadena_html($_POST['usuario']);
    $numero_espacio = limpiar_cadena_html($_POST['numero_espacio']);
    $descripcion = limpiar_cadena_html($_POST['descripcion']);
    $placa = limpiar_cadena_html($_POST['placa']);
    $modelo = limpiar_cadena_html($_POST['modelo']);
    $seguro = limpiar_cadena_html($_POST['seguro']);
    $estado = limpiar_cadena_html($_POST['estado']);
    $fecha_creacion = limpiar_cadena_html($_POST['fecha_creacion']);

    try {
        // Insertar el nuevo estacionamiento
        $stmt_estacionamientos = $db_con->prepare("INSERT INTO estacionamientos (numero_espacio, descripcion, placa, modelo, seguro, estado, fecha_creacion) VALUES (:numero_espacio, :descripcion, :placa, :modelo, :seguro, :estado, :fecha_creacion)");
        $stmt_estacionamientos->bindParam(':numero_espacio', $numero_espacio);
        $stmt_estacionamientos->bindParam(':descripcion', $descripcion);
        $stmt_estacionamientos->bindParam(':placa', $placa);
        $stmt_estacionamientos->bindParam(':modelo', $modelo);
        $stmt_estacionamientos->bindParam(':seguro', $seguro);
        $stmt_estacionamientos->bindParam(':estado', $estado);
        $stmt_estacionamientos->bindParam(':fecha_creacion', $fecha_creacion);
        $stmt_estacionamientos->execute();

        // Redirigir después de agregar
        header("Location: ../?q=estacionamientos/&mensaje=10");
        exit();

    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error al agregar el estacionamiento: " . $e->getMessage() . "</div>";
    }
} else {
    header("Location: ../?q=estacionamientos/&mensaje=2");
    exit();
}
