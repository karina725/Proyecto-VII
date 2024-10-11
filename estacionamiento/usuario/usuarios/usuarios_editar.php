<?php
$mensaje = 2;
// Verificar si se ha enviado un ID de usuario para editar y el ID de usuario en sesión
if (isset($_GET['id_usuario']) && isset($_SESSION['user_id'])) {
	$id_usuario = limpiar_cadena_html($_GET['id_usuario']);  // ID del usuario a modificar
	$user_id_actual = $_SESSION['user_id'];  // ID del usuario en sesión

	// Consultar los datos del usuario
	$stmt_usuario = $db_con->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario LIMIT 1");
	$stmt_usuario->bindParam(':id_usuario', $id_usuario);
	$stmt_usuario->execute();
	$usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);

	// Consultar los datos del empleado
	$stmt_empleado = $db_con->prepare("SELECT * FROM empleados WHERE id_usuario = :id_usuario LIMIT 1");
	$stmt_empleado->bindParam(':id_usuario', $id_usuario);
	$stmt_empleado->execute();
	$empleado = $stmt_empleado->fetch(PDO::FETCH_ASSOC);

	// Comprobar si se está intentando modificar su propio usuario
	$es_mi_usuario = ($user_id_actual == $id_usuario);
}
?>
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo  $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=usuarios/"><?php echo $dic_usuarios; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $dic_editar; ?></li>
	</ol>
</div>
<div class="page-header">
	<h2 class="text-center"><?php echo $dic_editar . ' ' . $dic_usuario; ?></h2>
</div>
<hr>
<?php if (isset($usuario) && isset($empleado)): ?>
	<?php if ($es_mi_usuario): ?>
		<div class="alert alert-danger">No puedes modificar tu propio usuario. Por favor, selecciona un usuario diferente para editar.</div>
	<?php endif; ?>

	<!-- Nav Tabs -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Información de Usuario</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employee" type="button" role="tab" aria-controls="employee" aria-selected="false">Información de Empleado</button>
		</li>
		<li class="nav-item">
			<button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Cambiar Contraseña</button>
		</li>
	</ul>

	<!-- Tab Content -->
	<form method="POST" action="actualizar_usuario_empleado.php">
		<div class="tab-content" id="myTabContent">
			<!-- Tab Información de Usuario -->
			<div class="tab-pane fade show active p-3" id="user" role="tabpanel" aria-labelledby="user-tab">
				<div class="mb-3">
					<label for="nombre_usuario" class="form-label">Nombre del Usuario</label>
					<input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" required <?php echo $es_mi_usuario ? 'disabled' : ''; ?>>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Correo Electrónico</label>
					<input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required <?php echo $es_mi_usuario ? 'disabled' : ''; ?>>
				</div>
				<div class="mb-3">
					<label for="id_rol" class="form-label">Rol del Usuario</label>
					<select name="id_rol" id="id_rol" class="form-control" <?php echo $es_mi_usuario ? 'disabled' : ''; ?>>
						<option value="1" <?php echo $usuario['id_rol'] == 1 ? 'selected' : ''; ?>>Administrador</option>
						<option value="2" <?php echo $usuario['id_rol'] == 2 ? 'selected' : ''; ?>>Empleado</option>
						<option value="3" <?php echo $usuario['id_rol'] == 3 ? 'selected' : ''; ?>>Usuario Regular</option>
					</select>
				</div>
			</div>

			<!-- Tab Información de Empleado -->
			<div class="tab-pane fade p-3" id="employee" role="tabpanel" aria-labelledby="employee-tab">
				<div class="mb-3">
					<label for="numero_empleado" class="form-label">Número de Empleado</label>
					<input type="text" name="numero_empleado" class="form-control" id="numero_empleado" value="<?php echo htmlspecialchars($empleado['numero_empleado']); ?>" required <?php echo $es_mi_usuario ? 'disabled' : ''; ?>>
				</div>
				<div class="mb-3">
					<label for="nombre_completo" class="form-label">Nombre Completo del Empleado</label>
					<input type="text" name="nombre_completo" class="form-control" id="nombre_completo" value="<?php echo htmlspecialchars($empleado['nombre_completo']); ?>" required <?php echo $es_mi_usuario ? 'disabled' : ''; ?>>
				</div>
			</div>
			<!-- Tab Cambiar Contraseña -->
			<div class="tab-pane fade p-3" id="password" role="tabpanel" aria-labelledby="password-tab">
				<div class="form-check mb-3">
					<input type="checkbox" class="form-check-input" id="changePassword" name="changePassword" onclick="togglePasswordFields();">
					<label class="form-check-label" for="changePassword">Quiero cambiar la contraseña</label>
				</div>
				<div class="mb-3">
					<label for="new_password" class="form-label">Nueva Contraseña</label>
					<input type="password" name="new_password" class="form-control" id="new_password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}" title="La contraseña debe tener al menos 8 caracteres, incluyendo una letra minúscula, una mayúscula, un número y un símbolo." disabled>
				</div>
				<div class="mb-3">
					<label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
					<input type="password" name="confirm_password" class="form-control" id="confirm_password" disabled>
				</div>
			</div>
		</div>

		<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
		<!-- Desactivar el botón de modificación si es su propio usuario -->
		<button type="submit" class="btn btn-primary mt-3" <?php echo $es_mi_usuario ? 'disabled' : ''; ?>>Modificar Usuario y Empleado</button>
	</form>
	<script>
		// Función para habilitar/deshabilitar los campos de contraseña
		function togglePasswordFields() {
			var isChecked = document.getElementById('changePassword').checked;
			document.getElementById('new_password').disabled = !isChecked;
			document.getElementById('confirm_password').disabled = !isChecked;
		}
	</script>
<?php else: ?>
	<div class='alert alert-danger'>No se encontraron datos para este usuario.</div>
<?php endif; ?>