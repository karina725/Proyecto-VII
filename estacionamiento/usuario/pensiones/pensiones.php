<?php

$table_cols = 8;

$stmt = $db_con->prepare("
    SELECT p.id_pension, e.id_estacionamiento, u.id_usuario, p.fecha_reserva, p.fecha_fin, p.estado, p.fecha_creacion, 
	e.numero_espacio, e.descripcion, e.placa, e.modelo, e.seguro, e.estado, e.fecha_creacion,
	u.nombre_usuario, u.email
    FROM pensiones p 
	INNER JOIN estacionamientos e ON p.id_estacionamiento = e.id_estacionamiento
	INNER JOIN usuarios u ON p.id_usuario = u.id_usuario
");

$stmt->execute();
$pensiones = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $dic_pensiones; ?> </li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center">Gestión de Pensiones</h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">

	<thead class="thead-dark text-center">
		<tr>
			<th>Usuario</th>
			<th>Espacio</th>
			<th>Placa</th>
			<th>Modelo</th>
			<th>Inicio Reserva</th>
			<th>Fin Reserva</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach ($pensiones as $pension): ?>
			<tr>

				<td><?php echo imprimir_cadena($pension['nombre_usuario'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($pension['numero_espacio'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($pension['placa'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($pension['modelo'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($pension['fecha_reserva'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($pension['fecha_fin'], $mysqli); ?></td>
				<td><?php echo imprimir_cadena($pension['estado'], $mysqli); ?></td>

				<td>
				<a href="?q=pensiones/editar/&id_pension=<?php echo $pension['id_pension']; ?>" class="btn btn-warning btn-sm"><?php echo $dic_editar_icon; ?></a>
					<a href="?q=pensiones/eliminar/&id_pension=<?php echo $pension['id_pension']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pension?');"><?php echo $dic_eliminar_icon; ?></a>
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
				<a href="?q=pensiones/nueva/">
					<div class="alert alert-info">Nuevo Registro</div>
				</a>
			</th>
		</tr>

	</tfoot>

</table>