<?php

$stmt = $db_con->prepare("SELECT u.id_usuario, u.nombre_usuario FROM usuarios u");
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=estacionamientos/"><?php echo $dic_estacionamientos; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $nuevo; ?></li>
	</ol>
</div>
<div class="form-container">
<section class="tab-panel">
<div class="signin-form">
<div class="card card-container">

<div class="page-header">
	<h2 class="text-center"><?php echo $nueva . ' ' . $dic_estacionamientos; ?></h2>
</div>

<hr>

	<ul class="nav nav-tabs" id="myTab" role="tablist">

		<li class="nav-item">
			<button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Información de Usuario </button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employee" type="button" role="tab" aria-controls="employee" aria-selected="false">Información de Reserva</button>
		</li>

	</ul>

	<form method="POST" action="estacionamientos/estacionamientos_agregar.php">

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
					<label for="numero_espacio" class="form-label">Numero del Espacio: </label>
					<input type="text" name="numero_espacio" class="form-control" id="numero_espacio" required >
				</div>

				<div class="mb-3">
					<label for="placa" class="form-label">Numero de Placas</label>
					<input type="text" name="placa" class="form-control" id="placa"  >
				</div>

				<div class="mb-3">
					<label for="modelo" class="form-label">Modelo</label>
					<input type="text" name="modelo" class="form-control" id="modelo" >
				</div>

				<div class="mb-3">
					<label for="seguro" class="form-label">Cuenta con Seguro</label>
					<input type="text" name="seguro" class="form-control" id="seguro" >
				</div>

				<div class="mb-3">
					<label for="estado" class="form-label">Estado</label>
					<input type="text" name="estado" class="form-control" id="estado" >
				</div>

			</div>

			<div class="tab-pane fade p-3" id="employee" role="tabpanel" aria-labelledby="employee-tab">

			<div class="mb-3">
				<label for="descripcion" class="form-label">Descripción del auto</label>
				<input type="text" name="descripcion" class="form-control" id="descripcion"  >
			</div>

				<div class="mb-3">
					<label for="fecha_creacion" class="form-label">Fecha de Reserva</label>
					<input type="date" name="fecha_creacion" class="form-control" id="fecha_creacion" >
				</div>

			</div>
			
		</div>

		<button type="submit" class="btn btn-primary">Registrar numero espacio</button>
	
	</form>
