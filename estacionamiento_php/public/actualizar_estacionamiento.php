<?php
// public/actualizar_estacionamiento.php
include('../config/db.php');
include('../includes/auth.php'); // Proteger la página

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM estacionamientos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $espacio = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Espacio de Estacionamiento</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Actualizar Espacio de Estacionamiento</h2>
        <form action="../scripts/actualizar_estacionamiento.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $espacio['id']; ?>">
            <div class="form-group">
                <label for="numero_espacio">Número del Espacio:</label>
                <input type="text" name="numero_espacio" class="form-control" id="numero_espacio" value="<?php echo $espacio['numero_espacio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado del Espacio:</label>
                <select name="estado" class="form-control" id="estado" required>
                    <option value="Disponible" <?php echo $espacio['estado'] == 'Disponible' ? 'selected' : ''; ?>>Disponible</option>
                    <option value="Ocupado" <?php echo $espacio['estado'] == 'Ocupado' ? 'selected' : ''; ?>>Ocupado</option>
                    <option value="Reservado" <?php echo $espacio['estado'] == 'Reservado' ? 'selected' : ''; ?>>Reservado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Espacio</button>
        </form>
    </div>
</body>

</html>