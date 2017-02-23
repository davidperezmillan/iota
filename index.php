<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>IOTA</title>

	<link rel="stylesheet" type="text/css" href="datatable/DataTables-1.10.13/css/jquery.dataTables.css" />
	<link rel="stylesheet" type="text/css" href="datatable/Responsive-2.1.1/css/responsive.dataTables.css" />

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


	<script>
	var lang = {
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix":    "",
	    "sSearch":         "Buscar:",
	    "sUrl":            "",
	    "sInfoThousands":  ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	        "sFirst":    "Primero",
	        "sLast":     "Último",
	        "sNext":     "Siguiente",
	        "sPrevious": "Anterior"
	    },
	    "oAria": {
	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	}
	
	
		$(document).ready(function() {
					$('#mygrid').DataTable({
							lengthMenu: [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ],
							paging: true,
							ajax: "model/data.php",
							columns: [
								{data: "serie"},
								{data: "title"},
								{data: "season"},
								{data: "episode"},
								{
									data: "link_8",
									"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            								$(nTd).html("<a href='"+oData.link_8+"'>"+oData.link_8+"</a>");
        							}
								},
								{
									data: "link_36",
									"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
            								$(nTd).html("<a href='"+oData.link_36+"'>"+oData.link_36+"</a>");
        							}
								}
							],
							language: lang,
							
								
							});
					});
	</script>
</head>

<body>
	<table id="mygrid">
		<thead>
			<tr>
				<th>Serie</th>
				<th>Titulo</th>
				<th>Temporada</th>
				<th>Episodio</th>
				<th>Stream</th>
				<th>Pow</th>
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
</body>
</body>

</html>
