<?php

$table_cols = 9;

$stmt = $db_con->prepare("
    SELECT p.id_lavado, e.id_estacionamiento, u.id_usuario, p.fecha_lavado, p.hora_lavado, p.modelo_auto,p.especificaciones_lavado, p.tipo_lavado,p.costo,
	u.nombre_usuario, u.email
    FROM lavados p 
	INNER JOIN estacionamientos e ON p.id_estacionamiento = e.id_estacionamiento
	INNER JOIN usuarios u ON p.id_usuario = u.id_usuario
");

$stmt->execute();
$lavados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
		<li class="breadcrumb-item active"><?php echo $dic_lavados; ?> </li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center">Gestión de Lavados</h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">

	<thead class="thead-dark text-center">
		<tr>
            <th>Usuario</th>
            <th>Id Estacionamiento</th>
            <th>Modelo Auto</th>
            <th>Fecha Lavado</th>
            <th>Hora Lavado</th>
            <th>Especificaciones</th>
            <th>Tipo Lavado</th>
            <th>Costo de Lavado</th>
			<th>Acciones</th>
        </tr>
	</thead>

	<tbody>

		<?php foreach ($lavados  as $lavados): ?>
			<tr>
                <td><?php echo imprimir_cadena($lavados['nombre_usuario'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['id_estacionamiento'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['modelo_auto'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['fecha_lavado'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['hora_lavado'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['especificaciones_lavado'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['tipo_lavado'], $mysqli); ?></td>
                <td><?php echo imprimir_cadena($lavados['costo'], $mysqli); ?></td>

                <td>
					<a href="?q=lavados/editar/&id_lavado=<?php echo $lavados['id_lavado']; ?>" class="btn btn-warning btn-sm"><?php echo $dic_editar_icon; ?></a>
					<a href="?q=lavados/eliminar/&id_lavado=<?php echo $lavados['id_lavado']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta lavado?');"><?php echo $dic_eliminar_icon; ?></a>
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
				<a href="?q=lavados/nueva/">
					<div class="alert alert-info">Nuevo Registro</div>
				</a>
			</th>
		</tr>

	</tfoot>

</table>