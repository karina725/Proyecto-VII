<?php
// public/empleados.php
include('./config/db.php'); 
include('./includes/auth.php'); // Proteger la página
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Gestión de Empleados</h2>
        
        <!-- Formulario para agregar un nuevo empleado -->
        <form action="../scripts/agregar_empleado.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Empleado:</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="posicion">Posición:</label>
                <input type="text" name="posicion" class="form-control" id="posicion" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Empleado</button>
        </form>

        <!-- Tabla de empleados existentes -->
        <h3>Lista de Empleados Registrados</h3>
        <?php
            $query = "SELECT * FROM empleados";
            $result = $pdo->query($query);

            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Posición</th><th>Acciones</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['posicion']}</td>";
                echo "<td>
                        <a href='../scripts/eliminar_empleado.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este empleado?\");'>Eliminar</a>
                        <a href='actualizar_empleado.php?id={$row['id']}' class='btn btn-warning'>Actualizar</a>
                    </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
</body>
</html>