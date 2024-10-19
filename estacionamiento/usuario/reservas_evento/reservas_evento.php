<?php

$table_cols = 7;

$stmt = $db_con->prepare("
    SELECT r.id_reserva, e.id_evento, u.id_usuario, r.fecha_reserva, r.hora_inicio, r.hora_fin, r.estado, r.fecha_creacion, 
	e.nombre_evento, e.descripcion, e.fecha_evento, e.hora_inicio, e.hora_fin, e.estado, e.fecha_creacion,
	u.nombre_usuario, u.email
    FROM reservas_evento r 
	INNER JOIN eventos e ON r.id_evento = e.id_evento
	INNER JOIN usuarios u ON r.id_usuario = u.id_usuario
");

$stmt->execute();
$reservas_evento = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $dic_reservas_evento; ?> </li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center">Gestión de Reserva Evento</h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">

	<thead class="thead-dark text-center">
		<tr>
			<th>Evento</th>
			<th>Usuario</th>
			<th>Reserva</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach ($reservas_evento as $reserva_evento): ?>
			<tr>

				<td><?php echo imprimir_cadena($reserva_evento['nombre_evento'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($reserva_evento['nombre_usuario'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($reserva_evento['fecha_reserva'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($reserva_evento['hora_inicio'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($reserva_evento['hora_fin'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($reserva_evento['estado'], $mysqli); ?></td>

				<td>
					<a href="?q=reservas_evento/editar/&id_reserva=<?php echo $reserva_evento['id_reserva']; ?>" class="btn btn-warning btn-sm"><?php echo $dic_editar; ?></a>
					<a href="?q=reservas_evento/eliminar/&id_reserva=<?php echo $reserva_evento['id_reserva']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');"><?php echo $dic_eliminar_icon; ?></a>
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
				<a href="?q=reservas_evento/nueva/">
					<div class="alert alert-info">Nuevo Registro</div>
				</a>
			</th>
		</tr>

	</tfoot>

</table>