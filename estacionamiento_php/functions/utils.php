<?php
// functions/utils.php

// Función para limpiar entradas de formularios
function limpiarDato($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para imprimir mensajes
function imprimirMensaje($message, $type = 'success')
{
    echo "<div class='alert alert-$type'>$message</div>";
}

// Función para validar el formato de un email
function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para imprimir filas de una tabla (usuarios, empleados, etc.)
function imprimirTabla($pdo, $tabla)
{
    $query = "SELECT * FROM $tabla";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    echo "<table class='table table-striped'>";
    echo "<thead>";
    foreach ($stmt->fetch(PDO::FETCH_ASSOC) as $key => $value) {
        echo "<th>" . ucfirst($key) . "</th>";
    }
    echo "<th>Acciones</th>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "<td>
            <a href='actualizar_$tabla.php?id=" . $row['id'] . "' class='btn btn-warning'>Actualizar</a>
            <a href='../scripts/eliminar_$tabla.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro?\");'>Eliminar</a>
        </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
