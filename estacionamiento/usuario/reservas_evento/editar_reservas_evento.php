<?php

$mensaje = 2;

if (isset($_GET['id_evento'])) {
    $id_evento = limpiar_cadena_html($_GET['id_evento']);

    $stmt_eventos = $db_con->prepare("
        SELECT p.id_evento, p.nombre_evento, p.descripcion, p.fecha_evento, p.hora_inicio, p.hora_fin
        FROM eventos p
        WHERE p.id_evento = :id_evento LIMIT 1");
    $stmt_eventos->bindParam(':id_evento', $id_evento);
    $stmt_eventos->execute();
    $dic_reservas_evento = $stmt_eventos->fetch(PDO::FETCH_ASSOC);
}

?>
<style>
	.page-header h2 {
		text-align: center;
		color: white;
	}
</style>
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=reservas_evento/"><?php echo $dic_reservas; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $dic_editar; ?></li>
	</ol>
	
</div>
<div class="page-header">
	<h2 class="text-center"><?php echo 'Editar Registro'; ?></h2>
</div>

<div class="form-container">
<section class="tab-panel">
<div class="signin-form">
<div class="card card-container">

<?php if (isset($dic_reservas_evento)): ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">

	<li class="nav-item">
		<button class="nav-link active" id="eventos-tab" data-bs-toggle="tab" data-bs-target="#eventos" type="button" role="tab" aria-controls="eventos" aria-selected="true">Información de eventos</button>
	</li>

	<li class="nav-item">
		<button class="nav-link" id="estacionamiento-tab" data-bs-toggle="tab" data-bs-target="#estacionamiento" type="button" role="tab" aria-controls="estacionamiento" aria-selected="false">Información de horario</button>
	</li>

</ul>

<form class="form-signin" method="POST" action="reservas_evento/reservas_evento_actualizar.php">
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active p-3" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">


			<div class="mb-3">
				<label for="nombre_evento" class="form-label">Nombre del Evento: </label>
				<input text="date" class="form-control" name="nombre_evento" id="nombre_evento" value="<?php echo htmlspecialchars($dic_reservas_evento['nombre_evento']); ?>">
			</div>

			<div class="mb-3">
				<label for="descripcion" class="form-label">Descripción del eventos:</label>
				<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo htmlspecialchars($dic_reservas_evento['descripcion']); ?>">
			</div>

			<div class="mb-3">
				<label for="fecha_evento" class="form-label">Fecha del eventos:</label>
				<input type="date" class="form-control-plaintext" readonly name="fecha_evento" id="fecha_evento" value="<?php echo htmlspecialchars($dic_reservas_evento['fecha_evento']); ?>">
			</div>

		</div>

		<div class="tab-pane fade p-3" id="estacionamiento" role="tabpanel" aria-labelledby="estacionamiento-tab">

			<div class="mb-3">
				<label for="hora_inicio" class="form-label">Hora de inicio del eventos: </label>
				<input type="time" class="form-control" name="hora_inicio" id="hora_inicio" value="<?php echo htmlspecialchars($dic_reservas_evento['hora_inicio']); ?>">
			</div>

			<div class="mb-3">
				<label for="hora_fin" class="form-label">Hora de salida del eventos:: </label>
				<input type="time" class="form-control" name="hora_fin" id="hora_fin" value="<?php echo htmlspecialchars($dic_reservas_evento['hora_fin']); ?>">
			</div>

		</div>

	</div>

	<input type="hidden" name="id_evento" value="<?php echo $dic_reservas_evento['id_evento']; ?>">

	<button type="submit" class="btn btn-primary mt-3">Actualizar</button>

</form>

<?php else: ?>

	<div class='alert alert-danger'>No se encontraron datos para este usuario.</div>

<?php endif; ?>
