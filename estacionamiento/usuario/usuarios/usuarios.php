<?php

$table_cols = 6;

// Consulta para obtener todos los usuarios y empleados
$stmt = $db_con->prepare("
    SELECT u.id_usuario, u.nombre_usuario, u.email, u.id_rol, e.numero_empleado, e.nombre_completo
    FROM usuarios u
    LEFT JOIN empleados e ON u.id_usuario = e.id_usuario
");

$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $dic_usuarios; ?> </li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center">Gestión de Usuarios</h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">

	<thead class="thead-dark text-center">
		<tr>
			<th>Nombre de Usuario</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Número de Empleado</th>
			<th>Nombre Completo</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach ($usuarios as $usuario): ?>
			<tr>

				<td><?php echo imprimir_cadena($usuario['nombre_usuario'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($usuario['email'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($usuario['id_rol'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($usuario['numero_empleado'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($usuario['nombre_completo'], $mysqli); ?></td>

				<td>
					<a href="?q=usuarios/editar/&id_usuario=<?php echo $usuario['id_usuario']; ?>" class="btn btn-warning btn-sm"><?php echo $dic_editar_icon; ?></a>
					<a href="?q=usuarios/eliminar/&id_usuario=<?php echo $usuario['id_usuario']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"><?php echo $dic_eliminar_icon; ?></a>
				</td>

			</tr>
		<?php endforeach; ?>

	</tbody>

	<tfoot>

		<tr class="text-center">
			<th colspan="<?php echo $table_cols; ?>" class="ts-pager">
				<?php echo $table_footer; ?>
			</th>
		</tr>

		<tr>
			<th colspan="<?php echo $table_cols; ?>" class="align-middle text-center">
				<a href="?q=propuestas/nueva/">
					<div class="alert alert-info">Registrar <?php echo $nueva . ' ' . $dic_propuesta; ?></div>
				</a>
			</th>
		</tr>

	</tfoot>

</table>
