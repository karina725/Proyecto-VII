<?php

$mensaje = 2;

if (isset($_GET['id_lavado'])) {

	$id_lavado = limpiar_cadena_html($_GET['id_lavado']);
	
	$stmt_lavado = $db_con->prepare("
    SELECT p.id_lavado, e.id_estacionamiento, u.id_usuario, p.fecha_lavado, p.hora_lavado, p.modelo_auto, p.especificaciones_lavado, p.tipo_lavado,
	u.nombre_usuario, u.email
	FROM lavados p 
	INNER JOIN estacionamientos e ON p.id_estacionamiento = e.id_estacionamiento
	INNER JOIN usuarios u ON p.id_usuario = u.id_usuario
	WHERE p.id_lavado = :id_lavado LIMIT 1");
	$stmt_lavado->bindParam(':id_lavado', $id_lavado);
	$stmt_lavado->execute();
	$lavado = $stmt_lavado->fetch(PDO::FETCH_ASSOC);

}

?>
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=lavados/"><?php echo $dic_lavados; ?></a></li>
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

<?php if (isset($dic_lavados)): ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">

	<li class="nav-item">
		<button class="nav-link active" id="lavados-tab" data-bs-toggle="tab" data-bs-target="#lavado" type="button" role="tab" aria-controls="lavado" aria-selected="true">Información de lavados</button>
	</li>

	<li class="nav-item">
		<button class="nav-link" id="estacionamiento-tab" data-bs-toggle="tab" data-bs-target="#estacionamiento" type="button" role="tab" aria-controls="estacionamiento" aria-selected="false">Información de Estacionamiento</button>
	</li>

</ul>

<form class="form-signin" method="POST" action="lavados/lavados_actualizar.php">

	<div class="tab-content" id="myTabContent">

		<div class="tab-pane fade show active p-3" id="lavado" role="tabpanel" aria-labelledby="lavado-tab">

			<div class="mb-3">
				<label for="usuario" class="form-label">Nombre Usuario: </label>
				<input type="text" class="form-control-plaintext" readonly name="usuario" id="usuario" value="<?php echo htmlspecialchars($lavado['nombre_usuario']); ?>">
			</div>

			<div class="mb-3">
				<label for="modelo_auto" class="form-label">Modelo Auto: </label>
				<input text="date" class="form-control" name="modelo_auto" id="modelo_auto" value="<?php echo htmlspecialchars($lavado['modelo_auto']); ?>">
			</div>

			<div class="mb-3">
				<label for="fecha_lavado" class="form-label">Fecha del Lavado:</label>
				<input type="date" class="form-control" name="fecha_lavado" id="fecha_lavado" value="<?php echo htmlspecialchars($lavado['fecha_lavado']); ?>">
			</div>

			<div class="mb-3">
				<label for="hora_lavado" class="form-label">Hora del Lavado:</label>
				<input type="text" class="form-control-plaintext" readonly name="hora_lavado" id="hora_lavado" value="<?php echo htmlspecialchars($lavado['hora_lavado']); ?>">
			</div>

			<div class="mb-3">
				<label for="especificaciones_lavado" class="form-label">Especificaciones:</label>
				<input type="text" class="form-control-plaintext" readonly name="especificaciones_lavado" id="especificaciones_lavado" value="<?php echo htmlspecialchars($lavado['especificaciones_lavado']); ?>">
			</div>

		</div>

		<div class="tab-pane fade p-3" id="estacionamiento" role="tabpanel" aria-labelledby="estacionamiento-tab">

			<div class="mb-3">
				<label for="especificaciones_lavado" class="form-label">Especificaciones de Lavado: </label>
				<input type="text" class="form-control" name="especificaciones_lavado" id="especificaciones_lavado" value="<?php echo htmlspecialchars($lavado['especificaciones_lavado']); ?>">
			</div>

			<div class="mb-3">
				<label for="hora_lavado" class="form-label">Hora del Lavado: </label>
				<input time="text" class="form-control" name="hora_lavado" id="hora_lavado" value="<?php echo htmlspecialchars($lavado['hora_lavado']); ?>">
			</div>

			<div class="mb-3">
				<label for="tipo_lavado" class="form-label">Tipo de Lavado: </label>
				<input type="text" class="form-control" name="tipo_lavado" id="tipo_lavado" value="<?php echo htmlspecialchars($lavado['tipo_lavado']); ?>">
			</div>
a
		</div>

	</div>

	<input type="hidden" name="id_lavado" value="<?php echo $lavado['id_lavado']; ?>">
	<input type="hidden" name="id_estacionamiento" value="<?php echo $lavado['id_estacionamiento']; ?>">

	<button type="submit" class="btn btn-primary mt-3">Actualizar</button>

</form>

<?php else: ?>

	<div class='alert alert-danger'>No se encontraron datos para este usuario.</div>

<?php endif; ?>
