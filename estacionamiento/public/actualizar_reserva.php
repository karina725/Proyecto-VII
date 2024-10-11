<?php
include('../config/db.php');

if (isset($_GET['espacio_id'])) {
    $espacio_id = $_GET['espacio_id'];
    $query = "SELECT * FROM reservas WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':espacio_id', $espacio_id);
    $stmt->execute();
    $reserva = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Reserva</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <div class="container">
        <h2>Actualizar Reserva</h2>
        <form action="../scripts/actualizar_reserva.php" method="POST">
            <input type="hidden" name="espacio_id" value="<?php echo $reserva['espacio_id']; ?>">
            <div class="form-group">
                <label for="usuario_id">ID de Usuario:</label>
                <input type="number" name="usuario_id" class="form-control" id="usuario_id" value="<?php echo $reserva['usuario_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="espacio_id">ID del Espacio de Estacionamiento:</label>
                <input type="number" name="espacio_id" class="form-control" id="espacio_id" value="<?php echo $reserva['espacio_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_reserva">Fecha de la Reserva:</label>
                <input type="date" name="fecha_reserva" class="form-control" id="fecha_reserva" value="<?php echo $reserva['fecha_reserva']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        </form>
    </div>
</body>

</html>