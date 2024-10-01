<?php
// public/estacionamientos.php
include('../config/db.php');

session_start();// Proteger la página
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Espacios de Estacionamiento</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Gestión de Espacios de Estacionamiento</h2>

        <!-- Formulario para agregar un nuevo espacio de estacionamiento -->
        <form action="./scripts/agregar_estacionamiento.php" method="POST">
            <div class="form-group">
                <label for="numero_espacio">Número del Espacio:</label>
                <input type="text" name="numero_espacio" class="form-control" id="numero_espacio" required>
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
        $query = "SELECT * FROM estacionamientos";
        $result = $pdo->query($query);

        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Número del Espacio</th><th>Estado</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['numero_espacio']}</td>";
            echo "<td>{$row['estado']}</td>";
            echo "<td>
                        <a href='../scripts/eliminar_estacionamiento.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este espacio?\");'>Eliminar</a>
                        <a href='actualizar_estacionamiento.php?id={$row['id']}' class='btn btn-warning'>Actualizar</a>
                    </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>
    </div>
</body>

</html>