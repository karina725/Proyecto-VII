<?php
$mensaje = 2;
$cuerpo_pagina = '
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio">' . $dic_inicio . '</a></li>
		<li class="breadcrumb-item"><a href="?q=catalogos/">' . $dic_catalogos . '</a></li>
		<li class="breadcrumb-item"><a href="?q=catalogos/secciones-estacionamiento/">' . $dic_secciones_estacionamiento . '</a></li>
		<li class="breadcrumb-item active">' . $dic_editar . '</li>
	</ol>
</div>
';

$seccion_estacionamiento_id = '0';
if (array_key_exists('seccion_estacionamiento', $_POST)) {
	$seccion_estacionamiento_id = limpiar_cadena($_POST['seccion_estacionamiento'], $mysqli);
}
if (array_key_exists('seccion_estacionamiento', $_GET)) {
	$seccion_estacionamiento_id = limpiar_cadena($_GET['seccion_estacionamiento'], $mysqli);
}

$sql_seccion_estacionamiento = $mysqli->query("SELECT * FROM cat_seccion_estacionamiento WHERE id_seccion_estacionamiento = '$seccion_estacionamiento_id' LIMIT 1");
$cnt_seccion_estacionamiento = $sql_seccion_estacionamiento->num_rows;

if ($cnt_seccion_estacionamiento == 1) {
	$res_seccion_estacionamiento = $sql_seccion_estacionamiento->fetch_object();
	$seccion_estacionamiento_status = $dic_estatus_inactivo;
	$seccion_estacionamiento_id = imprimir_cadena($res_seccion_estacionamiento->id_seccion_estacionamiento, $mysqli);
	$seccion_estacionamiento_espacios = imprimir_cadena($res_seccion_estacionamiento->espacios, $mysqli);
	$seccion_estacionamiento = imprimir_cadena($res_seccion_estacionamiento->seccion, $mysqli);

	$seccion_estacionamiento_id_status = imprimir_cadena($res_seccion_estacionamiento->id_status, $mysqli);

	if ($seccion_estacionamiento_id_status == 1) {
		$select_status = '<option value="1" selected="selected">' . $dic_estatus_activo . '</option>
			<option value="2">' . $dic_estatus_inactivo . '</option>';
	} else {
		$select_status = '<option value="1">' . $dic_estatus_activo . '</option>
			<option value="2" selected="selected">' . $dic_estatus_inactivo . '</option>';
	}
	$cuerpo_pagina .=  '
		
		<div class="page-header">
			<h2 class="text-center">' . $dic_editar . '</h2>
		</div>
		<hr>
		<form action="?q=catalogos/secciones-estacionamiento/actualizar/" method="post">
			<div class="form-group row">
				<label for="seccion_estacionamiento_nombre" class="col-sm-2 col-form-label required-field">' . $dic_seccion . '</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="seccion_estacionamiento_nombre" name="seccion_estacionamiento_nombre" value="' . $seccion_estacionamiento . '" required="true">
				</div>
			</div>

			<div class="form-group row">
				<label for="seccion_estacionamiento_espacios" class="col-sm-2 col-form-label required-field">' . $dic_descripcion . '</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="seccion_estacionamiento_espacios" name="seccion_estacionamiento_espacios" value="' . $seccion_estacionamiento_espacios . '" required="true">
				</div>
			</div>

			<div class="form-group row">
				<label for="seccion_estacionamiento_estatus" class="col-sm-2 col-form-label required-field">' . $dic_estatus . '</label>
				<div class="col-sm-10">
					<select class="form-control" id="seccion_estacionamiento_estatus" name="seccion_estacionamiento_estatus" required>
					<option>-- Seleccione el ' . $dic_estatus . ' --</option>'
		. $select_status . '
					</select>
				</div>
			</div>

			<hr>
		<div class="form-group row">
			<div class="col-sm-6 text-right">
				<a href="?q=catalogos/cursos/estatus/" class="btn btn-secondary">' . $dic_regresar . '</a>
			</div>
			<div class="col-sm-6 text-left">
			  <input type="hidden" name="bandera" id="bandera" value="600-editar-secciones">
			  <input type="hidden" name="seccion_estacionamiento" id="seccion_estacionamiento" value="' . $seccion_estacionamiento_id . '">
			  <input type="hidden" name="anterior" id="anterior" value="catalogos/secciones-estacionamiento/">
			  <button type="submit" class="btn btn-primary">' . $guardar . '</button>
			</div>
		  </div>
		</form>

		';
} #### //// END if ($cnt_seccion_estacionamiento == '1')
else {
	$cuerpo_pagina .= $img_error;
}
echo $cuerpo_pagina;
