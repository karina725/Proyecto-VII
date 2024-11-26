<?php

$stmt = $db_con->prepare("SELECT u.id_usuario, u.nombre_usuario FROM usuarios u");
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=reservas_evento/"><?php echo $dic_reservas_evento; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $nuevo; ?></li>
	</ol>
</div>
<div class="form-container">
<section class="tab-panel">
<div class="signin-form">
<div class="card card-container">

<div class="page-header">
	<h2 class="text-center"><?php echo $nueva . ' ' . $dic_reservas_evento; ?></h2>
</div>

<hr>

	<ul class="nav nav-tabs" id="myTab" role="tablist">

		<li class="nav-item">
			<button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Información de Usuario y Evento</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employee" type="button" role="tab" aria-controls="employee" aria-selected="false">Información de Eventos</button>
		</li>

	</ul>

	<form method="POST" action="reservas_evento/reservas_evento_agregar.php">

		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active p-3" id="user" role="tabpanel" aria-labelledby="user-tab">


				<div class="mb-3">
					<label for="nombre_evento" class="form-label">Nombre del Evento</label>
					<input type="text" name="nombre_evento" class="form-control" id="nombre_evento" value="" required>
				</div>

				<div class="mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<input type="text" name="descripcion" class="form-control" id="descripcion" value="" required>
				</div>

			</div>

			<div class="tab-pane fade p-3" id="employee" role="tabpanel" aria-labelledby="employee-tab">

			<div class="mb-3">
					<label for="fecha_evento" class="form-label">Fecha del Evento</label>
					<input type="date" name="fecha_evento" class="form-control" id="fecha_evento" value="" required>
				</div>

				<div class="mb-3">
					<label for="hora_inicio" class="form-label">Horario de Inicio</label>
					<input type="time" name="hora_inicio" class="form-control" id="hora_inicio" value="" required>
				</div>

				<div class="mb-3">
					<label for="hora_fin" class="form-label">Horario de Fin</label>
					<input type="time" name="hora_fin" class="form-control" id="hora_fin" value="" required>
				</div>

			</div>
			
		</div>

		<button type="submit" class="btn btn-primary">Crear Evento</button>
	
	</form>
