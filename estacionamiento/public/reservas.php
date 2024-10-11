<?php
// public/reservas.php
include('../config/db.php');
include('./includes/auth.php'); // Proteger la página
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Reservas</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Gestión de Reservas de Estacionamiento</h2>

        <!-- Formulario para agregar una nueva reserva -->
        <form action="../scripts/agregar_reserva.php" method="POST">
            <div class="form-group">
                <label for="usuario_id">ID de Usuario:</label>
                <input type="number" name="usuario_id" class="form-control" id="usuario_id" required>
            </div>
            <div class="form-group">
                <label for="espacio_id">ID del Espacio de Estacionamiento:</label>
                <input type="number" name="espacio_id" class="form-control" id="espacio_id" required>
            </div>
            <div class="form-group">
                <label for="fecha_reserva">Fecha de la Reserva:</label>
                <input type="date" name="fecha_reserva" class="form-control" id="fecha_reserva" required>
            </div>
            <button type="submit" class="btn btn-primary">Reservar Espacio</button>
        </form>

        <!-- Tabla de reservas existentes -->
        <h3>Lista de Reservas Existentes</h3>
        <?php
        $query = "SELECT * FROM reservas";
        $result = $pdo->query($query);

        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>ID Usuario</th><th>ID Espacio</th><th>Fecha Reserva</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id_estacionamiento']}</td>";
            echo "<td>{$row['usuario_id']}</td>";
            echo "<td>{$row['espacio_id']}</td>";
            echo "<td>{$row['fecha_reserva']}</td>";
            echo "<td>
                        <a href='./scripts/eliminar_reserva.php?id={$row['id_estacionamiento']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta reserva?\");'>Eliminar</a>
                        <a href='./actualizar_reserva.php?id={$row['id_estacionamiento']}' class='btn btn-warning'>Actualizar</a>
                    </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>
    </div>
</body>

</html>