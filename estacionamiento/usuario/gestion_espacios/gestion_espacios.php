<?php
// public/estacionamientos.
$numero_espacio = 0;
if (array_key_exists('numero_espacio', $_POST)) {
    $numero_espacio = limpiar_cadena($_POST['numero_espacio'], $mysqli);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $numero_espacio != 0) {
    $estado = '';
    if (array_key_exists('estado', $_POST)) {
        $estado = limpiar_cadena($_POST['estado'], $mysqli);
    }

    $nombre = '';
    if (array_key_exists('nombre', $_POST)) {
        $nombre = limpiar_cadena($_POST['nombre'], $mysqli);
    }

    $fecha_creacion = '';
    if (array_key_exists('fecha_creacion', $_POST)) {
        $fecha_creacion = limpiar_cadena($_POST['fecha_creacion'], $mysqli);
    }
    $placa = '';
    if (array_key_exists('placa', $_POST)) {
        $placa = limpiar_cadena($_POST['placa'], $mysqli);
    }

    $modelo = '';
    if (array_key_exists('modelo', $_POST)) {
        $modelo = limpiar_cadena($_POST['modelo'], $mysqli);
    }

    $seguro = 'Si';
    if (array_key_exists('seguro', $_POST)) {
        $seguro = limpiar_cadena($_POST['seguro'], $mysqli);
    }

    $sql = "INSERT INTO estacionamientos (numero_espacio, estado, fecha_creacion, descripcion, placa, modelo, seguro) 
    VALUES ('$numero_espacio', '$estado', '$fecha_creacion', '$nombre', '$placa', '$modelo', '$seguro')";
    if ($mysqli->query($sql) === TRUE) {
        // Mensaje de éxito
        echo '<div class="alert alert-success" role="alert">
            Registro exitoso.
          </div>';
    } else {
        // Mensaje de error
        echo '<div class="alert alert-danger" role="alert">
            Error en el registro: ' . $mysqli->error . '
          </div>';
    }
}
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
        <li class="breadcrumb-item active"><?php echo $dic_gestion_espacios; ?></li>
    </ol>
</nav>

<!-- Contenido de la página de Estacionamientos -->
<h2>Gestión de Espacios de Estacionamiento</h2>

<h3>Lista de Espacios de Estacionamiento</h3>
<?php
// Consultar los espacios existentes
$sql_estacionamientos = $mysqli->query("SELECT * FROM estacionamientos");

?>
<table class='table table-striped'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Número del Espacio</th>
            <th>Estado</th>
            <th>Nombre</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Seguro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($res_reglamentos = $sql_estacionamientos->fetch_object()) {
        ?>
            <tr>
                <td><?php echo imprimir_cadena($res_reglamentos->id_estacionamiento); ?></td>
                <td><?php echo imprimir_cadena($res_reglamentos->numero_espacio); ?></td>
                <td><?php echo imprimir_cadena($res_reglamentos->estado); ?></td>
                <td><?php echo imprimir_cadena($res_reglamentos->descripcion); ?></td>
                <td><?php echo imprimir_cadena($res_reglamentos->placa); ?></td>
                <td><?php echo imprimir_cadena($res_reglamentos->modelo); ?></td>
                <td><?php echo imprimir_cadena($res_reglamentos->seguro); ?></td>
                <td>
                    <a href="?q=gestion-espacios/eliminar/&id_estacionamiento=<?php echo imprimir_cadena($res_reglamentos->id_estacionamiento);?>" class='btn btn-danger' onclick='return confirm("¿Estás seguro de que deseas eliminar este espacio?");'><i class="bi bi-trash"></i></a>
                    <a href="?q=gestion-espacios/editar/&id_estacionamiento=<?php echo imprimir_cadena($res_reglamentos->id_estacionamiento);?>" class='btn btn-warning'><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<hr>
<h3 class="text-center">Nueva reserva</h3>
<!-- Formulario para agregar un nuevo espacio de estacionamiento -->
<form action="?q=gestion-espacios/" method="POST">
    <div class="form-group row">
        <label for="numero_espacio" class="col-sm-4 col-form-label">Número del Espacio:</label>
        <div class="col-sm-8">
            <input type="text" name="numero_espacio" class="form-control" id="numero_espacio" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="fecha_creacion" class="col-sm-4 col-form-label">Fecha de Reserva:</label>
        <div class="col-sm-8">
            <input type="date" name="fecha_creacion" class="form-control" id="fecha_creacion">
        </div>
    </div>
    <div class="form-group row">
        <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
        <div class="col-sm-8">
            <input type="text" name="nombre" class="form-control" id="nombre">
        </div>
    </div>
    <div class="form-group row">
        <label for="placa" class="col-sm-4 col-form-label">Placa del Vehículo:</label>
        <div class="col-sm-8">
            <input type="text" name="placa" class="form-control" id="placa">
        </div>
    </div>
    <div class="form-group row">
        <label for="modelo" class="col-sm-4 col-form-label">Modelo del Vehículo:</label>
        <div class="col-sm-8">
            <input type="text" name="modelo" class="form-control" id="modelo">
        </div>
    </div>
    <div class="form-group row">
        <label for="seguro" class="col-sm-4 col-form-label">¿Cuenta con seguro?</label>
        <div class="col-sm-8">
            <select name="seguro" class="form-control" id="seguro">
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="estado" class="col-sm-4 col-form-label">Estado del Espacio (Disponible/Ocupado/Reservado):</label>

        <div class="col-sm-8">
            <select name="estado" class="form-control" id="estado" required>
                <option value="Disponible">Disponible</option>
                <option value="Ocupado">Ocupado</option>
                <option value="Reservado">Reservado</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Agregar Espacio</button>
</form>

<!-- Tabla de espacios de estacionamiento existentes -->
</div>