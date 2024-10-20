<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
        <li class="breadcrumb-item"><a href="?q=gestion-espacios/"><?php echo $dic_gestion_espacios; ?></a></li>
        <li class="breadcrumb-item active">Actualizar Reserva</li>
    </ol>
</nav>
<?php
// public/estacionamientos.
$id_estacionamiento = 0;
if (array_key_exists('id_estacionamiento', $_GET)) {
    $id_estacionamiento = limpiar_cadena($_GET['id_estacionamiento'], $mysqli);
}

if (isset($_GET['id_estacionamiento'])) {

    // Consulta para obtener los datos actuales del estacionamiento
    $sql = "SELECT * FROM estacionamientos WHERE id_estacionamiento = $id_estacionamiento";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        $res_estacionamiento = $resultado->fetch_object();
    } else {
        echo '<div class="alert alert-danger" role="alert">
                No se encontró el estacionamiento.
              </div>';
        exit;
    }
}
?>
<!-- Contenido de la página de Estacionamientos -->
<h2>Actualizar Reserva</h2>

<form action="?q=gestion-espacios/actualizar/" method="POST" class="form-content">

    <input type="hidden" name="id_estacionamiento" value="<?php echo $id_estacionamiento; ?>">

    <div class="form-group row">
        <label for="numero_espacio" class="col-sm-4 col-form-label">Número del Espacio:</label>
        <div class="col-sm-8">
            <input type="text" name="numero_espacio" class="form-control" id="numero_espacio" value="<?php echo imprimir_cadena($res_estacionamiento->numero_espacio); ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="estado" class="col-sm-4 col-form-label">Estado del Espacio (Disponible/Ocupado/Reservado):</label>
        <div class="col-sm-8">
            <select name="estado" class="form-control" id="estado" required>
                <option value="Disponible" <?php if ($res_estacionamiento->estado == 'Disponible') echo 'selected'; ?>>Disponible</option>
                <option value="Ocupado" <?php if ($res_estacionamiento->estado == 'Ocupado') echo 'selected'; ?>>Ocupado</option>
                <option value="Reservado" <?php if ($res_estacionamiento->estado == 'Reservado') echo 'selected'; ?>>Reservado</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="descripcion" class="col-sm-4 col-form-label">Descripción:</label>
        <div class="col-sm-8">
            <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo imprimir_cadena($res_estacionamiento->descripcion); ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="placa" class="col-sm-4 col-form-label">Placa:</label>
        <div class="col-sm-8">
            <input type="text" name="placa" class="form-control" id="placa" value="<?php echo imprimir_cadena($res_estacionamiento->placa); ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="modelo" class="col-sm-4 col-form-label">Modelo:</label>
        <div class="col-sm-8">
            <input type="text" name="modelo" class="form-control" id="modelo" value="<?php echo imprimir_cadena($res_estacionamiento->modelo); ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="seguro" class="col-sm-4 col-form-label">Seguro:</label>
        <div class="col-sm-8">
            <select name="seguro" class="form-control" id="seguro" required>
                <option value="Si" <?php if ($res_estacionamiento->seguro == 'Si') echo 'selected'; ?>>Si</option>
                <option value="No" <?php if ($res_estacionamiento->seguro == 'No') echo 'selected'; ?>>No</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="fecha_creacion" class="col-sm-4 col-form-label">Fecha de Creación:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="fecha_creacion" value="<?php echo imprimir_fecha_corta($res_estacionamiento->fecha_creacion); ?>" disabled>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-8 offset-sm-4">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</form>