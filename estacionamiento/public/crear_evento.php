<?php
//public/crear_evento.php
include('../config/db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_evento = $_POST['nombre_evento'];
    $descripcion = $_POST['descripcion'];
    $fecha_evento = $_POST['fecha_evento'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $estado = "Activo"; 

    $query = "INSERT INTO eventos (nombre_evento, descripcion, fecha_evento, hora_inicio, hora_fin, estado)
              VALUES (:nombre_evento, :descripcion, :fecha_evento, :hora_inicio, :hora_fin, :estado)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre_evento', $nombre_evento);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha_evento', $fecha_evento);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fin', $hora_fin);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header("Location: eventos.php");
        exit();
    } else {
        echo "Error al crear el evento";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento Especial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 40px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-bottom: 40px;
        }

        label {
            display: block;
            color: #666;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <h1>Crear Evento Especial</h1>
    <div class="container">
    <form action="crear_evento.php" method="POST">
            <div class="form-group">
                <label for="nombre_evento">Nombre del Evento:</label>
                <input type="text" id="nombre_evento" name="nombre_evento" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
            </div>

            <div class="form-group">
                <label for="fecha_evento">Fecha del Evento:</label>
                <input type="date" id="fecha_evento" name="fecha_evento" required>
            </div>

            <div class="form-group">
                <label for="hora_inicio">Hora de Inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" required>
            </div>

            <div class="form-group">
                <label for="hora_fin">Hora de Fin:</label>
                <input type="time" id="hora_fin" name="hora_fin" required>
            </div>

            <button type="submit">Crear Evento</button>
        </form>
    </div>

    <div class="mb-3">
        <a href="../../" class="btn btn-secondary">Regresar al Inicio</a>
    </div>

    <!-- Tabla para mostrar reservas -->
    <h1>Reservas Actuales</h1>

     
            <?php
        // Consultar los espacios existentes
        $query = "SELECT * FROM eventos";
        $result = $pdo->query($query);

        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Nombre del Evento</th><th>Descripción</th><th>Fecha del Evento</th><th>Hora Inicio</th><th>Hora Fin</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id_evento']}</td>";
            echo "<td>{$row['nombre_evento']}</td>";
            echo "<td>{$row['descripcion']}</td>";
            echo "<td>{$row['fecha_evento']}</td>";
            echo "<td>{$row['hora_inicio']}</td>";
            echo "<td>{$row['hora_fin']}</td>";
            echo "<td>
                    <a href='../scripts/eliminar_evento.php?id_evento={$row['id_evento']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este espacio?\");'>Eliminar</a>
                    <a href='../actualizar_evento.php?id_evento={$row['id_evento']}' class='btn btn-warning'>Actualizar</a>
                </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?> 
    </div>
                
            </tbody>
        </table>

</body>
</html>
