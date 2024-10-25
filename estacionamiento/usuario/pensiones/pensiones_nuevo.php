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
	<h2 class="text-center"><?php echo 'Nuevo Registro'; ?></h2>
</div>

<div class="form-container">
<section class="tab-panel">
<div class="signin-form">
<div class="card card-container">

<form class="form-signin" method="POST" action="pensiones/pensiones_agregar.php">

	<div class="tab-content" id="myTabContent">

		<div class="tab-pane fade show active p-3" id="user" role="tabpanel" aria-labelledby="user-tab">

			<div class="mb-3">
				<label for="usuario" class="form-label">Usuario</label>
				<select class="form-control" name="usuario" id="usuario">
				<?php foreach ($usuarios as $usuario): ?>
				<option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nombre_usuario']; ?></option>
				<?php endforeach; ?>
				</select>
			</div>

			<div class="mb-3">
				<label for="estacionamiento" class="form-label">Numero estacionamiento</label>
				<input type="text" class="form-control" name="estacionamiento" id="estacionamiento" required>
			</div>

			<div class="mb-3">
				<label for="descripcion" class="form-label">Descripcion</label>
				<input type="text" class="form-control" name="descripcion" id="descripcion" required>
			</div>

			<div class="mb-3">
				<label for="placa" class="form-label">Placa</label>
				<input type="text" class="form-control" name="placa" id="placa" required>
			</div>

			<div class="mb-3">
				<label for="modelo" class="form-label">Modelo</label>
				<input type="text" class="form-control" name="modelo" id="modelo" required>
			</div>

			<div class="mb-3">
				<label for="seguro" class="form-label">Seguro</label>
				<input type="text" class="form-control" name="seguro" id="seguro" required>
			</div>

			<div class="mb-3">
				<label for="inicio" class="form-label">Fecha Inicio</label>
				<input type="date" class="form-control" name="inicio" id="inicio" required>
			</div>

			<div class="mb-3">
				<label for="fin" class="form-label">Fecha Fin</label>
				<input type="date" class="form-control" name="fin" id="fin" required>
			</div>

			<button type="submit" class="btn btn-primary">Guardar</button>

		</div>
		
	</div>

</form>

</div>
</section>
</div>
</div>
