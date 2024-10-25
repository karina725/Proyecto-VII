<?php 
$contenido_tabla =  '';
$sql_seccion_estacionamiento = $mysqli->query("SELECT * FROM cat_seccion_estacionamiento ORDER BY seccion ASC");
$j=1;
$table_cols = 5;
while($res_seccion_estacionamiento = $sql_seccion_estacionamiento->fetch_object()){ 
	$seccion_estacionamiento_status = $dic_estatus_inactivo;
	$seccion_estacionamiento_id = imprimir_cadena($res_seccion_estacionamiento->id_seccion_estacionamiento, $mysqli);
	$seccion_estacionamiento = imprimir_cadena($res_seccion_estacionamiento->seccion, $mysqli);
	$seccion_estacionamiento_espacios = imprimir_cadena($res_seccion_estacionamiento->espacios, $mysqli);

	$seccion_estacionamiento_id_status = imprimir_cadena($res_seccion_estacionamiento->id_status, $mysqli);
	if($seccion_estacionamiento_id_status == 1){
		$seccion_estacionamiento_status = $dic_estatus_activo;
	}

	$contenido_tabla .= '
		<tr>
			<td class="align-middle text-center">'.$j++.'</td>
			<td class="align-middle text-left">'.$seccion_estacionamiento.'</td>
			<td class="align-middle text-left">'.$seccion_estacionamiento_status.'</td>
			<td class="align-middle text-left">'.$seccion_estacionamiento_espacios.'</td>
			<td class="align-middle text-center">
				<a href="?q=catalogos/secciones-estacionamiento/editar/&seccion_estacionamiento='.$seccion_estacionamiento_id.'" class="btn btn-primary btn-sm" type="submit" data-toggle="tooltip" data-placement="bottom" title="'.$dic_editar.'"><i class="fa fa-edit"></i></a>
			</td>
		</tr>
	';
} #### ///// END while($res_tipo_plagas = $sql_tipo_plagas->fetch_object())

?>
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio;?></a></li>
		<li class="breadcrumb-item"><a href="?q=catalogos/"><?php echo $dic_catalogos;?></a></li>
        <li class="breadcrumb-item active"><?php echo $dic_secciones_estacionamiento;?></li>
	</ol>
</div>
<div class="page-header">
	<h2 class="text-center"><?php echo $dic_secciones_estacionamiento;?></h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">
	<thead class="thead-dark text-center">
		<tr>
		  <th scope="col">#</th>
		  <th scope="col"><?php echo $dic_seccion;?></th>
		  <th scope="col"><?php echo $dic_espacios;?></th>

		  <th scope="col" class="filter-select filter-exact" data-placeholder="Todos"><?php echo $dic_estatus;?></th>
		  <th scope="col"><?php echo $dic_editar;?></th>
		</tr>
	</thead>
	<tbody><?php echo $contenido_tabla;?>
	</tbody>
	<tfoot>
		<tr class="text-center">
		<th colspan="<?php echo $table_cols;?>" class="ts-pager">
		<?php echo $table_footer;?>
   </th>
	</tr>
		<tr>
			<th colspan="<?php echo $table_cols;?>" class="align-middle text-center">
				<a href="?q=catalogos/secciones-estacionamiento/nuevo/"><?php echo $nueva.' '.$dic_seccion;?></a>
			</th>
		</tr>
	</tfoot>
</table>
