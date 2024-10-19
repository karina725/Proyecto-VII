<?php
// public/reservas.php
include('../config/db.php');
//include('./includes/auth.php'); // Proteger la página
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
        <form action="agregar_reserva.php" method="POST">
            <label for="numero_espacio">Número de Espacio:</label>
            <input type="text" id="numero_espacio" name="numero_espacio" required><br>

            <label for="hora_inicio">Hora de Inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required><br>

            <label for="hora_fin">Hora de Fin:</label>
            <input type="time" id="hora_fin" name="hora_fin" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea><br>

            <button type="submit">Agregar Reserva</button>
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
            echo "<td>{$row['numero_espacio']}</td>";
            echo "<td>{$row['hora_inicio']}</td>";
            echo "<td>{$row['hora_fin']}</td>";
            echo "<td>{$row['descripcion']}</td>";
            echo "<td>
                        <a href='./scripts/eliminar_reserva.php?id={$row['reserva']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta reserva?\");'>Eliminar</a>
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