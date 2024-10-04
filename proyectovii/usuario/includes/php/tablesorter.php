<!-- Tablesorter: required for bootstrap -->
	<link rel="stylesheet" href="includes/css/tablesorter/theme.bootstrap_4.css">
	<script src="includes/js/tablesorter/jquery.tablesorter.js"></script>
	<script src="includes/js/tablesorter/jquery.tablesorter.widgets.js"></script>

	<!-- Tablesorter: optional -->
	<link rel="stylesheet" href="includes/css/tablesorter/jquery.tablesorter.pager.css">
	<style>
	.tablesorter-pager .btn-group-sm .btn {
		font-size: 1.2em;
	}
	</style>
	<script src="includes/js/tablesorter/jquery.tablesorter.pager.js"></script>

	<script id="js">$(function() {

	$("table").tablesorter({
		theme : "bootstrap",

		widthFixed: true,

		// widget code contained in the jquery.tablesorter.widgets.js file
		// use the zebra stripe widget if you plan on hiding any rows (filter widget)
		// the uitheme widget is NOT REQUIRED!
		widgets : [ "filter", "columns", "zebra" ],

		widgetOptions : {
			// using the default zebra striping class name, so it actually isn't included in the theme variable above
			// this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
			zebra : ["even", "odd"],

			// class names added to columns when sorted
			columns: [ "primary", "secondary", "tertiary" ],

			// reset filters button
			filter_reset : ".reset",

			// extra css class name (string or array) added to the filter element (input or select)
			filter_cssFilter: [
				'form-control',
				'form-control',
				'form-control custom-select', // select needs custom class names :(
				'form-control',
				'form-control',
				'form-control',
				'form-control'
			]

		}
	})
	.tablesorterPager({

		// target the pager markup - see the HTML block below
		container: $(".ts-pager"),

		// target the pager page select dropdown - choose a page
		cssGoto  : ".pagenum",

		// remove rows from the table to speed up the sort of large tables.
		// setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
		removeRows: false,

		// output string - default is '{page}/{totalPages}';
		// possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
		output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

	});

});</script>

	<script>
	$(function() {

		// filter button demo code
		$('button.filter').click(function() {
			var col = $(this).data('column'),
				txt = $(this).data('filter');
			$('table').find('.tablesorter-filter').val('').eq(col).val(txt);
			$('table').trigger('search', false);
			return false;
		});

		// toggle zebra widget
		$('button.zebra').click(function() {
			var t = $(this).hasClass('btn-success');
			$('table')
				.toggleClass('table-striped')[0]
				.config.widgets = (t) ? ["filter"] : ["filter", "zebra"];
			$(this)
				.toggleClass('btn-danger btn-success')
				.find('span')
				.text(t ? 'disabled' : 'enabled');
			$('table').trigger('refreshWidgets', [false]);
			return false;
		});
	});
	</script>
