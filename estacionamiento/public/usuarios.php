<?php
// public/usuarios.php
include('./config/db.php');
include('./includes/auth.php'); // Proteger la página
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Gestión de Usuarios</h2>

        <!-- Formulario de búsqueda de usuarios -->
        <form action="usuarios.php" method="GET" class="form-inline mb-3">
            <input type="text" name="buscar" class="form-control mr-sm-2" placeholder="Buscar usuario..." value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
            <button type="submit" class="btn btn-outline-success">Buscar</button>
        </form>

        <!-- Tabla de usuarios existentes -->
        <h3>Lista de Usuarios Registrados</h3>
        <?php
        $query = "SELECT * FROM usuarios";
        if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
            $busqueda = $_GET['buscar'];
            $query .= " WHERE nombre LIKE :busqueda OR email LIKE :busqueda";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':busqueda', '%' . $busqueda . '%');
            $stmt->execute();
        } else {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }

        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>
                        <a href='../scripts/eliminar_usuario.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</a>
                        <a href='actualizar_usuario.php?id={$row['id']}' class='btn btn-warning'>Actualizar</a>
                    </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>
    </div>
</body>

</html>