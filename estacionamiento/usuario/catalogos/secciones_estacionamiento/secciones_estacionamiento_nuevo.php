<?php
$cuerpo_pagina = '
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio">' . $dic_inicio . '</a></li>
		<li class="breadcrumb-item"><a href="?q=catalogos/">' . $dic_catalogos . '</a></li>
		<li class="breadcrumb-item"><a href="?q=catalogos/secciones-estacionamiento/">' . $dic_secciones_estacionamiento . '</a></li>
		<li class="breadcrumb-item active">' . $dic_nueva . ' ' . $dic_secciones_estacionamiento . '</li>
	</ol>
</div>
';


$select_status = '<option value="1" selected="selected">' . $dic_estatus_activo . '</option>
			<option value="2">' . $dic_estatus_inactivo . '</option>';
echo $cuerpo_pagina;
?>

<div class="page-header">
	<h2 class="text-center"><?php echo $dic_nueva . ' ' . $dic_secciones_estacionamiento; ?></h2>
</div>
<hr>
<form action="?q=catalogos/secciones-estacionamiento/insertar/" method="post">
	<div class="form-group row">
		<label for="seccion_estacionamiento" class="col-sm-2 col-form-label required-field"><?php echo $dic_seccion; ?></label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="seccion_estacionamiento" name="seccion_estacionamiento" value="" required="true">
		</div>
	</div>

	<div class="form-group row">
		<label for="seccion_estacionamiento_espacios" class="col-sm-2 col-form-label required-field"><?php echo $dic_espacios; ?></label>
		<div class="col-sm-10">
			<input type="number" min="0" class="form-control" id="seccion_estacionamiento_espacios" name="seccion_estacionamiento_espacios" value="" required="true">
		</div>
	</div>

	<div class="form-group row">
		<label for="seccion_estacionamiento_estatus" class="col-sm-2 col-form-label required-field"><?php echo $dic_estatus; ?></label>
		<div class="col-sm-10">
			<select class="form-control" id="seccion_estacionamiento_estatus" name="seccion_estacionamiento_estatus" required>
				<option>-- Seleccione el <?php echo $dic_estatus; ?> --</option>
				<?php echo $select_status; ?>
			</select>
		</div>
	</div>

	<hr>
	<div class="form-group row">
		<div class="col-sm-6 text-center">
			<a href="?q=catalogos/secciones-estacionamiento/" class="btn btn-secondary"><?php echo $cancelar; ?></a>
		</div>
		<div class="col-sm-6 text-left">
			<input type="hidden" name="bandera" id="bandera" value="600-insertar-secciones">
			<input type="hidden" name="anterior" id="anterior" value="catalogos/secciones-estacionamiento/">
			<button type="submit" class="btn btn-primary"><?php echo $guardar; ?></button>
		</div>
	</div>
</form>