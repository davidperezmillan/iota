<?php
		include('./db.class.php'); // call db.class.php
		include('./properties.php'); // call db.class.php
		$bdd = new db($propBBDD); // create a new object, class db()
		
		/*
		    $query = $bdd->execute('INSERT INTO users (firstname, lastname) VALUES ("firstname1", "lastname1")');
		*/
		
		$sqlGeneral = "SELECT DISTINCT(tmp.id), 
		    	tmp.serie, tmp.title,tmp.season, tmp.episode,
		    	(select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=8) as link_8, 
		    	(select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=36) as link_36,
		    	(select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=99) as link_99,
		    	(select eml.actualizacion from enlaces eml where eml.episode=tmp.id and eml.type=8) as actualizacion_8, 
		    	(select eml.actualizacion from enlaces eml where eml.episode=tmp.id and eml.type=36) as actualizacion_36,
		    	(select eml.actualizacion from enlaces eml where eml.episode=tmp.id and eml.type=99) as actualizacion_99,
		    	tmp.status
		    FROM temporadas tmp
		    WHERE tmp.status = 0
		    and ((select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=8) is not null 
		    	or (select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=36) is not null 
		    	or (select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=99) is not null)";
		
		
		$links = $bdd->getAll($sqlGeneral);
		
		$container = array("data" => array());
		$rows = array();	
		foreach($links as $link) { // display the list
			$rows['id'] = $link['id'];
			$serie = str_replace("-", " ", explode("/", $link['serie'])[2]);
			$rows['serie'] = $serie;
			$rows['title'] = $link['title'];
			$rows['season'] = $link['season'];
			$rows['episode'] = $link['episode'];
			$rows['link_8'] = $link['link_8'];
			$rows['link_36'] = $link['link_36'];
			$rows['link_99'] = $link['link_99'];
			
			$main_array = array($link['actualizacion_8'],$link['actualizacion_36'],$link['actualizacion_99']);
			rsort($main_array);
			
			
			$rows['actualizacion'] = $main_array[0];
			array_push($container['data'], $rows);
		}
		echo json_encode($container);
?>
