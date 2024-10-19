<?php

$select_reglamento = '';
$sql_reglamentos = $mysqli->query("SELECT id_reglamento, reglamento FROM cat_reglamentos WHERE id_status = '1' ORDER BY orden ASC");
while ($res_reglamentos = $sql_reglamentos->fetch_object()) {
	$reglamentos_id = imprimir2($res_reglamentos->id_reglamento, $mysqli);
	$reglamentos = imprimir2($res_reglamentos->reglamento, $mysqli);
	$select_reglamento .= '<option value="' . $reglamentos_id . '">' . $reglamentos . '</option>';
}

?>
<div class="bc-icons-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
		<li class="breadcrumb-item"><a href="?q=popuestas/"><?php echo $dic_propuestas; ?></a></li>
		<li class="breadcrumb-item active"><?php echo $nuevo; ?></li>
	</ol>
</div>

<div class="page-header">
	<h2 class="text-center">Registrar <?php echo $nueva.' '.$dic_propuesta; ?></h2>
</div>
<hr>
<form action="?q=propuestas/insertar/" method="post" enctype="multipart/form-data">


	<div class="form-group row">
		<label for="propuestas_reglamento" class="col-sm-2 col-form-label required-field"><?php echo $dic_reglamento; ?></label>
		<div class="col-sm-10">
			<select class="form-control" id="propuestas_reglamento" name="propuestas_reglamento" required>
				<option>-- Seleccione el <?php echo $dic_reglamento; ?> --</option>
				<?php echo $select_reglamento; ?>
			</select>
		</div>
	</div>
	<hr>
	<div class="form-group row">
		<label for="propuestas_comentario" class="col-sm-2 col-form-label required-field"><?php echo $dic_propuesta; ?></label>
		<div class="col-sm-10">
			<textarea id="propuestas_comentario" name="propuestas_comentario" class="form-control" rows="5" ></textarea>
		</div>
	</div>
	<hr>
	<div class="form-group row">
		<label for="propuestas_archivo" class="col-sm-2 col-form-label"><?php echo $dic_adjuntos; ?></label>
		<div class="col-sm-10">
			<input class="form-control" type="file" id="formFile" name="formFile" accept="application/pdf,application/vnd.ms-pdf">
			<small id="formFileHelp" class="form-text text-muted"><?php echo $dic_reporte_tipo_archivo_pdf;?></small>
		</div>
	</div>
	<hr>
	<div class="form-group row">
		<div class="col-sm-6 text-right">
			<a href="?q=propuestas/" class="btn btn-secondary"><?php echo $cancelar; ?></a>
		</div>
		<div class="col-sm-6 text-left">
			<input type="hidden" name="bandera" id="bandera" value="600-insertar-propuestas">
			<input type="hidden" name="anterior" id="anterior" value="propuestas/">
			<button type="submit" class="btn btn-primary"><?php echo $guardar; ?></button>
		</div>
	</div>
</form>
<script src="https://cdn.tiny.cloud/1/ek8vusy85vi8mc3srg4f5yoyd1xryorcl5cdpqkg69t92nas/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script-->

<script>
	tinymce.init({
		selector: 'textarea#propuestas_comentario',
		skin: 'bootstrap',
		plugins: 'lists, link, image, media',
		toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
		menubar: false,
	});
</script>