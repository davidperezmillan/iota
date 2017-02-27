<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>IOTA 2</title>

	<!-- <link rel="stylesheet" type="text/css" href="datatable/DataTables-1.10.13/css/jquery.dataTables.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="datatable/Responsive-2.1.1/css/responsive.dataTables.css" /> -->
	
	<script type="text/javascript" src="datatable/jQuery-2.2.4/jquery-2.2.4.js"></script>
	<script type="text/javascript" src="datatable/DataTables-1.10.13/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="datatable/Responsive-2.1.1/js/dataTables.responsive.js"></script> 

	<!-- skins -->
	<!--
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.semanticui.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.semanticui.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
	-->
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>


	<script>
		var lang = {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}


		$(document).ready(function() {
			var table = $('#mygrid').DataTable({
				
				// Registros a mostrar
				lengthMenu: [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				paging: true,
				iDisplayLength: 25,

				// llamada y control de datos
				ajax: "model/data.php",
				columns: [
				/*
				    desktop x >= 1024px
				    tablet-l (landscape) 768 <= x < 1024
				    tablet-p (portrait) 480 <= x < 768
				    mobile-l (landscape) 320 <= x < 480
				    mobile-p (portrait) x < 320
				*/				
				{
					data: "serie",
					width : "10%",
					className : "all"
				}, {
					data: "title",
					width : "10%",
					className : "desktop"
				}, {
					data: "season",
					width: "2%",
					className : "desktop"
				}, {
					data: "episode",
					width: "2%",
					className : "desktop"
				}, {
					data: null,
					render: function ( row, type, val, meta ) { 
					   	return (val.link_8) ? "<a href='" + val.link_8 + "'>" + val.link_8 + "</a>" : ""
					},
					width: "25%",
					className : "desktop"
				}, {
					data: null,
					render: function ( row, type, val, meta ) { 
						return (val.link_36) ? "<a href='" + val.link_36 + "'>" + val.link_36 + "</a>" : ""
					},
					width: "25%",
					className : "desktop"
				}, {
					data: null,
					render: function ( row, type, val, meta ) { 
						return (val.link_99) ? "<a href='" + val.link_99 + "'>" + val.link_99 + "</a>" : ""
					},
					width: "25%",
					className : "desktop"
				},{
					data: "actualizacion",
					width: "10%",
					className : "desktop"
				}],
				order: [[ 7, "desc" ]],
				language: lang,
				responsive: true,
				colReorder: true,
				pagingType: "numbers",

				
        		

			});
		
			// funciones
			table.search("<?= htmlspecialchars($_GET['search']);?>").draw();
		
			
			
		});
	</script>
	
	<style type="text/css">
		div#contenido{
			padding: 10px;
		}
	</style>
</head>

<body>
	<div id="contenido">
		<table id="mygrid" class="table table-striped table-bordered" >
			<thead>
				<tr>
			
					<th>Serie</th>
					<th>Titulo</th>
					<th></th>
					<th></th>
					<th>Stream</th>
					<th>Pow</th>
					<th>Playme</th>
					<th>Actualizacion</th>
				</tr>
			</thead>
			<!--
		<tfoot>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Position</th>
				<th>Office</th>
				<th>Start date</th>
				<th>Salary</th>
			</tr>
		</tfoot>
		-->
		</table>
	</div>
</body>
</body>

</html>
