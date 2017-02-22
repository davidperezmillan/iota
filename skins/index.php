<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Enlaces</title>
	<link rel="stylesheet" type="text/css" href="skins/material/dhtmlx.css">
	<script src="codebase/dhtmlx.js"></script>
	<script>
		var myGrid;
		function doOnLoad(){
			myGrid = new dhtmlXGridObject('gridbox');
			myGrid.setImagePath("/skins/material/imgs/dhxgrid_material/");
			myGrid.setHeader("Serie,Titulo,Temporada,Episodio,Stream,Pow");
			myGrid.attachHeader("#select_filter,,#select_filter,#select_filter");
			myGrid.setInitWidths("*,*,100,100,");
			myGrid.enableAutoWidth(true);
			myGrid.setColAlign("left,left,right,right,left, left");
			myGrid.setColTypes("txt,txt,txt,txt,link,link");
			myGrid.setColSorting("str,,int,int");
			myGrid.setSkin("material");
			myGrid.init();
			myGrid.makeFilter("textFilter",0);//params:input's id, column's index(0-based numbering)
			myGrid.enableSmartRendering(true);
			myGrid.load("data.php", "json");
		}
	</script>
</head>
<body onload="doOnLoad()">
	<h1>Link´s box</h1>
	<p>
		<label>Busqueda: </label><input type="text" id="textFilter" style="width:10%"></input>
	</p>
	<div id="gridbox" style="height:1000px; width:100%"></div>
</body>
</html>

