<?php

$stmt = $db_con->prepare("SELECT u.id_usuario, u.nombre_usuario FROM usuarios u");
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=pensiones/"><?php echo $dic_pensiones; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $nuevo; ?></li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center"><?php echo $nueva . ' ' . $dic_pensiones; ?></h2>
</div>

<hr>

	<ul class="nav nav-tabs" id="myTab" role="tablist">

		<li class="nav-item">
			<button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Información de Usuario y Estacionamiento</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employee" type="button" role="tab" aria-controls="employee" aria-selected="false">Información de Pension</button>
		</li>

	</ul>

	<form method="POST" action="pensiones/pensiones_agregar.php">

		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active p-3" id="user" role="tabpanel" aria-labelledby="user-tab">

				<div class="mb-3">
					<label for="usuario" class="form-label">Usuario</label>
					<select name="usuario" class="form-control" id="usuario">
					<?php foreach ($usuarios as $usuario): ?>
					<option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nombre_usuario']; ?></option>
					<?php endforeach; ?>
					</select>
				</div>

				<div class="mb-3">
					<label for="estacionamiento" class="form-label">Numero estacionamiento</label>
					<input type="text" name="estacionamiento" class="form-control" id="estacionamiento" value="" required>
				</div>

				<div class="mb-3">
					<label for="descripcion" class="form-label">Descripcion</label>
					<input type="text" name="descripcion" class="form-control" id="descripcion" value="" required>
				</div>

				<div class="mb-3">
					<label for="placa" class="form-label">Placa</label>
					<input type="text" name="placa" class="form-control" id="placa" value="" required>
				</div>

				<div class="mb-3">
					<label for="modelo" class="form-label">Modelo</label>
					<input type="text" name="modelo" class="form-control" id="modelo" value="" required>
				</div>

				<div class="mb-3">
					<label for="seguro" class="form-label">Seguro</label>
					<input type="text" name="seguro" class="form-control" id="seguro" value="" required>
				</div>

			</div>

			<div class="tab-pane fade p-3" id="employee" role="tabpanel" aria-labelledby="employee-tab">

				<div class="mb-3">
					<label for="inicio" class="form-label">Fecha Inicio</label>
					<input type="date" name="inicio" class="form-control" id="inicio" value="" required>
				</div>

				<div class="mb-3">
					<label for="fin" class="form-label">Fecha Fin</label>
					<input type="date" name="fin" class="form-control" id="fin" value="" required>
				</div>

			</div>
			
		</div>

		<button type="submit" class="btn btn-primary">Registrar Pension</button>
	
	</form>
