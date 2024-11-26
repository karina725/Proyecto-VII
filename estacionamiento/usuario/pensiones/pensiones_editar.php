<?php

$mensaje = 2;

if (isset($_GET['id_pension'])) {

	$id_pension = limpiar_cadena_html($_GET['id_pension']);
	
	$stmt_pension = $db_con->prepare("
	SELECT p.id_pension, e.id_estacionamiento, u.id_usuario, p.fecha_reserva, p.fecha_fin, p.estado, p.fecha_creacion,p.costo_total, 
	e.numero_espacio, e.descripcion, e.placa, e.modelo, e.seguro, e.estado, e.fecha_creacion,
	u.nombre_usuario, u.email
	FROM pensiones p 
	INNER JOIN estacionamientos e ON p.id_estacionamiento = e.id_estacionamiento
	INNER JOIN usuarios u ON p.id_usuario = u.id_usuario
	WHERE p.id_pension = :id_pension LIMIT 1");
	$stmt_pension->bindParam(':id_pension', $id_pension);
	$stmt_pension->execute();
	$pension = $stmt_pension->fetch(PDO::FETCH_ASSOC);

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
		<li class="breadcrumb-item"><a href="?q=pensiones/"><?php echo $dic_pensiones; ?></a></li>
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

<?php if (isset($pension)): ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">

	<li class="nav-item">
		<button class="nav-link active" id="pension-tab" data-bs-toggle="tab" data-bs-target="#pension" type="button" role="tab" aria-controls="pension" aria-selected="true">Información de Pension</button>
	</li>

	<li class="nav-item">
		<button class="nav-link" id="estacionamiento-tab" data-bs-toggle="tab" data-bs-target="#estacionamiento" type="button" role="tab" aria-controls="estacionamiento" aria-selected="false">Información de Estacionamiento</button>
	</li>

</ul>

<form class="form-signin" method="POST" action="pensiones/pensiones_actualizar.php">

	<div class="tab-content" id="myTabContent">

		<div class="tab-pane fade show active p-3" id="pension" role="tabpanel" aria-labelledby="pension-tab">

			<div class="mb-3">
				<label for="usuario" class="form-label">Nombre Usuario: </label>
				<input type="text" class="form-control-plaintext" readonly name="usuario" id="usuario" value="<?php echo htmlspecialchars($pension['nombre_usuario']); ?>">
			</div>

			<div class="mb-3">
				<label for="reserva" class="form-label">Fecha Inicio de la Reserva: </label>
				<input type="date" class="form-control" name="reserva" id="reserva" value="<?php echo htmlspecialchars($pension['fecha_reserva']); ?>">
			</div>

			<div class="mb-3">
				<label for="fin" class="form-label">Fecha Fin de la Reserva:</label>
				<input type="date" class="form-control" name="fin" id="fin" value="<?php echo htmlspecialchars($pension['fecha_fin']); ?>">
			</div>

			<div class="mb-3">
				<label for="estado" class="form-label">Estado de la Pension:</label>
				<input type="text" class="form-control-plaintext" readonly name="estado" id="estado" value="<?php echo htmlspecialchars($pension['estado']); ?>">
			</div>

			<div class="mb-3">
				<label for="creacion" class="form-label">Creacion de la Pension:</label>
				<input type="text" class="form-control-plaintext" readonly name="creacion" id="creacion" value="<?php echo htmlspecialchars($pension['fecha_creacion']); ?>">
			</div>

		</div>

		<div class="tab-pane fade p-3" id="estacionamiento" role="tabpanel" aria-labelledby="estacionamiento-tab">

			<div class="mb-3">
				<label for="espacio" class="form-label">Espacio del Estacionamiento: </label>
				<input type="text" class="form-control" name="espacio" id="espacio" value="<?php echo htmlspecialchars($pension['numero_espacio']); ?>">
			</div>

			<div class="mb-3">
				<label for="descripcion" class="form-label">Desripcion del Automovil: </label>
				<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo htmlspecialchars($pension['descripcion']); ?>">
			</div>

			<div class="mb-3">
				<label for="placa" class="form-label">Placas del Automovil: </label>
				<input type="text" class="form-control" name="placa" id="placa" value="<?php echo htmlspecialchars($pension['placa']); ?>">
			</div>

			<div class="mb-3">
				<label for="modelo" class="form-label">Modelo del Auto: </label>
				<input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo htmlspecialchars($pension['modelo']); ?>">
			</div>

			<div class="mb-3">
				<label for="seguro" class="form-label">Seguro del Auto: </label>
				<input type="text" class="form-control" name="seguro" id="seguro" value="<?php echo htmlspecialchars($pension['seguro']); ?>">
			</div>

			<div class="mb-3">
				<label for="estado" class="form-label">Estado Estacionamiento: </label>
				<input type="text" class="form-control-plaintext" readonly name="estado" id="estado" value="<?php echo htmlspecialchars($pension['estado']); ?>">
			</div>

		</div>

	</div>

	<input type="hidden" name="id_pension" value="<?php echo $pension['id_pension']; ?>">
	<input type="hidden" name="id_estacionamiento" value="<?php echo $pension['id_estacionamiento']; ?>">

	<button type="submit" class="btn btn-primary mt-3">Actualizar</button>

</form>

<?php else: ?>

	<div class='alert alert-danger'>No se encontraron datos para este usuario.</div>

<?php endif; ?>
