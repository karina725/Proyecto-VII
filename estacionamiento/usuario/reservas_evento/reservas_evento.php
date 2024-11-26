<?php
$table_cols = 9;

$stmt = $db_con->prepare("
    SELECT id_evento, nombre_evento, descripcion, fecha_evento, hora_inicio, hora_fin, costo_total
    FROM eventos
");

$stmt->execute();
$dic_reservas_evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
	.page-header h2 {
		text-align: center;
		color: white;
	}
</style>

<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>	
        <li class="breadcrumb-item active"><?php echo $dic_reservas; ?></li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center">Gestión de Reserva de Eventos</h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">

	<thead class="thead-dark text-center">
		<tr>
			<th>ID</th>
			<th>Nombre del Evento</th>
			<th>Descripción</th>
			<th>Fecha del Evento</th>
			<th>Hora Inicio</th>
			<th>Hora Fin</th>
			<th>Costo</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach ($dic_reservas_evento as $dic_reservas_evento): ?>
			<tr>

				<td><?php echo imprimir_cadena($dic_reservas_evento['id_evento'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($dic_reservas_evento['nombre_evento'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($dic_reservas_evento['descripcion'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($dic_reservas_evento['fecha_evento'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($dic_reservas_evento['hora_inicio'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($dic_reservas_evento['hora_fin'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($dic_reservas_evento['costo_total'], $mysqli); ?></td>

				<td>
				<a href="?q=reservas_evento/editar/&id_evento=<?php echo $dic_reservas_evento['id_evento']; ?>" class="btn btn-warning btn-sm"><?php echo $dic_editar_icon; ?></a>
					<a href="?q=reservas_evento/eliminar/&id_evento=<?php echo $dic_reservas_evento['id_evento']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pension?');"><?php echo $dic_eliminar_icon; ?></a>
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