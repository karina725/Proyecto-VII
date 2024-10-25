<?php

if (isset($_GET['id_estacionamiento'])) {
    $id_estacionamiento = limpiar_cadena_html($_GET['id_estacionamiento']);
	
    $stmt_estacionamientos = $db_con->prepare("
        SELECT id_estacionamiento, numero_espacio, descripcion, placa, modelo, seguro, estado, fecha_creacion
        FROM estacionamientos
        WHERE id_estacionamiento = :id_estacionamiento LIMIT 1");
    $stmt_estacionamientos->bindParam(':id_estacionamiento', $id_estacionamiento);
    $stmt_estacionamientos->execute();
    $estacionamientos = $stmt_estacionamientos->fetch(PDO::FETCH_ASSOC);
}


?>

<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=estacionamientos/"><?php echo $dic_estacionamientos; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $dic_editar_icon; ?></li>
	</ol>
</div>
<div class="page-header">
	<h2 class="text-center"><?php echo 'Editar Registro'; ?></h2>
</div>

<div class="form-container">
<section class="tab-panel">
<div class="signin-form">
<div class="card card-container">

<?php if ($estacionamientos): ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<button class="nav-link active" id="estacionamientos-tab" data-bs-toggle="tab" data-bs-target="#estacionamiento" type="button" role="tab" aria-controls="estacionamiento" aria-selected="true">Información de Estacionamiento</button>
	</li>
</ul>

<form class="form-signin" method="POST" action="estacionamientos/estacionamientos_actualizar.php">
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active p-3" id="estacionamiento" role="tabpanel" aria-labelledby="estacionamiento-tab">
			
			<div class="mb-3">
				<label for="numero_espacio" class="form-label">Número de Espacio: </label>
				<input type="text" class="form-control" name="numero_espacio" id="numero_espacio" value="<?php echo htmlspecialchars($estacionamientos['numero_espacio']); ?>">
			</div>

			<div class="mb-3">
				<label for="descripcion" class="form-label">Descripción:</label>
				<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo htmlspecialchars($estacionamientos['descripcion']); ?>">
			</div>

			<div class="mb-3">
				<label for="placa" class="form-label">Placa:</label>
				<input type="text" class="form-control" name="placa" id="placa" value="<?php echo htmlspecialchars($estacionamientos['placa']); ?>">
			</div>

			<div class="mb-3">
				<label for="modelo" class="form-label">Modelo:</label>
				<input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo htmlspecialchars($estacionamientos['modelo']); ?>">
			</div>

			<div class="mb-3">
				<label for="seguro" class="form-label">Seguro:</label>
				<select class="form-control" name="seguro" id="seguro">
					<option value="si" <?php echo ($estacionamientos['seguro'] == 'si') ? 'selected' : ''; ?>>Sí</option>
					<option value="no" <?php echo ($estacionamientos['seguro'] == 'no') ? 'selected' : ''; ?>>No</option>
				</select>
			</div>

			<div class="mb-3">
				<label for="estado" class="form-label">Estado:</label>
				<select class="form-control" name="estado" id="estado">
					<option value="DISPONIBLE" <?php echo ($estacionamientos['estado'] == 'DISPONIBLE') ? 'selected' : ''; ?>>Disponible</option>
					<option value="OCUPADO" <?php echo ($estacionamientos['estado'] == 'OCUPADO') ? 'selected' : ''; ?>>Ocupado</option>
				</select>
			</div>

			<div class="mb-3">
				<label for="fecha_creacion" class="form-label">Fecha de Creación:</label>
				<input type="text" class="form-control-plaintext" readonly name="fecha_creacion" id="fecha_creacion" value="<?php echo htmlspecialchars($estacionamientos['fecha_creacion']); ?>">
			</div>

		</div>
	</div>

	<input type="hidden" name="id_estacionamiento" value="<?php echo $estacionamientos['id_estacionamiento']; ?>">

	<button type="submit" class="btn btn-primary mt-3">Actualizar</button>

</form>

<?php else: ?>

	<div class='alert alert-danger'>No se encontraron datos para este usuario.</div>

<?php endif; ?> 
