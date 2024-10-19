<?php
// public/actualizar_evento.php
include('../config/db.php');
// include('../includes/auth.php'); // Proteger la página

if (isset($_GET['id_evento'])) {
    $id_evento = $_GET['id_evento'];
    $query = "SELECT * FROM eventos WHERE id_evento = :id_evento";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_evento', $id_evento);
    $stmt->execute();
    $espacio = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró un resultado
    if (!$espacio) {
        echo "No se encontró el evento.";
        exit; // Detener la ejecución si no hay resultados
    }
} else {
    echo "ID del evento no proporcionado.";
    exit; // Detener la ejecución si no se pasa un ID
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Evento</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Actualizar Evento</h2>
        <form action="../scripts/actualizar_evento.php" method="POST">
            <input type="hidden" name="id_evento" value="<?php echo $espacio['id_evento']; ?>">
            <div class="form-group">
                <label for="nombre_evento">Nombre del Evento:</label>
            <input type="text" name="nombre_evento" class="form-control" id="nombre_evento" value="<?php echo $espacio['nombre_evento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control" id="descripcion" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Evento</button>
        </form>
    </div>
</body>

</html>