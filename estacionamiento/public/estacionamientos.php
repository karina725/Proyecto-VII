<?php
// public/estacionamientos.
include('../config/db.php'); 
$dic_inicio = "Mensaje de inicio";


//$imagen_banner = '../usuario/images/banner.png';

session_start(); // Proteger la página

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_espacio = $_POST['numero_espacio'];
    $estado = $_POST['estado'];
    $fecha_creacion = !empty($_POST['fecha_creacion']) ? $_POST['fecha_creacion'] : null;
    $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $placa = !empty($_POST['placa']) ? $_POST['placa'] : null;
    $modelo = !empty($_POST['modelo']) ? $_POST['modelo'] : null;
    $seguro = !empty($_POST['seguro']) ? $_POST['seguro'] : null;

    // Consulta para insertar el nuevo espacio
    $query = "INSERT INTO estacionamientos (numero_espacio, estado, fecha_creacion, descripcion, placa, modelo, seguro) 
          VALUES (:numero_espacio, :estado, :fecha_creacion, :descripcion, :placa, :modelo, :seguro)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':numero_espacio', $numero_espacio);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':fecha_creacion', $fecha_creacion);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':seguro', $seguro);

    if ($stmt->execute()) {
        // Redirigir correctamente
        header("Location: estacionamientos.php");
        exit();
    } else {
        echo "Error al agregar el espacio.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Espacios de Estacionamiento</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


    <div class="container">
        
        <h2>Gestión de Espacios de Estacionamiento</h2>

        <div class="mb-3">
            <a href="../usuario/inicio.php" class="btn btn-secondary">Regresar al Inicio</a>
            <a href="./crear_evento.php" class="btn btn-secondary">Reserva de Evento</a>
        </div>

        <form action="estacionamientos.php" method="POST">
            <div class="form-group">
                <label for="numero_espacio">Número del Espacio:</label>
                <input type="text" name="numero_espacio" class="form-control" id="numero_espacio" required>
            </div>
            <div class="form-group">
                <label for="fecha_creacion">Fecha de Reserva:</label>
                <input type="date" name="fecha_creacion" class="form-control" id="fecha_creacion">
            </div>
            <div class="form-group">
                <label for="descripcion">Nombre:</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion">
            </div>
            <div class="form-group">
                <label for="placa">Placa del Vehículo:</label>
                <input type="text" name="placa" class="form-control" id="placa">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo del Vehículo:</label>
                <input type="text" name="modelo" class="form-control" id="modelo">
            </div>
            <div class="form-group">
                <label for="seguro">¿Cuenta con seguro?</label>
                <select name="seguro" class="form-control" id="seguro">
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado del Espacio (Disponible/Ocupado/Reservado):</label>
                <select name="estado" class="form-control" id="estado" required>
                    <option value="Disponible">Disponible</option>
                    <option value="Ocupado">Ocupado</option>
                    <option value="Reservado">Reservado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Espacio</button>
        </form>

        <!-- Tabla de espacios de estacionamiento existentes -->
        <h3>Lista de Espacios de Estacionamiento</h3>
        <?php
        // Consultar los espacios existentes
        $query = "SELECT * FROM estacionamientos";
        $result = $pdo->query($query);

        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Número del Espacio</th><th>Estado</th><th>Nombre</th><th>Placa</th><th>Modelo</th><th>Seguro</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id_estacionamiento']}</td>";
            echo "<td>{$row['numero_espacio']}</td>";
            echo "<td>{$row['estado']}</td>";
            echo "<td>{$row['descripcion']}</td>";
            echo "<td>{$row['placa']}</td>";
            echo "<td>{$row['modelo']}</td>";
            echo "<td>{$row['seguro']}</td>";
            echo "<td>
                    <a href='../scripts/eliminar_estacionamiento.php?id_estacionamiento={$row['id_estacionamiento']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este espacio?\");'>Eliminar</a>
                    <a href='../actualizar_estacionamiento.php?id_estacionamiento={$row['id_estacionamiento']}' class='btn btn-warning'>Actualizar</a>
                </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?> 
    </div>
</body>

</html>
